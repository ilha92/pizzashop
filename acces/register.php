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

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = $_POST['mdp'];
    $email = htmlspecialchars($_POST['email']);

    // Vérification de la validité du mot de passe
    if(strlen($mdp) < 8 || !preg_match('/[A-Z]/', $mdp) || !preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $mdp)) {
        $error = "Le mot de passe doit avoir un minimum de 8 caractères, avec au moins une majuscule et un caractère spécial";
    } else {
        $mdp = sha1($mdp);
        $insertUser = $bdd->prepare('INSERT INTO users(pseudo, mdp, email, avatar) VALUES(?, ?, ?, ?)');
        $insertUser->execute(array($pseudo, $mdp, $email, "default.jpg"));

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
        $recupUser->execute(array($pseudo, $mdp));

        if($recupUser->rowCount() > 0){
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header("Location: ../acces/login.php");
            exit();
        } else { 
            $error = "Une erreur s'est produite, veuillez réessayer ultérieurement";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>S'inscrire</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script>
        function togglePassword(inputId, btnId) {
            var passwordInput = document.getElementById(inputId);
            var toggleBtn = document.getElementById(btnId);

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
     <h1 style="display: flex; align-items: center;">
    <img src="../image/pizza/panier.png" width="80" height="60" alt="Logo Pizza Shop" style="margin-right: 10px;">Cestino Pizza</h1>
     <?php include_once '../header/navbar.php'; ?>
 </header>
    <br>
    <main>
    <form method="post" action="" align="center">
        <h2>S'inscrire</h2>
        <form method="post" action="" align="center">
            <input type="text" name="pseudo" autocomplete="off" placeholder="Pseudo">
            <br>
            <input type="email" name="email" autocomplete="off" placeholder="Email">
            <br>
            <div class="password-toggle">
    <input type="password" name="mdp" id="mdp" autocomplete="off" placeholder="Mot de passe">
    <span class="toggle-btn"><i class="ri-eye-off-line" id="toggle-btn1" onclick="togglePassword('mdp', 'toggle-btn1')"></i></span>
</div>
<br/>
    <h6>8 caractere minimum</h6>
    <h6>1 Majuscules obligatoire</h6>
    <h6>1 Caractère Spéciaux </h6>
    <br>
<input type="submit" name="valider" value="Valider">
<a href="login.php">login ?</a> <!-- Lien pour réinitialiser le mot de passe -->
</form>
<?php
// Vérifier si le formulaire a été soumis
if (isset($_POST['valider'])) {
    // Vérifier si l'utilisateur est déjà connecté
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        // Rediriger vers la page d'accueil si déjà connecté
        header("Location: ../index.php");
        exit();
    }
    // Vérifier si tous les champs ont été remplis
    if (!empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['email'])) {
        // Vérifier si le mot de passe respecte les critères
        if (preg_match('/^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[0-9])(?=.*[a-z]).{8,}$/', $_POST['mdp'])) {
            // Récupérer les valeurs du formulaire
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mdp = sha1($_POST['mdp']);
            $email = htmlspecialchars($_POST['email']);

            // Insérer l'utilisateur dans la base de données
            $insertUser = $bdd->prepare('INSERT INTO users(pseudo, mdp, email, avatar) VALUES(?, ?, ?, ?)');
            $insertUser->execute(array($pseudo, $mdp, $email, "default.jpg"));

            // Récupérer l'utilisateur pour le connecter automatiquement
            $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
            $recupUser->execute(array($pseudo, $mdp));
            if($recupUser->rowCount() > 0){
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['mdp'] = $mdp;
                $_SESSION['id'] = $recupUser->fetch()['id'];
            }

            // le Redirige vers la page d'accueil
            header("Location: ../acces/login.php");
            exit();
        } else {
            $error = "Le mot de passe doit avoir au moins 8 caractères avec une majuscule et un caractère spécial (!@#$&*)";
        }
    } else {
        $error = "Veuillez remplir tous les champs...";
    }
}

// Afficher le message d'erreur s'il existe
if (isset($error)) {
    echo '<p class="error">' . $error . '</p>';
}
?>
    </main>
</body>
</html>