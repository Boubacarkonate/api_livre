<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une annonce d'un livre</title>
    <style>
        h1 {text-align: center; padding: 5%;}
        form {text-align: center;}
    </style>
</head>
<body>
    <h1>MODIFIER UNE ANNONCE D'UN LIVRE</h1>

    <?php
    require "../database/db.php";

    $id = isset($_GET['id']) ? intval($_GET['id']) : null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Traitement du formulaire de modification 
        $titre = $_POST['titre'];
        $auteur = $_POST['auteur'];
        $type = $_POST['type'];
        $description = $_POST['description'];
        $date_creation = $_POST['date_creation'];
        $prix = $_POST['prix'];

        

        //requête préparée pour éviter les attaques par injection SQL
        $stmt = $PDO->prepare("UPDATE livre SET title = ?, author = ?, type = ?, description = ?, created_date = ?, price = ? WHERE id = ?");
        $stmt->execute([$titre, $auteur, $type, $description, $date_creation, $prix, $id]);

       
        echo "Mise à jour effectuée avec succès.";
        header('Refresh: 3; ../index.php');
    }

    $stmt = $PDO->prepare("SELECT * FROM livre WHERE id = ?");
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) :
    ?>

    <form action="" method="post">
        <label for="titre">Titre</label>
        <br>
        <input type="text" name="titre" id="titre" placeholder="Titre" value="<?= $result['title']; ?>">
        <br><br>
        <label for="auteur">Auteur</label>
        <br>
        <input type="text" name="auteur" id="auteur" placeholder="Auteur" value="<?= $result['author']; ?>">
        <br><br>
        <label for="type">Type</label>
        <br>
        <input type="text" name="type" id="type" placeholder="Type" value="<?= $result['type']; ?>">
        <br><br>
        <label for="description">Description</label>
        <br>
        <textarea name="description" id="description" placeholder="Résumé du livre" cols="30" rows="10"><?= $result['description']; ?></textarea>
        <br><br>
        <label for="date_creation">Date de parution</label>
        <br>
        <input type="date" name="date_creation" id="date_creation" placeholder="Date de création" value="<?= $result['created_date']; ?>">
        <br><br>
        <label for="prix">Prix</label>
        <br>
        <input type="number" name="prix" id="prix" placeholder="Prix" value="<?= $result['price']; ?>">
        <br><br>
        <input type="submit" name="modifier" value="ENREGISTRER">
    </form>
    </body>
    </html>

    <?php
    else :
        echo "Livre non trouvé.";
    endif;
    ?>
