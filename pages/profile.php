<?php
session_start();
$bdd = new PDO('mysql:host=cl1-sql12;dbname=mvx77601;charset=utf8;', 'mvx77601', 'admin');
if (isset($_POST['new_username'])) {
    $newUsername = filter_var($_POST['new_username'], FILTER_SANITIZE_STRING);

    // Vérifier si le nouveau nom d'utilisateur est valide (par exemple, longueur minimale, caractères autorisés, etc.)

    // Mettre à jour le nom d'utilisateur dans la base de données
    $updateUsername = $bdd->prepare('UPDATE users SET pseudo = :pseudo WHERE id = :id');
    $updateUsername->execute(array('pseudo' => $newUsername, 'id' => $_SESSION['id']));

    // Mettre à jour le nom d'utilisateur dans la session
    $_SESSION['pseudo'] = $newUsername;

    // Rediriger vers la page de profil mise à jour
    header("Location: ../pages/compte.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="../image/panier.ico">
</head>
<body>
<header>
    <h1 style="display: flex; align-items: center;">
        <img src="../image/pizza/panier.png" width="80" height="60" alt="Logo Pizza Shop" style="margin-right: 10px;">Cestino Pizza
    </h1>
    <?php include_once '../header/navbar.php'; ?>
</header>
<br><br><br>
<form method="post" action="" enctype="multipart/form-data">
    <!-- Formulaire pour changer le nom d'utilisateur -->
    <label>Nouveau nom d'utilisateur :</label>
    <br>
    <input type="text" name="new_username" required>
    <br>
    <input type="submit" name="update_username" value="Changer le nom d'utilisateur">
</form>
</body>
</html>