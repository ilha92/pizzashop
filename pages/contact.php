<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pizza Shop - Contact</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<head>
    <title>Pizza Shop</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
     <header>
        <h1>Pizza Shop</h1>
     </header>
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

    <main>
        <br><br>
        <h1>Nous contacter</h1>
        <p>Vous pouvez nous contacter via les coordonnées suivantes :</p>
        <ul>
            <li>Email : info@pizzashop.com</li>
            <li>Téléphone : +33 123 456 789</li>
            <li>Adresse : 123 rue des Pizzas, 75001 Paris</li>
        </ul>
        <p>Ou en utilisant le formulaire de contact ci-dessous :</p>
        <form action="envoyer_message.php" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            <input type="submit" value="Envoyer">
        </form>
    </main>

    <footer>
        <p>© Pizza Shop. Tous droits réservés.</p>
    </footer>

</body>
</html>
