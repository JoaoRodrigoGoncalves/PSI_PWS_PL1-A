<?php

use ActiveRecord\Config;

require_once './vendor/autoload.php';

define('APP_NAME', 'Fatura+');
define('INVALID_ACCESS_ROUTE', 'c=login&a=index');
define('MAILERSEND_API_KEY', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZmFjNjRlZWE0MmI1NTcwMjZiNGQ5NmU1ZWU4ZmU5Y2MwZGVmMGY1ZjVlMjQ5Yjc2YWEyZTUxNDQwOTU4ZDVmYmE5ZjA4YmE1N2Q5MGIxOTAiLCJpYXQiOjE2NTQwNzkzNzYuMTkyODAzLCJuYmYiOjE2NTQwNzkzNzYuMTkyODA4LCJleHAiOjQ4MDk3NTI5NzYuMTg4MTc1LCJzdWIiOiIyODEyOSIsInNjb3BlcyI6WyJlbWFpbF9mdWxsIiwiZG9tYWluc19mdWxsIiwiYWN0aXZpdHlfZnVsbCIsImFuYWx5dGljc19mdWxsIiwidG9rZW5zX2Z1bGwiLCJ3ZWJob29rc19mdWxsIiwidGVtcGxhdGVzX2Z1bGwiLCJzdXBwcmVzc2lvbnNfZnVsbCIsInNtc19mdWxsIl19.n91TYjasuJxjIaRl6SlZYTFzSBDqyh4RwvPMOCBCjAdcLCUU_BzxZfWTgYbS3HzxpMoYAK2nc6_aAf8uUXxeIB2Y8ttGMi5RlgnRS8WfIul3loaFedcthXn_64FASem8bURfIZvQpkyD874i2OuV2N8PQ0N30vBgIwf9fAUv3AxzxrxHa3OIagbdeQ4hDkbM4coRyG5FuE3wru22pX5I1Q1bU2BUhetQwjMRS7c5pSfWGKkowlGomt2MTUSbZKxOpLIzTA4oLxmHW-Ww_muxF0fmcok3cYriS6HhooEdDd6XE7ZzJYZxk6c5X8IiYoEFIA4RipfN6H4z3DQNPuU-6gLwsYVpR_-YpjsRK7ycM59I1afAgXl7BqsN1esN_GZhQsu8bL7Llt9vwHgiH05_zXOYIOOc51JlzQMt3ayevTfEZ4XN1JkM00Vn9eaqb64zMgfArU6RtUZS0qRr9oAaolvA7Q6DiN9P1woaKv9p3rYkTTEI_Y7lYNB5SdKxbhEUuK9mcMzUi0VhCmNfN80g7BYaGzECS4GSymhdapKmdIRPw8IkeoT7abRw3vttPZtuRP7OnuPNf3sOAJ3Leco8WPyDxa1f1fAjIIwo9JZcEPTrv8FX3Hf_y3JAnn-vllD8Q6_0WA4uhDpZT6LSOcbdyn3itxKZJdn-vsZ_hmbkeI0');
define('HOSTNAME', 'localhost/faturamais');

Config::initialize(function($cfg)
{
    $cfg->set_model_directory('./models');
    $cfg->set_connections(
        array(
            'development' => 'mysql://root@localhost/faturamais',
        )
    );
});

// Criação da função "str_contains" vinda do PHP 8
// baseado em função do frameowrk Laravel
if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle) {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}