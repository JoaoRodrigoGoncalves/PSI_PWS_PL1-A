<?php

use ActiveRecord\Model;

class Empresa extends Model
{
    static $validates_presence_of = array(
        array('designacaosocial', 'message' => 'É necessário indicar a Designação Social'),
        array('capitalsocial', 'message' => 'É necessário indicar o capital social'),
        array('email', 'message' => 'É necessário indicar um endereço de email'),
        array('telefone', 'message' => 'É necessário indicar um número de telefone'),
        array('nif', 'message' => 'É necessário indicar o Número de Identificação Fiscal'),
        array('morada', 'message' => 'É necessário indicar a morada'),
        array('codigopostal', 'message' => 'É necessário indicar o código postal'),
        array('localidade', 'message' => 'É necessário indicar a localidade')
    );

    static $validates_size_of = array(
        array('designacaosocial', 'maximum' => 100),
        array('email', 'maximum' => 100),
        array('telefone', 'is' => 9),
        array('nif', 'is' => 9),
        array('morada', 'maximum' => 100),
        array('codigopostal', 'is' => 8),
        array('localidade', 'maximum' => 40)
    );
}