<?php
require "../database/db.php";
header('Refresh: 5; ../index.php');


$titre = $_POST['titre'];
$auteur = $_POST['auteur'];
$type = $_POST['type'];
$description = $_POST['description'];
$date_creation = $_POST['date_creation'];
$prix = $_POST['prix'];
$btnSave = $_POST['save'];



if (isset($titre, $auteur, $type, $description, $date_creation, $prix)) {
    if ($btnSave) {
        $stmt = $PDO->prepare("INSERT INTO livre (title , author, type, description, created_date, price) VALUES (?, ?, ?, ?, ?,?) ");
            $stmt->execute([$titre, $auteur, $type, $description, $date_creation, $prix]);
            echo "<p style='color:green'> Data inserted successfully ! </p>";
    } else {
        echo "<p style='color:red'> Data no inserted ! </p>";
    }
} else {
   echo "problème de variables venant du formulaire !";
}


