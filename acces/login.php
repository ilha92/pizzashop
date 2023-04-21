<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=pizza;charset=utf8;','root', '');

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // Rediriger vers la page d'accueil si déjà connecté
    header("Location: ../index.php");
    exit();
}

// Traitement du formulaire de connexion
if(isset($_POST['connexion'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']); // Attention, utiliser un algorithme de hachage sécurisé serait préférable

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
        $recupUser->execute(array($pseudo, $mdp));
        if($recupUser->rowCount() > 0){
            $user = $recupUser->fetch();
            $_SESSION['pseudo'] = $user['pseudo'];
            $_SESSION['mdp'] = $user['mdp'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['logged_in'] = true; // Définir une variable de session pour indiquer que l'utilisateur est connecté
            // Rediriger vers la page d'accueil ou une autre page appropriée
            header("Location: ../index.php");
            exit();
        } else {
            echo "Pseudo ou mot de passe incorrect.";
        }
    } else { 
        echo "Veuillez remplir tous les champs...";
    }
}

// Traitement du formulaire de déconnexion
if(isset($_POST['deconnexion'])){
    // Détruire toutes les variables de session et rediriger vers la page de connexion
    session_unset();
    session_destroy();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Connexion</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../style/style.css">

 <script>
        function togglePassword() {
            var passwordInput = document.getElementById("mdp");
            var toggleBtn = document.getElementById("toggleBtn");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleBtn.innerHTML = "Cacher";
            } else {
                passwordInput.type = "password";
                toggleBtn.innerHTML = "Afficher";
            }
        }
    </script>
</head>
<body>
<header>
        <h1>Pizza Shop</h1>
        <?php require_once('../header/navbar.php'); ?>
    </header>
    <main><h2>Se connecter</h2>
        <!-- Formulaire de connexion -->
<form method="post" action="" align="center">
            <input type="text" name="pseudo" autocomplete="off" placeholder="Pseudo">
            <br>
            <div class="password-toggle">
                <input type="password" name="mdp" id="mdp" autocomplete="off" placeholder="Mot de passe">
                <span class="toggle-btn" id="toggleBtn" onclick="togglePassword()">Afficher</span>
            </div>
            <br/><br/>
             <input type="submit" name="connexion" value="Connexion">
</form></main>
    
<!-- Formulaire de déconnexion -->
<form method="post" action="">
    <input type="submit" name="deconnexion" value="Déconnexion">
</form>
</body>
</html>