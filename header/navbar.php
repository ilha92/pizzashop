<!DOCTYPE html>
<html>
<head>
    <title>Pizza Shop</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css"> <!-- Lien vers votre fichier de styles CSS -->
</head>
<body>
<header>
<nav>
    <ul>
        <li><a href="../index.php">Accueil</a></li>
        <li><a href="../pages/carte.php">Carte</a></li>
        <li><a href="../pages/promos.php">Engagements</a></li>
        <li><a href="../pages/contact.php">Contact</a></li>
        <li><a href="../pages/engagements.php">Engagements</a></li>
        <li><a href="../pages/panier.php">Panier</a></li>
        <li><a href="../pages/compte.php">Mon compte</a></li>
        <?php
        // Vérifier si l'utilisateur est connecté
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            echo '<li><a href="../acces/deconnexion.php">Déconnexion</a></li>';
        } else {
            echo '<li><a href="../acces/login.php">Connexion</a></li>';
            echo '<li><a href="../acces/register.php">Inscription</a></li>';
        }
        ?>
    </ul>
</nav>

</header>
</body>
</html>