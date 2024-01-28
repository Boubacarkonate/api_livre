<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>h1 {text-align: center; padding: 2%;} form{text-align: center;}</style>
</head>
<body>
    <h1>CREER UNE ANNONCE D'UN LIVRE</h1>
    <form action="../crud/create/create.php" method="post">
        <label for="titre">Titre</label>
        <br>
        <input type="text" name="titre" id="" placeholder="titre">
        <br><br>
        <label for="auteur">Auteur</label>
        <br>
        <input type="text" name="auteur" id="" placeholder="auteur">
        <br><br>
        <label for="type">Type</label>
        <br>
        <input type="text" name="type" id="" placeholder="type">
        <br><br>
        <label for="description">Description</label>
        <br>
        <textarea name="description" id="" placeholder="résumé du livre" cols="30" rows="10"></textarea>
        <br><br>
        <label for="date">Date de parution</label>
        <br>
        <input type="date" name="date_creation" id="" placeholder="date de création">
        <br><br>
        <label for="prix">Prix</label>
        <br>
        <input type="number" name="prix" id="" placeholder="prix">
        <br><br>
        <input type="submit" name="save" value="ENVOYER" class="p-3 mb-2 bg-black text-white rounded-pill text-decoration-none mt-1">
    </form>
</body>
</html>