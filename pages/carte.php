<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Pizza Shop - Carte</title>
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
    <button onclick="showCategory('toutes')">A la une</button>
    <button onclick="showCategory('classique')">Grands Classiques</button>
    <button onclick="showCategory('nouveau')">Nouveauté</button>
    <button onclick="showCategory('vegan')"><i class="ri-leaf-line"></i>Gourmand Veggies</button>
<br><br><br>
    <div id="toutes" class="pizza">
        <h2>A la une</h2>
        <ul>
            <li>
            <h3>Margherita</h3>
                <img src="../image/pizza/margherita.avif" alt="">
                <h5><p>Description: Pizza classique avec de la sauce tomate, du fromage mozzarella et du basilic.</p></h5>
                <h5><p>Ingrédients: Sauce tomate, fromage mozzarella, basilic.</p></h5>
                <p>Prix: 8,99€</p>
                <button class="commander" data-produit="Pizza Margherita" data-prix="8.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
            </li>
            <li>
            <h3>Pepperoni</h3>
                <img src="../image/pizza/pepperoni.avif" alt="">
                <h5><p>Description: Pizza avec de la sauce tomate, du fromage mozzarella et des tranches de pepperoni.</p></h5>
                <h5><p>Ingrédients: Sauce tomate, fromage mozzarella, pepperoni.</p></h5>
                <p>Prix: 9,99€</p>
                <button class="commander" data-produit="Pizza Pepperoni" data-prix="9.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
            </li>
            <li>
            <h3>Quatre Fromages</h3>
                <img src="../image/pizza/4 fromage.avif" alt="">
                <h5><p><h4>Description: Pizza avec de la sauce tomate et un mélange de quatre fromages (mozzarella, emmental, gorgonzola, parmesan).</h4></p></h5>
                <h5><p>Ingrédients: Sauce tomate, fromage mozzarella, fromage emmental, fromage gorgonzola, fromage parmesan.</p></h5>
                <p>Prix: 10,99€</p>
                <button class="commander" data-produit="Pizza Quatre fromages" data-prix="10.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
            </li>
            <li>
                <h3>Végétarienne</h3>
                <img src="../image/pizza/supervegie.avif" alt="">
                <h5><p>Description: Pizza avec de la sauce tomate, du fromage mozzarella, des légumes (poivrons, oignons, champignons) et des olives.</p></h5>
                <h5><p>Ingrédients: Sauce tomate, fromage mozzarella, poivrons, oignons, champignons, olives.</p></h5>
                <p>Prix: 11,99€</p>
                <button class="commander" data-produit="Pizza Vegetarienne" data-prix="11.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
            </li>
            <li>
                <h3>Reine</h3>
                <img src="../image/pizza/reine.avif" alt="">
                <h5><p>Description: Pizza avec de la sauce tomate, du fromage mozzarella, du jambon et de l'ananas.</p></h5>
                <h5><p>Ingrédients: Sauce tomate, mozzarella, jambon, champignons de Paris.</p></h5>
                <p>Prix: 12,99€</p>
                <button class="commander" data-produit="Pizza Reine" data-prix="12.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
</li>
</ul>
</div>

<div id="classique" class="pizza">
<h2>Grands Classiques</h2>
<ul>
        <li> 
            <h3>Beef & Cheddar</h3>
            <img src="../image/pizza/beef&cheddar.avif" alt="Pizza Beef & Cheddar"> <!-- Chemin de l'image de la pizza Beef & Cheddar -->
            <h5><p class="description"> Une pizza avec de la viande de boeuf hachée, du fromage cheddar, des oignons et de la sauce barbecue.</p></h5>
            <h5><p class="ingredients">Ingrédients : Viande de boeuf hachée, fromage cheddar, oignons, sauce barbecue</p></h5>
            <p>Prix:14 €</p>
            <button class="commander" data-produit="Beef&Cheddar" data-prix="14">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
        </li>
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
    <li>
        <h3>Végétarienne</h3>
        <img src="../image/pizza/vegan rocket.avif" alt="">
        <p>Description: Pizza avec de la sauce tomate, du fromage mozzarella, des légumes (poivrons, oignons, champignons) et des olives.</p></h5>
        <h5><p>Ingrédients: Sauce tomate, fromage mozzarella, poivrons, oignons, champignons, olives.</p></h5>
        <p>Prix: 11,99€</p>
        <button class="commander" data-produit="Pizza Vegetarienne" data-prix="11.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
    </li>
     <li>
         <h4>Authentique Raclette</h4>
         <img src="../image/pizza/authentiqueraclette.avif" alt="Authentique Raclette">
        <h5><p class="description">Une pizza gourmande avec une généreuse couche de fromage raclette fondant, accompagnée de pommes de terre et d'oignons caramélisés.</p></h5>
        <h5><p class="ingredients">Ingrédients : Fromage raclette, pommes de terre, oignons, jambon cru</p></h5>
        <p>Prix:13 €</p>
        <button class="commander" data-produit="Authentique Raclette" data-prix="13">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
     </li>
