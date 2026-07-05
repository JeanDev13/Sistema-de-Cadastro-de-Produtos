<?php

    $host = "localhost";
    $dbname = "loja2";
    $user = "root";
    $pass = "";

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        //echo "CONECTADO!";
    } catch (PDOException $e) {
        die ("Erro!" . $e->getMessage());
    }

?>