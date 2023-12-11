<?php
require "db.php";
//headers :

header("Access-Control-Allow-Origin: *");       //accès autorisé à tous les domaine d'accéder à l'api
header("Content-Type: application/json; charset=UTF-8");  //réponse est au format JSON et utilise l'encodage UTF-8.
header("Access-Control-Allow-Methods: GET");       //seule la méthode GET est autorisée.


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        if ($PDO) {
         
         //ma query
         $stmt = $PDO->query("SELECT * FROM livre");                                                                          
         
         //vérification s'il y a au mois un livre dans ma table
         if ($stmt->rowCount() > 0 ) {
     
         //récupération de tous les livres
               $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
         //       foreach ($result as $key => $value) {
         // print_r($value) ; 
         http_response_code(200);
         echo json_encode($result, JSON_PRETTY_PRINT);  //sortie JSON est formatée de manière lisible, avec une indentation et des sauts de ligne et  non des données compactes
     
             //si pas de livres dans la table
          }else {
             // echo "rien à récupérer";
             echo json_encode(["message" => "Aucun livre à récupérer"]);
     
          }
        
        }
     } catch(Exception $e) {
         $erreur = [
             "message" => $e-> getMessage(),
             "code"    => $e-> getCode()
         ];
         echo json_encode($erreur);
     }
} else {
    http_response_code(405);
    echo json_encode(["message" => "la méthode n'est pas autorisée"]);
}


// print_r($_SERVER);

  
    




