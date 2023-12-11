<?php

require "db.php";

// Headers :
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");

// Récupérer l'ID de la requête
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    try {
        if ($PDO) {
            // Utiliser une requête préparée pour éviter les attaques par injection SQL
            $stmt = $PDO->prepare("DELETE FROM livre WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                http_response_code(200);
                echo json_encode(["message" => "La suppression a été effectuée"]);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "Aucun livre trouvé avec l'id demandé"]);
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
