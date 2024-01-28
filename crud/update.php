<?php
require "../database/db.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header('Refresh: 3; ../index.php');

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $date_creation = $_POST['date_creation'];
    $prix = $_POST['prix'];

    $stmt = $PDO->prepare("UPDATE livre SET title = ?, author = ?, type = ?, description = ?, created_date = ?, price = ? WHERE id = ?");
    $stmt->execute([$titre, $auteur, $type, $description, $date_creation, $prix, $id]);

    http_response_code(200);
    echo json_encode(["message" => "La mise à jour a été effectuée"]);
} else {
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
