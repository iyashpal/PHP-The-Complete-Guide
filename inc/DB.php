<?php

class DB
{
    public static function make($config)
    {
        try{
            return new PDO(
                "mysql:host={$config['host']};dbname={$config['database']}",
                $config['username'],
                $config['password']
            );
        } catch(PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}



function test($string)
{
    $a = explode(';', $string);
    $data = array();
    foreach($a as $partical) {
        $part = explode('=', $partical);
        $data[$part[0]] = $part[1];
    }
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

test('name=neha;email=neha@gmail.com;mobile=0987654321;city=mandi;state=HP;country=India');
