<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // Rediriger vers la page d'accueil si déjà connecté
    header("Location: ../index.php");
    exit();
}

// Inclure le fichier de configuration de la base de données
require_once('config.php');

// Vérifier si le formulaire de connexion est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];

    // Requête SQL pour vérifier les informations de connexion
    $query = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo AND mdp = :mdp");
    $query->bindParam(':pseudo', $pseudo);
    $query->bindParam(':mdp', $mdp);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    // Vérifier si les informations de connexion sont valides
    if ($result) {
        // Définir la variable de session pour indiquer que l'utilisateur est connecté
        $_SESSION['logged_in'] = true;
        $_SESSION['pseudo'] = $result['pseudo'];

        // Rediriger vers la page d'accueil
        header("Location: ../index.php");
        exit();
    } else {
        // Message d'erreur en cas d'échec de connexion
        $error = "Pseudo ou mot de passe incorrect";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Se connecter</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
    <header>
        <h1>Pizza Shop</h1>
        <?php require_once('../header/navbar.php'); ?>
    </header>
    <main>
        <h2>Se connecter</h2>
        <form method="post" action="">
            <label for="pseudo">Pseudo :</label>
            <input type="text" id="pseudo" name="pseudo" required>
            <label for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp" required>
            <input type="submit" value="Se connecter">
        </form>
        <?php
        // Afficher le message d'erreur s'il existe
        if (isset($error)) {
            echo '<p class="error">' . $error . '</p>';
        }
        ?>
    </main>
</body>
</html>
