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
   
        <h2>Les Promos du Jour</h2>
        <!-- Afficher les produits en promotion ici -->
     <ul>
            <li>
                <h3>Pizza Margherita</h3>
                <img src="../image/pizza/margherita.avif" alt="">
                <br>
                <p>Pizza classique avec de la sauce tomate, du fromage et des tomates fraîches.</p>
                <br>
                <p>Prix: 10.99 €</p>
                <!-- Bouton Commander pour ajouter au panier -->
                <button class="commander" data-produit="Pizza Margherita" data-prix="10.99">Ajouter au Panier<i class="ri-price-tag-3-line"></i></button>
            </li>
            <li>
                <h3>Pizza Pepperoni</h3>
                <img src="../image/pizza/pepperoni.avif" alt="">
                <br>
                <p>Pizza garnie de pepperoni, de fromage et de sauce tomate.</p>
                <br>
                <p>Prix: 12.99 €</p>
                <!-- Bouton Commander pour ajouter au panier -->
                <button class="commander" data-produit="Pizza Pepperoni" data-prix="12.99">Ajouter au Panier<i class="ri-price-tag-3-line"></i></button>
            </li>
            <li>
         <h3>CHEEKY PIZZA MERGUEZ</h3>
         <img src="../image/pizza/Cheeky pizza merguez.avif" alt=""> <!-- Chemin de l'image de la pizza Beef & Cheddar -->
         <img src="../image/pizza/new.avif" alt="">
         <h5><p class="description">Une pizza épicée à la merguez garnie de poivrons et de frites, accompagnée d'une sauce blanche kebab.</p></h5>
         <h5><p class="ingredients">Ingrédients : Sauce tomate, mozzarella, viande kebab, duo de poivrons, Domino's Fries, sauce blanche kebab.</p></h5>
         <p>Prix:14 €</p>
         <button class="commander" data-produit="CHEEKY PIZZA MERGUEZ" data-prix="14">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
         </li>
         <li>
         <h4>SUMMER GRILLED</h4>
         <img src="../image/pizza/summer grilled.avif" alt="Authentique Raclette">
         <img src="../image/pizza/new.avif" alt="">
         <h5><p class="description">Une pizza légère avec des légumes grillés, des olives et des tomates, agrémentée d'origan.</p></h5>
         <h5><p class="ingredients">Ingrédients : Sauce tomate, mozzarella, mélange de légumes grillés (aubergines, courgettes, poivrons rouges et jaunes),olives Kalamata bio, tomates fraîches, origan.</p></h5>
         <p>Prix:13 €</p>
         <button class="commander" data-produit="SUMMER GRILLED" data-prix="13">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
         </li>
            <!-- Ajouter d'autres articles en promotion ici -->
    </ul>
    <br><br><br><br>
    <footer>
        <p>© 2023 Pizza Shop. Tous droits réservés.</p>
    </footer>
</body>
</html>
