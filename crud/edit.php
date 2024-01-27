<?php
header("Access-Control-Allow-Origin: *");       //accès autorisé à tous les domaine d'accéder à l'api
header("Content-Type: application/json; charset=UTF-8");  //réponse est au format JSON et utilise l'encodage UTF-8.
header("Access-Control-Allow-Methods: PUT");

require "../database/db.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
  
    parse_str(file_get_contents("php://input"), $putDonnees);

    $titre = $putDonnees['titre'];
    $auteur = $putDonnees['auteur'];
    $type = $putDonnees['type'];
    $description = $putDonnees['description'];
    $date_creation = $putDonnees['date_creation'];
    $prix = $putDonnees['prix'];

    
    $stmt = $PDO->prepare("UPDATE livre SET title = ?, author = ?, type = ?, description = ?, created_date = ?, price = ? WHERE id = ?");
    $stmt->execute([$titre, $auteur, $type, $description, $date_creation, $prix, $id]);

    http_response_code(200);
    echo json_encode(["message" => "La mise à jour a été effectuée"]);

} else {
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
?>
