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
}