<?php

return [
    'database'=>[
                'name'=>'test_php_tutorials',
                'username'=>'root',
                'password'=>'',
                'connection' => 'mysql:host=127.0.0.1',
                'options'=>[
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                ]
            ]
        ];
