<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=pizza;charset=utf8;','root', '');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Rediriger vers la page de login si l'utilisateur n'est pas connecté
    header("Location: ../acces/login.php");
    exit();
}

// Récupérer les informations de l'utilisateur connecté
if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];
} else {
    // Rediriger vers la page de login si les informations de l'utilisateur ne sont pas disponibles
    header("Location: ../acces/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mon Compte</title>
    <?php require_once('../header/navbar.php'); ?>
</head>
<body>
    <h1>Bienvenue sur votre compte, <?php echo $pseudo; ?> !</h1>
    <!-- Afficher les informations de l'utilisateur -->
    <p>Nom d'utilisateur : <?php echo $pseudo; ?></p>
    <!-- Ajouter d'autres informations de l'utilisateur ici -->
    <!-- Ajouter un lien de déconnexion -->
    <form method="post" action="">
        <input type="submit" name="deconnexion" value="Déconnexion">
    </form>

    <?php
    // Traitement du formulaire de déconnexion
    if(isset($_POST['deconnexion'])){
        // Détruire toutes les variables de session et rediriger vers la page de login
        session_unset();
        session_destroy();
        header("Location: ../acces/login.php");
        exit();
    }
    ?>
</body>
</html>
