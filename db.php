<?php 

$host = 'localhost';
        $dbname = 'api_livre';
        $username = 'root';
        $password = '';

        try {

            $PDO = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
            // echo "connecté";
        } catch (PDOException $e) {

            echo "message d'erreur :" . $e->getMessage();
        }