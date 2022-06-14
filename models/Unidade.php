<?php

use ActiveRecord\Model;

class Unidade extends Model
{
    static $validates_presence_of = array(
        array('unidade', 'message' => 'É necessário indicar a unidade')
    );
}