<?php

use ActiveRecord\Model;

class Empresa extends Model
{
    static $validates_presence_of = array(
        array('designacaoSocial', 'message' => 'É necessário indicar a Designação Social'),
        array('capitalSocial', 'message' => 'É necessário indicar o capital social'),
        array('email', 'message' => 'É necessário indicar um endereço de email'),
        array('telefone', 'message' => 'É necessário indicar um número de telefone'),
        array('nif', 'message' => 'É necessário indicar o Número de Identificação Fiscal'),
        array('morada', 'message' => 'É necessário indicar a morada'),
        array('codigoPostal', 'message' => 'É necessário indicar o código postal'),
        array('localidade', 'message' => 'É necessário indicar a localidade')
    );

    static $validates_size_of = array(
        array('designacaoSocial', 'maximum' => 100),
        array('email', 'maximum' => 100),
        array('telefone', 'is' => 9),
        array('nif', 'is' => 9),
        array('morada', 'maximum' => 100),
        array('codigoPostal', 'is' => 8),
        array('localidade', 'maximum' => 40)
    );
}