
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une annonce d'un livre</title>
    <style>h1 {text-align: center; padding: 2%;} form {text-align: center;}</style>
</head>
<body>
    <h1>MODIFIER UNE ANNONCE D'UN LIVRE</h1>
<?php
 require "../database/db.php";
 $id = isset($_GET['id']) ? intval($_GET['id']) : null;
$stmt = $PDO->prepare("SELECT * FROM livre WHERE id = ?");
$stmt->execute([$id]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    <form action="../crud/update.php?id=<?php echo $id; ?>" method="post">
        <!-- Utilisez un champ hidden pour simuler la méthode PUT -->
        <input type="hidden" name="_method" value="PUT">

        <label for="titre">Titre</label>
        <br>
        <input type="text" name="titre" id="titre" placeholder="Titre" value="<?= isset($result['title']) ? htmlspecialchars($result['title']) : ''; ?>">
        <br><br>
        <label for="auteur">Auteur</label>
        <br>
        <input type="text" name="auteur" id="auteur" placeholder="Auteur" value="<?= isset($result['author']) ? htmlspecialchars($result['author']) : ''; ?>">
        <br><br>
        <label for="type">Type</label>
        <br>
        <input type="text" name="type" id="type" placeholder="type" value="<?= isset($result['type']) ? htmlspecialchars($result['type']) : ''; ?>">
        <br><br>
        <label for="type">Description</label>
        <br>
        <input type="text" name="description" id="description" placeholder="description" value="<?= isset($result['description']) ? htmlspecialchars($result['description']) : ''; ?>">
        <br><br>
        <label for="auteur">Date de parution</label>
        <br>
        <input type="date" name="date_creation" id="date_creation" placeholder="date_creation" value="<?= isset($result['created_date']) ? htmlspecialchars($result['created_date']) : ''; ?>">
        <br><br>
        <label for="auteur">Prix</label>
        <br>
        <input type="text" name="prix" id="prix" placeholder="prix" value="<?= isset($result['price']) ? htmlspecialchars($result['price']) : ''; ?>">
        <br><br>
        <input type="submit" name="modifier" value="ENREGISTRER">
    </form>
</body>
</html>
