<?php
session_start();

require "../database/db.php";

if (isset($_POST["connexion"])) {
    $pseudo = $_POST['pseudo'];
    $email = $_POST["email"];
    $password = $_POST["password"];

   
    $sql = "SELECT id, pseudo, email, password FROM user WHERE pseudo = :pseudo AND email = :email";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
  
        $_SESSION['user'] = [
            'id' => $user['id'],
            'pseudo' => $user['pseudo'],
            'email' => $user['email'],
        ];

        header("Refresh: 3; ../index.php");
        echo "Connecté avec succès";
    } else {
        echo "Identifiants incorrects";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LOGIN</h1>
    <form action="" method="post">
        <input type="text" name="pseudo" id="" placeholder="pseudo">
        <input type="email" name="email" id="" placeholder="email">
        <input type="password" name="password" id="" placeholder="mot de passe">
        <input type="submit" name="connexion" value="ENVOYER">
    </form>
    <a href="inscription.php">inscription</a>
</body>
</html>
