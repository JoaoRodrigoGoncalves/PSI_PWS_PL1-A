<?php
use ActiveRecord\Model;

    class Taxa extends Model
    {
        static $validates_presence_of = array(
            array('valor', 'message' => 'É necessário indicar o valor da taxa'),
            array('descricao', 'message' => 'É necessário indicar a descrição da taxa')
        );
    }