<?php
require "db.php";

// Headers :
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");

// Récupérer les données de la requête PUT
$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    try {
        if ($PDO) {
            // Utiliser une requête préparée pour éviter les attaques par injection SQL
            $stmt = $PDO->prepare("UPDATE livre SET title = :titre, author = :auteur, type = :type, description = :description, created_date = :creation, price = :prix WHERE id = :id");

            // Assurez-vous que les données nécessaires sont fournies dans la requête
            if (isset($data['id'], $data['titre'], $data['auteur'], $data['type'], $data['description'], $data['creation'], $data['prix'])) {
                // Liaison des valeurs aux paramètres
                $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
                $stmt->bindParam(':titre', $data['titre']);
                $stmt->bindParam(':auteur', $data['auteur']);
                $stmt->bindParam(':type', $data['type']);
                $stmt->bindParam(':description', $data['description']);
                $stmt->bindParam(':creation', $data['creation']);
                $stmt->bindParam(':prix', $data['prix']);

                // Exécution de la requête
                $stmt->execute();

                http_response_code(200);
                echo json_encode(["message" => "La mise à jour a été effectuée"]);
            } else {
                http_response_code(400);
                echo json_encode(["message" => "Données incomplètes dans la requête"]);
            }
        } else {
            http_response_code(503);
            echo json_encode(["message" => "Service indisponible"]);
        }
    } catch (Exception $e) {
        $erreur = [
            "message" => $e->getMessage(),
            "code"    => $e->getCode()
        ];
        echo json_encode($erreur);
    }
} else {
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
?>
