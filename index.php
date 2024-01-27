<?php
session_start();

// if ($_SESSION['nom'] == true && $_SESSION['mail'] == true && $_SESSION['mtp'] == true) {  
 

$url = "http://localhost:8080/api/crud/livres.php";
$data = file_get_contents($url);
$result = json_decode($data, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style> h1{text-align: center; padding-bottom: 5%;}</style>
</head>

<body>
    <h1>LISTES DES LIVRES</h1>
<!-- bonjour nom session  -->
    <div class="row">
        <?php foreach ($result as $value) : ?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <h2> <?= $value['title'] ?></h2>
                    <div class="card-body">
                        <p class="card-text"> <strong>AUTEUR : </strong><?= $value["author"] ?></p>
                        <p class="card-text"><strong>TYPE : </strong><?= $value["type"] ?></p>
                        <p class="card-text"><strong>RESUME : </strong><?= $value["description"] ?></p>
                        <p class="card-text"><strong>DATE DE PARUTION : </strong><?= $value["created_date"] ?></p>
                        <p><strong>PRIX :</strong> <span class="badge text-bg-success"><?= $value["price"] ?> €</span></p>
                        <br>
                        <a class="btn btn-primary text-end" href="./templates/lireUnLivre.php?id=<?= $value['id'] ?>">Détails</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="./templates/formulaire.php">CREER UNE ANNONCE</a>
<!--else redirection vers login si non logué-->
</body>

</html>