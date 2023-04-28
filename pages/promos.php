<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pizza Shop - Promos</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Inclusion de la bibliothèque jQuery -->
    <script>
        $(document).ready(function() {
            // Fonction pour ajouter un produit au panier
            $(".commander").click(function() {
                var produit = $(this).data("produit"); // Récupérer le nom du produit à partir de l'attribut data
                var prix = $(this).data("prix"); // Récupérer le prix du produit à partir de l'attribut data

                // Envoyer les données au script panier.php via Ajax
                $.ajax({
                    url: "panier.php",
                    type: "post",
                    data: {
                        commander: 1,
                        produit: produit,
                        prix: prix
                    },
                    success: function(response) {
                        alert("Le produit a été ajouté au panier."); // Afficher un message d'alerte en cas de succès
                    },
                    error: function() {
                        alert("Une erreur s'est produite. Veuillez réessayer."); // Afficher un message d'erreur en cas d'échec
                    }
                });
            });
        });
    </script>
</head>
<body>
    <header>
        <h1>Pizza Shop</h1>
        <?php require_once('../header/navbar.php'); ?>
    </header>
    <br><br>
    <main>
        <h2>Les Promos du Jour</h2>
        <!-- Afficher les produits en promotion ici -->
        <ul>
            <li>
                <h3>Pizza Margherita</h3>
                <br>
                <p>Pizza classique avec de la sauce tomate, du fromage et des tomates fraîches.</p>
                <br>
                <p>Prix: 10.99 €</p>
                <!-- Bouton Commander pour ajouter au panier -->
                <button class="commander" data-produit="Pizza Margherita" data-prix="10.99">Commander</button>
            </li>
            <li>
                <h3>Pizza Pepperoni</h3>
                <br>
                <p>Pizza garnie de pepperoni, de fromage et de sauce tomate.</p>
                <br>
                <p>Prix: 12.99 €</p>
                <!-- Bouton Commander pour ajouter au panier -->
                <button class="commander" data-produit="Pizza Pepperoni" data-prix="12.99">Commander</button>
            </li>
            <!-- Ajouter d'autres articles en promotion ici -->
        </ul>
    </main>
    <br><br><br><br>
    <footer>
        <p>© 2023 Pizza Shop. Tous droits réservés.</p>
    </footer>
</body>
</html>
