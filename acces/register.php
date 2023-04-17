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

// Vérifier si le formulaire d'inscription est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];

    // Requête SQL pour vérifier si le pseudo existe déjà
    $query = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo");
    $query->bindParam(':pseudo', $pseudo);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    // Vérifier si le pseudo existe déjà
    if ($result) {
        // Message d'erreur en cas de pseudo déjà existant
        $error = "Le pseudo existe déjà, veuillez choisir un autre pseudo";
    } else {
        // Requête SQL pour insérer les informations d'inscription dans la base de données
        $query = $bdd->prepare("INSERT INTO utilisateurs (pseudo, mdp) VALUES (:pseudo, :mdp)");
        $query->bindParam(':pseudo', $pseudo);
        $query->bindParam(':mdp', $mdp);
        $query->execute();

        // Définir la variable de session pour indiquer que l'utilisateur est connecté
        $_SESSION['logged_in'] = true;
        $_SESSION['pseudo'] = $pseudo;

        // Rediriger vers la page d'accueil
        header("Location: ../index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>S'inscrire</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
    <header>
        <h1>Pizza Shop</h1>
        <?php require_once('../header/navbar.php'); ?>
    </header>
    <main>
        <h2>S'inscrire</h2>
        <form method="post" action="">
            <label for="pseudo">Pseudo :</label>
            <input type="text" id="pseudo" name="pseudo" required>
            <label for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp" required>
            <input type="submit" value="S'inscrire">
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
