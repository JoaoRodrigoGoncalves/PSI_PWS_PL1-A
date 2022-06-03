<?php
use ActiveRecord\Model;

    class LinhaFatura extends Model
    {
        static $validates_presence_of = array(
            array('fatura_id', 'msg' => 'Indique a fatura a que pertence'),
            array('producto_id', 'msg' => 'Selecione um produto'),
            array('valor', 'msg' => 'Indique o valor do produto'),
            array('quantidade', 'msg' => 'Indique a quantidade do produto'),
            array('iva_id', 'msg' => 'Selecione uma taxa de iva')
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
    };