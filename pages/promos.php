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
     <h1 style="display: flex; align-items: center;">
     <img src="../image/pizza/panier.png" width="80" height="60" alt="Logo Pizza Shop" style="margin-right: 10px;">Cestino Pizza</h1>
     <?php include_once '../header/navbar.php'; ?>
        <?php require_once('../footer.php'); ?>
     </header>
    <br><br>
   
        <h2>Les Promos du Jour</h2>
        <!-- Afficher les produits en promotion ici -->
        <div id="classique" class="pizza">
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
            <li>
            <h4>Chicken & Cheddar</h4>
            <img src="../image/pizza/chikenchedar.avif" alt="Chicken & Cheddar">
            <h5><p class="description">Une pizza généreuse avec du poulet grillé, du fromage cheddar, des oignons rouges et une délicieuse sauce barbecue.</p></h5>
            <h5><p class="ingredients">Ingrédients : Poulet grillé, fromage cheddar, oignons rouges, sauce barbecue</p></h5>
            <p>Prix:13.99 €</p>
        <button class="commander" data-produit="Chicken & Cheddar" data-prix="13.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
            </li>
            <li>
                <h4>Savoyarde</h4>
                <img src="../image/pizza/savoyarde.avif" alt="Savoyarde">
                <h5><p class="description">Une pizza savoyarde avec du fromage reblochon, des lardons fumés et des pommes de terre pour un goût authentique des Alpes.</p></h5>
                <h5><p class="ingredients">Ingrédients : Fromage reblochon, lardons fumés, pommes de terre, oignons</p></h5>
                <p>Prix:11.99 €</p>
        <button class="commander" data-produit="Savoyarde" data-prix="11.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
            </li>
    </ul>
    <div>
    <div class="centered">
        <h5>Pour votre santé, évitez de manger trop gras, trop sucré, trop salé</h5>
        <h5>Pour votre santé, évitez de grignoter entre les repas</h5>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
