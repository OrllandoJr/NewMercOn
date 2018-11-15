<?php

function getConnetion()
{
    $dsn = 'mysql:host = %; dbname = thanos; charset = utf8';
    $user = 'thanos';
    $pass = '123';

    try {
        $pdo = new PDO($dsn, $user, $pass);

        return $pdo;
    } catch (PDOException $ex) {
        echo 'Não foi possível conectar ao Banco de Dados';
    }
}

