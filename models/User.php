<?php

class User extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('username', 'message' => 'É necessário indicar um nome de utilizador'),
        array('telefone', 'message' => 'É necessário indicar um número de telefone'),
        array('email', 'message' => 'É necessário indicar um endereço de email'),
        array('nif', 'message' => 'É necessário indicar o Número de Identificação Fiscal'),
        array('morada', 'message' => 'É necessário indicar a morada'),
        array('codigoPostal', 'message' => 'É necessário indicar o código postal'),
        array('localidade', 'message' => 'É necessário indicar a localidade')
    );

    static $validates_size_of = array(
        array('username', 'maximum' => 100),
        array('email', 'maximum' => 100),
        array('telefone', 'is' => 9),
        array('nif', 'is' => 9),
        array('morada', 'maximum' => 100),
        array('codigoPostal', 'is' => 8),
        array('localidade', 'maximum' => 40)
    );
}