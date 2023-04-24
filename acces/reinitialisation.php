<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation de mot de passe</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
<header>
        <h1>Pizza Shop</h1>
        <?php require_once('../header/navbar.php'); ?>
     </header>
     <br>
     <h1>Réinitialisation de mot de passe</h1>
    <form method="POST" action="">
        <label for="email_reset">E-mail :</label>
        <input type="email" name="email" id="email_reset" required>
        <br><br>
        <label for="new_password">Nouveau mot de passe :</label>
        <input type="password" name="new_password" id="new_password" required>
        <br>
        <label for="confirm_password">Confirmer le mot de passe :</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
        <br>
        <input type="submit" name="reset_password" value="Réinitialiser le mot de passe">
    </form>

</body>
</html>
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=pizza;charset=utf8;','root', '');

// Traitement du formulaire de réinitialisation de mot de passe
if(isset($_POST['reset_password'])){
    if(!empty($_POST['email']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])){
        $email = htmlspecialchars($_POST['email']);
        $new_password = sha1($_POST['new_password']); // Attention, utiliser un algorithme de hachage sécurisé serait préférable
        $confirm_password = sha1($_POST['confirm_password']); // Attention, utiliser un algorithme de hachage sécurisé serait préférable

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $recupUser->execute(array($email));
        if($recupUser->rowCount() > 0){
            $user = $recupUser->fetch();
            if($new_password == $confirm_password){
                $updatePassword = $bdd->prepare('UPDATE users SET mdp = ? WHERE email = ?');
                $updatePassword->execute(array($new_password, $email));
                echo "Mot de passe réinitialisé avec succès.";
            } else {
                echo "Les nouveaux mots de passe ne correspondent pas.";
            }
        } else {
            echo "Aucun compte associé à cet e-mail.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>