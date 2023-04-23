<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=pizza;charset=utf8;', 'root', '');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Rediriger vers la page de login si l'utilisateur n'est pas connecté
    header("Location: ../acces/login.php");
    exit();
}

// Récupérer les informations de l'utilisateur connecté
if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];

    // Récupérer les informations de l'utilisateur depuis la base de données
    $query = $bdd->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
    $query->execute(array('pseudo' => $pseudo));
    $usersinfo = $query->fetch();
} else {
    // Rediriger vers la page de login si les informations de l'utilisateur ne sont pas disponibles
    header("Location: ../acces/login.php");
    exit();
}

if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
{
    $taillemax = 2097152;
    $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
    if($_FILES['avatar']['size'] <= $taillemax )
    {
        $extensionsUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        if(in_array($extensionsUpload, $extensionsValides))
        {
            $chemin = "../acces/users/avatars/".$_SESSION['id'].".".$extensionsUpload;
            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
            if($resultat)
            {
                $updateavatar = $bdd->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
                $updateavatar->execute(array('avatar' => $_SESSION['id'].".".$extensionsUpload,'id' => $_SESSION['id']));
            }
            else{
                echo "Erreur durant l'importation de votre profil";
            }
        }
        else
        {
            echo "Extension de fichier non valide";
        }
    }
    else
    {
        echo "Fichier trop volumineux";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pizza Shop</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
<header>
    <h1>Pizza Shop</h1>
    <?php require_once('../header/navbar.php'); ?>
</header>
<br>
<h1>Bienvenue sur votre compte, <?php echo $pseudo; ?> !</h1>
<br><br><br>
<?php
if(!empty($usersinfo['avatar']))
{
?>
<img src="../acces/users/avatars/<?php echo $usersinfo['avatar'] ?>" width="150" />
<?php
}
?>
<!-- Afficher les informations de l'utilisateur -->
<p>Nom d'utilisateur : <?php echo $pseudo; ?></p>
<!-- Ajouter d'autres informations de l'utilisateur ici -->
<!-- Ajouter un lien de déconnexion -->
<form method="post" action="" enctype="multipart/form-data">
    <label>Avatar :</label>
    <input type="file" name="avatar">
    <br>
    <input type="submit" value="Mettre à jour mon image">
    <br><br>
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