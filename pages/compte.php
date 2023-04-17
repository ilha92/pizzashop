<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
    // Rediriger vers la page de connexion si non connecté
    header("Location: ../acces/connexion.php");
    exit();
}

// Récupérer le pseudo de l'utilisateur connecté
$pseudo = $_SESSION['pseudo'];

// Inclure le fichier de configuration de la base de données
require_once('../acces/config.php');

// Requête SQL pour récupérer les informations de l'utilisateur
$query = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo");
$query->bindParam(':pseudo', $pseudo);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

// Vérifier si l'utilisateur existe dans la base de données
if (!$result) {
    // Rediriger vers la page de connexion si l'utilisateur n'existe pas
    header("Location: ../acces/connexion.php");
    exit();
}

// Récupérer les informations de l'utilisateur
$id_utilisateur = $result['id_utilisateur'];
$pseudo = $result['pseudo'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mon compte</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
    <header>
        <h1>Pizza Shop</h1>
        <?php require_once('../header/navbar.php'); ?>
    </header>
    <main>
        <h2>Mon compte</h2>
        <p>Bienvenue, <?php echo $pseudo; ?> !</p>
        <p>Voici vos informations :</p>
        <ul>
            <li>ID utilisateur : <?php echo $id_utilisateur; ?></li>
            <li>Pseudo : <?php echo $pseudo; ?></li>
        </ul>
    </main>
</body>
</html>
