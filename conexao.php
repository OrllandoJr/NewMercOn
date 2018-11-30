<?php

function getConnetion()
{
    $dsn = 'mysql:host = 127.0.0.1; dbname = banco; charset = utf8';
    $user = 'root';
    $pass = '';

    try {
        $pdo = new PDO($dsn, $user, $pass);

        return $pdo;
    } catch (PDOException $ex) {
        echo 'Não foi possível conectar ao Banco de Dados';
    }
}

