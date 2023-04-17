<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pizza Shop - Contact</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="accueil.php">Pizza Shop</a></li>
                <li><a href="carte.php">Carte</a></li>
                <li><a href="promos.php">Promos</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php if (isset($_SESSION['pseudo'])) { ?>
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                <?php } else { ?>
                    <li><a href="login.php">Connexion</a></li>
                    <li><a href="register.php">Inscription</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>

    <main>
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
