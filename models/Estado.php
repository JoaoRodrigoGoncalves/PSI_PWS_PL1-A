<?php

use ActiveRecord\Model;

class Estado extends Model
{
    static $validates_presence_of = array(
        array('estado', 'message' => 'É necessário indicar uma descrição o estado')
    );
}