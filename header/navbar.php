<!DOCTYPE html>
<html>
<head>
    <title>Pizza Shop</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="../index.php">PizzaShop</a></li>
            <li><a href="../pages/carte.php">Carte</a></li>
            <li><a href="../pages/promos.php">Promos du jour</a></li>
            <li><a href="../pages/contact.php">Contact</a></li>
            <li><a href="../pages/engagements.php">Engagements</a></li>
            <li><a href="../pages/panier.php">Panier</a></li>
            <li><a href="../pages/compte.php">Mon compte</a></li>
            <li><a href="../pages/avis.php">Donner son avis</a></li>
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