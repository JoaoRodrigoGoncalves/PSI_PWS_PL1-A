<?php
use ActiveRecord\Model;

    class LinhaFatura extends Model
    {
        static $validates_presence_of = array(
            array('fatura_id', 'message' => 'Indique a fatura a que pertence'),
            array('produto_id', 'message' => 'Selecione um produto'),
            array('valor', 'message' => 'Indique o valor do produto'),
            array('quantidade', 'message' => 'Indique a quantidade do produto'),
            array('taxa_id', 'message' => 'Selecione uma taxa de iva')
        );

        static $validates_numericality_of = array(
            array('valor'),
            array('quantidade')
        );

        static $belongs_to = array(
            array('fatura'),
            array('produto'),
            array('taxa')
        );
    }