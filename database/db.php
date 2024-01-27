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
// $host = 'db5014900067.hosting-data.io';
//         $dbname = 'dbs12379107';
//         $username = 'dbu252598';
//         $password = 'Trium.1984';

//         try {

//             $PDO = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
//             // echo "connecté";
//         } catch (PDOException $e) {

//             echo "message d'erreur :" . $e->getMessage();
//         }