</ul>
</div>
<div id="nouveau" class="pizza">
<h2>Nouveautés<h4>BEST SELLERS</h4></h2>
    <ul>
    <li>
        <h3>CHEEKY PIZZA MERGUEZ</h3>
        <img src="../image/pizza/Cheeky pizza merguez.avif" alt="">
        <img src="../image/pizza/new.avif" alt=""> <!-- Chemin de l'image de la pizza Beef & Cheddar -->
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
        <h5><p class="ingredients">Ingrédients : Sauce tomate, mozzarella, mélange de légumes grillés 
            (aubergines, courgettes, poivrons rouges et jaunes),olives Kalamata bio, tomates fraîches, origan.</p></h5>
        <p>Prix:13 €</p>
        <button class="commander" data-produit="SUMMER GRILLED" data-prix="13">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
    </li>
    <li>
        <h4>CHEEKY PIZZA KEBAB</h4>
        <img src="../image/pizza/cheeky kebab.avif" alt="Divine 3 Fromages">
        <img src="../image/pizza/new.avif" alt="">
        <h5><p class="description">Une pizza kebab avec une base de sauce tomate, de la mozzarella, de la viande kebab, des poivrons et une sauce blanche kebab.</p></h5>
        <h5><p class="ingredients">Ingrédients : Sauce tomate, mozzarella, viande kebab, duo de poivrons,sauce blanche kebab.</p></h5>
        <p>Prix:12.20 €</p>
        <button class="commander" data-produit="CHEEKY PIZZA KEBAB" data-prix="12.90">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
    </li>
            <li>
                <h4>SUBLIM'CURRY</h4>
                <img src="../image/pizza/curry.avif" alt="">
                <img src="../image/pizza/new.avif" alt="">
                <h5><p class="description">Une pizza SUBLIM'CURRY avec Crème fraîche légère française, mozzarella, oignons, poulet rôti.</p></h5>
                <h5><p class="ingredients">Ingrédients :Crème fraîche légère française, mozzarella, oignons, poulet rôti, duo de poivrons, sauce au curry.</p></h5>
                <p>Prix:11.99 €</p>
                <button class="commander" data-produit="SUBLIM'CURRY" data-prix="11.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
            </li>
            <li>
                <h4>CHICK'N GRILLED</h4>
                <img src="../image/pizza/CHIKEN GRIL.avif" alt="Chicken & Cheddar">
                <img src="../image/pizza/new.avif" alt="">
                <h5><p class="ingredients">Ingrédients: Sauce tomate, mozzarella, mélange de légumes grillés 
                (aubergines, courgettes, poivrons rouges et jaunes), poulet rôti, tomates fraîches, origan.</p></h5>
                <p>Prix:13.99 €</p>
                <button class="commander" data-produit="CHICK'N GRILLED" data-prix="13.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
            </li>
    </ul>
</div>
<div id="vegan" class="pizza">
    <h2>Gourmandes Veggies</h2>
    <ul>
        <li>
            <h3>Royal Veggie</h3>
            <img src="../image/pizza/royal veggie.avif" alt="Pizza Royal Veggie"> <!-- Chemin de l'image de la pizza Royal Veggie -->
            <h5><p>Description : Une pizza végétarienne avec de la sauce tomate, du fromage mozzarella, des champignons, des poivrons </p></h5>
            <h5><p>Ingrédients: Sauce tomate, fromage mozzarella, champignons, poivrons, oignons, olives, tomates</p></h5>
            <p>Prix:11.99 €</p>
            <button class="commander" data-produit="Royal Veggie" data-prix="11.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
        </li>
        <li>
                <h4>Cheesy&Veggie</h4>
                <img src="../image/pizza/cheesy&veggie.avif" alt="Cheesy & Veggie">
                <h5><p class="description">Une pizza délicieusement gourmande avec du fromage fondu, des légumes frais et une pâte croustillante.</p></h5>
                <h5><p class="ingredients">Ingrédients : Fromage, poivrons, champignons, oignons, olives</p></h5>
                <p>Prix:8.99 €</p>
                <button class="commander" data-produit="Cheesy&Veggie" data-prix="8.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
            </li>
            <li>
                <h4>Peppina</h4>
                <img src="../image/pizza/peppina.avif" alt="Peppina">
                <h5><p class="description">Une pizza végétarienne avec une délicieuse combinaison de légumes et de fromage, parfaite pour les amateurs de saveurs équilibrées.</p></h5>
                <h5><p class="ingredients">Ingrédients : Fromage, poivrons, tomates, oignons, basilic</p></h5>
                <p>Prix:9.99 €</p>
                <button class="commander" data-produit="Peppina" data-prix="9.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
            </li>
            <li>
                <h4>Super Veggie</h4>
                <img src="../image/pizza/supervegie.avif" alt="Super Veggie">
                <h5><p class="description">Une pizza végétarienne généreuse avec une variété de légumes frais et savoureux, idéale pour les amateurs de légumes.</p></h5>
                <h5><p class="ingredients">Ingrédients : Fromage, poivrons, champignons, oignons, tomates, olives, maïs</p></h5>
                <p>Prix:7.99 €</p>
                <button class="commander" data-produit="Super Veggie" data-prix="7.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
            </li>
</ul>
</div>
<script>
        function showCategory(category) {
            var pizzas = document.getElementsByClassName("pizza");
            for (var i = 0; i < pizzas.length; i++) {
                pizzas[i].style.display = "none";
            }
            document.getElementById(category).style.display = "block";
        }
    </script>
</body>
</html>