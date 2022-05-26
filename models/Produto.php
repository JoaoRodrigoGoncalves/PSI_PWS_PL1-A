<?php

use ActiveRecord\Model;

class Produto extends Model
{
    static $validates_presence_of = array(
        array('descricao', 'msg' => 'É necessário indicar uma descrição para o produto'),
        array('preco_unitario', 'msg' => 'Indique um preco unitario'),
        array('iva_id', 'msg' => 'Selecione uma taxa de iva'),
        array('unidade_id', 'msg' => 'Selecione o tipo de unidade a utilizar para o produto'),
        array('stock', 'msg' => 'Indique o sotck disponível')
    );

    static  $validates_size_of = array(
        array('descricao', 'maximum' => 100)
    );

    static $has_one = array(
        array('unidade')
    );

    public function validate() : bool
    {
        $return_value = true; // Definido para que todos os campos possam ser analizados

        //$this->preco_unitario = str_replace(',', '.', $this->preco_unitario);
        if(!is_numeric($this->preco_unitario))
        {
            $this->errors->add('preco_unitario', 'Indique um valor válido! Ex: 12.50');
            $return_value = false;
        }

        //$this->stock = str_replace(',', '.', $this->stock);
        if(!is_numeric($this->stock))
        {
            $this->errors->add('stock', 'Indique um valor válido! Ex: 12.50');
            $return_value = false;
        }

        return $return_value;
    }
}