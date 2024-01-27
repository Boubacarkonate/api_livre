<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <style>
        h1 {text-align: center; padding: 5%;} form{text-align: center;}
    </style>
</head>
<body>
    <h1>CREER UNE ANNONCE D'UN LIVRE</h1>
    <form action="../crud/create.php" method="post">
        <label for="titre">titre</label>
        <br>
        <input type="text" name="titre" id="" placeholder="titre">
        <br><br>
        <label for="auteur">auteur</label>
        <br>
        <input type="text" name="auteur" id="" placeholder="auteur">
        <br><br>
        <label for="type">type</label>
        <br>
        <input type="text" name="type" id="" placeholder="type">
        <br><br>
        <label for="description">description</label>
        <br>
        <textarea name="description" id="" placeholder="résumé du livre" cols="30" rows="10"></textarea>
        <br><br>
        <label for="date">date de parution</label>
        <br>
        <input type="date" name="date_creation" id="" placeholder="date de création">
        <br><br>
        <label for="prix">prix</label>
        <br>
        <input type="number" name="prix" id="" placeholder="prix">
        <br><br>
        <input type="submit" name="save" value="ENVOYER">
    </form>
</body>
</html>