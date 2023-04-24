<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=pizza;charset=utf8;','root', '');
if(isset($_POST['valider'])){
    // Vérifier si l'utilisateur est déjà connecté
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        // Rediriger vers la page d'accueil si déjà connecté
        header("Location: ../index.php");
        exit();
    }
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp']) && !empty($_POST['email'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);
        $email = htmlspecialchars($_POST['email']);
        $insertUser = $bdd->prepare('INSERT INTO users(pseudo, mdp, email, avatar) VALUES(?, ?, ?, ?)');
        $insertUser->execute(array($pseudo, $mdp, $email, "default.jpg"));

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
        $recupUser->execute(array($pseudo, $mdp));
        if($recupUser->rowCount() > 0){
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'];
        }

        echo $_SESSION['id'];
    }else{ 
        echo "Veuillez remplir tous les champs...";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>S'inscrire</title>
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
    <br>
    <main>
        <h2>S'inscrire</h2>
        <form method="post" action="" align="center">
            <input type="text" name="pseudo" autocomplete="off" placeholder="Pseudo">
            <br>
            <input type="email" name="email" autocomplete="off" placeholder="Email">
            <br>
            <div class="password-toggle">
                <input type="password" name="mdp" id="mdp" autocomplete="off" placeholder="Mot de passe">
                <span class="toggle-btn" id="toggleBtn" onclick="togglePassword()">Afficher</span>
            </div>
            <br/><br/>
            <input type="submit" name="valider" value="Valider">
            <a href="login.php">login ?</a> <!-- Lien pour réinitialiser le mot de passe -->
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