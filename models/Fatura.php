<?php
use ActiveRecord\Model;

    class Fatura extends Model
    {
        static $validates_presence_of = array(
            array('estado_id', 'msg' => 'Indique o estado da fatura'),
            array('cliente_id', 'msg' => 'Selecione o um cliente para a fatura'),
            array('funcionario_id', 'msg' => 'Selecione um funcionario para a fatura')
        );

        static $belongs_to = array(
            array('estado'),
            array('cliente', 'class_name' => 'User', 'foreign_key' => 'cliente_id'),
            array('funcionario', 'class_name' => 'User', 'foreign_key' => 'funcionario_id')
        );

        static $has_many = array(
            array('linhafatura')
        );

    }