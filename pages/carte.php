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

    <button onclick="showCategory('toutes')">A la une</button>
    <button onclick="showCategory('classique')">Grands Classiques</button>
    <button onclick="showCategory('nouveau')">Nouveauté</button>
    <button onclick="showCategory('vegan')">Gourmand Veggies</button>

    <div id="toutes" class="pizza">
        <h2>A la une</h2>
        <ul>
            <li>
                <h3>Pizza Margherita</h3>
                <p>Description: Pizza classique avec de la sauce tomate, du fromage mozzarella et du basilic.</p>
                <p>Ingrédients: Sauce tomate, fromage mozzarella, basilic.</p>
                <p>Prix: 8,99€</p>
                <button class="commander" data-produit="Pizza Margherita" data-prix="8.99">Commander</button>
            </li>
            <li>
                <h3>Pizza Pepperoni</h3>
                <p>Description: Pizza avec de la sauce tomate, du fromage mozzarella et des tranches de pepperoni.</p>
                <p>Ingrédients: Sauce tomate, fromage mozzarella, pepperoni.</p>
                <p>Prix: 9,99€</p>
                <button class="commander" data-produit="Pizza Pepperoni" data-prix="9.99">Commander</button>
            </li>
            <li>
                <h3>Pizza Quatre Fromages</h3>
                <p>Description: Pizza avec de la sauce tomate et un mélange de quatre fromages (mozzarella, emmental, gorgonzola, parmesan).</p>
                <p>Ingrédients: Sauce tomate, fromage mozzarella, fromage emmental, fromage gorgonzola, fromage parmesan.</p>
                <p>Prix: 10,99€</p>
                <button class="commander" data-produit="Pizza Quatre fromages" data-prix="10.99">Commander</button>
            </li>
            <li>
                <h3>Pizza Végétarienne</h3>
                <p>Description: Pizza avec de la sauce tomate, du fromage mozzarella, des légumes (poivrons, oignons, champignons) et des olives.</p>
                <p>Ingrédients: Sauce tomate, fromage mozzarella, poivrons, oignons, champignons, olives.</p>
                <p>Prix: 11,99€</p>
                <button class="commander" data-produit="Pizza Vegetarienne" data-prix="11.99">Commander</button>
            </li>
            <li>
                <h3>Pizza Hawaïenne</h3>
                <p>Description: Pizza avec de la sauce tomate, du fromage mozzarella, du jambon et de l'ananas.</p>
                <p>Ingrédients: Sauce tomate, fromage mozzarella, jambon, ananas.</p>
                <p>Prix: 12,99€</p>
                <button class="commander" data-produit="Pizza HaWaienne" data-prix="12.99">Commander</button>
</li>
</ul>
</div>
<div id="classique" class="pizza">
<h2>Grands Classiques</h2>
    <ul>
            <li>
                <h3>Pizza Margherita</h3>
                <p>Pizza classique avec de la sauce tomate, du fromage et des tomates fraîches.</p>
                <p>Prix: 10.99 €</p>
                <!-- Bouton Commander pour ajouter au panier -->
                <button class="commander" data-produit="Pizza Margherita" data-prix="10.99">Commander</button>
            </li>
    
                <li>
                    <img src="/pizzashop/image/pizza/reine.avif" alt="Reine">
                    <h4>Reine</h4>
                    <p class="ingredients">Ingrédients principaux :Tomate, mozzarella, jambon, champignons</p>
                    <p>Prix:11 €</p>
                    <button class="commander" data-produit="Reine" data-prix="11">Commander</button>
                </li>
                <li>
                    <img src="/pizzashop/image/pizza/orientale.avif" alt="Orientale">
                    <h4>Orientale</h4>
                    <p class="ingredients">Ingrédients principaux :Tomate, mozzarella, merguez, poivrons, oignons</p>
                    <p>Prix:12.5 €</p>
                    <button class="commander" data-produit="Orientale" data-prix="12.5">Commander</button>
                </li>
              
                <li>
                <img src="pizzashop/image/pizza/peperoni.jpg" alt="peperoni">
                    <h4>Pepperoni</h4>
                    <p class="ingredients">Ingrédients principaux :Tomate, mozzarella, pepperoni</p>
                    <p>Prix:9.70 €</p>
                    <button class="commander" data-produit="Pepperoni" data-prix="9.70">Commander</button>
                </li>
                <li>
                    <img src="/pizzashop/image/pizza/steak.avif" alt="Steak & Cheese">
                    <h4>Steak & Cheese</h4>
                    <p class="ingredients">Ingrédients principaux :Tomate, mozzarella, steak haché, oignons, fromage à raclette</p>
                    <p>Prix:13.5 €</p>
                    <button class="commander" data-produit="Steak&Cheese" data-prix="13.5">Commander</button>
                </li>
    </ul>
</div>

