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
<body>
   <header>
        <h1>Pizza Shop</h1>
        <?php require_once('../header/navbar.php'); ?>
     </header>

    <main>
        <br><br>
        <form action="envoyer_message.php" method="post">
             <h1>Nous contacter</h1>
        <br>
        <p>Vous pouvez nous contacter via les coordonnées suivantes :</p>
        <ul>
            <li><i class="ri-mail-line"></i>Email : info@pizzashop.com</li>
            <li><i class="ri-phone-line"></i>Téléphone : +33 123 456 789</li>
            <li><i class="ri-map-pin-line"></i>Adresse : 123 rue des Pizzas, 75001 Paris</li>
        </ul>
        <p>Ou en utilisant le formulaire de contact ci-dessous :</p>
        <br>
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
