<?php

use ActiveRecord\Model;

class Produto extends Model
{
    static $validates_presence_of = array(
        array('descricao', 'message' => 'É necessário indicar uma descrição para o produto'),
        array('preco_unitario', 'message' => 'Indique um preco unitario'),
        array('taxa_id', 'message' => 'Selecione uma taxa de iva'),
        array('unidade_id', 'message' => 'Selecione o tipo de unidade a utilizar para o produto'),
        array('stock', 'message' => 'Indique o sotck disponível')
    );

    static  $validates_size_of = array(
        array('descricao', 'maximum' => 100, 'message' => 'Excedeu o número de caracteres')
    );

    static $validates_numericality_of = array(
      array('preco_unitario'),
      array('stock')
    );

    static $belongs_to = array(
        array('taxa'),
        array('unidade')
    );

}