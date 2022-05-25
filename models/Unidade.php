<?php

use ActiveRecord\Model;

class Unidade extends Model
{
    static $belongs_to = array(
      array('produto')
    );
}