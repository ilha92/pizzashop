<!DOCTYPE html>
<html>
<head>
    <title>Pizza Shop - Promos</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
    <header>
        <h1>Pizza Shop</h1>
        <?php require_once('../header/navbar.php'); ?>
    </header>
    <main>
        <h2>Les Promos du Jour</h2>
        <!-- Afficher les produits en promotion ici -->
        <ul>
            <li>
                <h3>Pizza Margherita</h3>
                <p>Pizza classique avec de la sauce tomate, du fromage et des tomates fraîches.</p>
                <p>Prix: 10.99 €</p>
                <!-- Bouton Commander pour ajouter au panier -->
                <form action="../pages/panier.php" method="post">
                    <input type="hidden" name="produit" value="Pizza Margherita">
                    <input type="hidden" name="prix" value="10.99">
                    <input type="submit" name="commander" value="Commander">
                </form>
            </li>
            <li>
                <h3>Pizza Pepperoni</h3>
                <p>Pizza garnie de pepperoni, de fromage et de sauce tomate.</p>
                <p>Prix: 12.99 €</p>
                <!-- Bouton Commander pour ajouter au panier -->
                <form action="../pages/panier.php" method="post">
                    <input type="hidden" name="produit" value="Pizza Pepperoni">
                    <input type="hidden" name="prix" value="12.99">
                    <input type="submit" name="commander" value="Commander">
                </form>
            </li>
            <!-- Ajouter d'autres articles en promotion ici -->
        </ul>
    </main>
    <footer>
        <p>© 2023 Pizza Shop. Tous droits réservés.</p>
    </footer>
</body>
</html>