<div id="nouveau" class="pizza">
<h2>Nouveautés</h2>
    <ul>
        <li>
            <h3>Beef & Cheddar</h3>
            <img src="/pizzashop/image/pizza/beef&cheddar.avif" alt="Pizza Beef & Cheddar"> <!-- Chemin de l'image de la pizza Beef & Cheddar -->
            <p class="description"> Une pizza avec de la viande de boeuf hachée, du fromage cheddar, des oignons et de la sauce barbecue.</p>
            <p class="ingredients">Ingrédients principaux : Viande de boeuf hachée, fromage cheddar, oignons, sauce barbecue</p>
            <p>Prix:14 €</p>
            <button class="commander" data-produit="Beef&Cheddar" data-prix="14">Commander</button>>
        </li>
        <li>
                <h4>Authentique Raclette</h4>
                <img src="/pizzashop/image/pizza/authentiqueraclette.avif" alt="Authentique Raclette">
                <p class="description">Une pizza gourmande avec une généreuse couche de fromage raclette fondant, accompagnée de pommes de terre et d'oignons caramélisés.</p>
                <p class="ingredients">Ingrédients principaux : Fromage raclette, pommes de terre, oignons, jambon cru</p>
                <p>Prix:13 €</p>
                <button class="commander" data-produit="Authentique Raclette" data-prix="13">Commander</button>
            </li>
            <li>
                <h4>Divine 3 Fromages</h4>
                <img src="/pizzashop/image/pizza/FR_P4FR_fr_menu_9172.avif" alt="Divine 3 Fromages">
                <p class="description">Une pizza savoureuse avec une combinaison de 3 fromages différents : mozzarella, gorgonzola et parmesan, pour les amateurs de fromage.</p>
                <p class="ingredients">Ingrédients principaux : Mozzarella, gorgonzola, parmesan, tomates, basilic</p>
                <p>Prix:12.20 €</p>
                <button class="commander" data-produit="Divine 3 fromages" data-prix="12.90">Commander</button>
            </li>
            <li>
                <h4>Savoyarde</h4>
                <img src="/pizzashop/image/pizza/savoyarde.avif" alt="Savoyarde">
                <p class="description">Une pizza savoyarde avec du fromage reblochon, des lardons fumés et des pommes de terre pour un goût authentique des Alpes.</p>
                <p class="ingredients">Ingrédients principaux : Fromage reblochon, lardons fumés, pommes de terre, oignons</p>
                <p>Prix:11.99 €</p>
                <button class="commander" data-produit="Savoyarde" data-prix="11.99">Commander</button>
            </li>
            <li>
                <h4>Chicken & Cheddar</h4>
                <img src="/pizzashop/image/pizza/chikenchedar.avif" alt="Chicken & Cheddar">
                <p class="description">Une pizza généreuse avec du poulet grillé, du fromage cheddar, des oignons rouges et une délicieuse sauce barbecue.</p>
                <p class="ingredients">Ingrédients principaux : Poulet grillé, fromage cheddar, oignons rouges, sauce barbecue</p>
                <p>Prix:13.99 €</p>
                <button class="commander" data-produit="Chicken & Cheddar" data-prix="13.99">Commander</button>
            </li>
    </ul>
</div>

<div id="vegan" class="pizza">
    <h2>Gourmandes Veggies</h2>
    <ul>
        <li>
            <h3>Royal Veggie</h3>
            <img src="/pizzashop/image/pizza/royal veggie.avif" alt="Pizza Royal Veggie"> <!-- Chemin de l'image de la pizza Royal Veggie -->
            <p>Description : Une pizza végétarienne avec de la sauce tomate, du fromage mozzarella, des champignons, des poivrons, des
            <p>Ingrédients principaux : Sauce tomate, fromage mozzarella, champignons, poivrons, oignons, olives, tomates</p>
            <p>Prix:11.99 €</p>
            <button class="commander" data-produit="Royal Veggie" data-prix="11.99">Commander</button>
        </li>
        <li>
                <h4>Cheesy & Veggie</h4>
                <img src="/pizzashop/image/pizza/cheesy&veggie.avif" alt="Cheesy & Veggie">
                <p class="description">Une pizza délicieusement gourmande avec du fromage fondu, des légumes frais et une pâte croustillante.</p>
                <p class="ingredients">Ingrédients principaux : Fromage, poivrons, champignons, oignons, olives</p>
                <p>Prix:8.99 €</p>
                <button class="commander" data-produit="Cheesy&Veggie" data-prix="8.99">Commander</button>
            </li>
            <li>
                <h4>Peppina</h4>
                <img src="/pizzashop/image/pizza/peppina.avif" alt="Peppina">
                <p class="description">Une pizza végétarienne avec une délicieuse combinaison de légumes et de fromage, parfaite pour les amateurs de saveurs équilibrées.</p>
                <p class="ingredients">Ingrédients principaux : Fromage, poivrons, tomates, oignons, basilic</p>
                <p>Prix:9.99 €</p>
                <button class="commander" data-produit="Peppina" data-prix="9.99">Commander</button>
            </li>
            <li>
                <h4>Super Veggie</h4>
                <img src="/pizzashop/image/pizza/supervegie.avif" alt="Super Veggie">
                <p class="description">Une pizza végétarienne généreuse avec une variété de légumes frais et savoureux, idéale pour les amateurs de légumes.</p>
                <p class="ingredients">Ingrédients principaux : Fromage, poivrons, champignons, oignons, tomates, olives, maïs</p>
                <p>Prix:7.99 €</p>
                <button class="commander" data-produit="Super Veggie" data-prix="7.99">Commander</button>
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