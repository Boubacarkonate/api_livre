<?php
$id = $_GET['id'];

if ($id) {

    $url = "http://localhost:8080/api/crud/read_unLivre?id=$id";
    $data = file_get_contents($url);
    $value = json_decode($data, true);
    // print_r($value);
    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Details du Livre</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    </head>
    <body>
        <h1>DETAILS DU LIVRE</h1>

        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <h2><?= $value['title'] ?></h2>
                    <div class="card-body">
                        <p class="card-text"><strong>AUTEUR :</strong> <?= $value["author"] ?></p>
                        <p class="card-text"><strong>TYPE :</strong> <?= $value["type"] ?></p>
                        <p class="card-text"><strong>RESUME :</strong> <?= $value["description"] ?></p>
                        <p class="card-text"><strong>DATE DE PARUTION :</strong> <?= $value["created_date"] ?></p>
                        <p><strong>PRIX :</strong> <span class="badge text-bg-success"><?= $value["price"] ?> €</span></p>
                        <br>
                        <a href="editFormulaire.php?id=<?=$value['id']?>">MODIFIER</a>
                        <a href="../crud/delete.php?id=<?=$value['id']?>">SUPPRIMER</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
<?php
} else {
    // Gérez le cas où 'id' n'est pas défini
    echo "L'ID n'est pas spécifié ou invalide.";
}
?>
