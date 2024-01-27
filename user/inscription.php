
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>IINSCRIPTION</h1>
    <form action="inscription.php" method="post">
        <input type="text" name="pseudo" id="" placeholder="pseudo">
        <input type="email" name="email" id="" placeholder=" email">
        <input type="password" name="password" id="" placeholder="mot de passe">
        <input type="submit" name="save" value="ENVOYER">
    </form>
    <?php

require "../database/db.php";

$pseudo = $_POST['pseudo'];
$email = $_POST["email"];
$password = $_POST["password"];
$password_hash = password_hash($password,PASSWORD_BCRYPT);
$save = $_POST['save'];


if ($save) {
    $stmt = $PDO->prepare("INSERT INTO user (pseudo, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$pseudo, $email, $password_hash]);
        echo "<p style='color:green'> Data inserted successfully ! </p>";
        header("Refresh: 3; login.php");
        echo "bonjour ".$_SESSION['nom'];
} else {
    echo "<p style='color:red'> Data no inserted ! </p>";
} 




var_dump($_SESSION['mail']);
?>
</body>
</html>