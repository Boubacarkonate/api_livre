<?php
require "../../database/db.php";
//headers :

header("Access-Control-Allow-Origin: *");       //accès autorisé à tous les domaine d'accéder à l'api
header("Content-Type: application/json; charset=UTF-8");  //réponse est au format JSON et utilise l'encodage UTF-8.
header("Access-Control-Allow-Methods: GET");       //seule la méthode GET est autorisée.

// Vérifiez si un ID est spécifié dans la requête GET  
$id = isset($_GET['id']) ? intval($_GET['id']) : null;


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        // Vérifiez si la connexion à la base de données est établie
        if ($PDO) {


            if ($id !== null) {
                // Si un ID est spécifié, récupérez le livre correspondant
                $stmt = $PDO->prepare("SELECT * FROM livre WHERE id = ?");
                $stmt->execute([$id]);

                if ($stmt->rowCount() > 0) {
                    // Récupération du livre spécifique
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo json_encode($result, JSON_PRETTY_PRINT);
                } else {
                    echo json_encode(["message" => "Aucun livre trouvé avec l'id"]);
                }
            } else {
                echo json_encode(["message" => "L'id du livre n'est pas spécifié"]);
            }
        } else {
            // Gestion du cas où la connexion à la base de données échoue
            echo json_encode(["message" => "Erreur de connexion à la base de données"]);
        }
    } catch (Exception $e) {
        // Gestion des exceptions
        $erreur = [
            "message" => $e->getMessage(),
            "code"    => $e->getCode()
        ];
        echo json_encode($erreur);
    }
}
