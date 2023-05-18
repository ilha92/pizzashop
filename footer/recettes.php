<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cestino Pizza-recettes-pizzas</title>
  <link rel="icon" type="image/x-icon" href="../image/panier.ico">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Inclusion de la bibliothèque jQuery -->
    <script>
        $(document).ready(function() {
            // Fonction pour ajouter un produit au panier
            $(".commander").click(function() {
                var produit = $(this).data("produit"); // Récupérer le nom du produit à partir de l'attribut data
                var prix = $(this).data("prix"); // Récupérer le prix du produit à partir de l'attribut data

                // Envoyer les données au script panier.php via Ajax
                $.ajax({
                    url: "../pages/panier.php",
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
    <style>
    body {
      text-align: center;
    }
    
    iframe {
      margin: 0 auto;
      display: block;
    }
    
    h1, p {
      text-align: center;
    }

    .recette {
        margin: 0 auto;
        max-width: 600px;
        padding: 20px;
        border: 1px solid #ccc;
        text-align: center;
    }
  </style>
</head>
<body>
  <header> 
  <h1 style="display: flex; align-items: center;">
    <img src="../image/pizza/panier.png" width="80" height="60" alt="Logo Pizza Shop" style="margin-right: 10px;">Cestino Pizza</h1>
    <h1>Recettes-pizzas</h1>
    <?php require_once('../header/navbar.php'); ?>
    <?php require_once('../footer.php'); ?></header>
    <br><br>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/YPehqVUs2IU" frameborder="0" allowfullscreen></iframe>
    <br><br>
    <h1>DES RECETTES SUR-MESURE</h1>
    <br>
    <p class="recette">Chez Cestino Pizza, nous proposons régulièrement de nouvelles recettes imaginées par nos soins ou bien inspirées par vos propres créations.
      En fait, toutes nos pizzas sont préparées à la commande, comme celles créées soi-même à la maison, avec de la pâte fraîche et vos ingrédients
      préférés. Les pizzas commandées sont disponibles le plus rapidement possible, à emporter au comptoir en magasin ou bien livrées à domicile,
     voilà la recette d'une soirée pizza réussie !S'adressant aussi bien aux végétariens qu'aux amateurs de viande, 
     Cestino Pizza vous propose de découvrir de délicieuses pizzas, classiques ou originales. En 2018, Cestino Pizza lance même sa propre gamme Vegan. 
     Pour chaque pizza proposée, choisissez entre plusieurs types de pâtes : fine, classique, Pan et Mozza Crust. Quelle que soit
     l'idée de pizza que vous aviez en tête, elle se trouve chez Cestino Pizza.
    En fonction des saisons, découvrez nos nouvelles recettes améliorées composées
     de légumes frais, d'ingrédients plus savoureux et en quantité toujours plus généreuse !
    </p>
<br><br>
<h2>LE TOP 6 DES PIZZAS Cestino Pizza</h2>
<br><br>
<div id="classique" class="pizza">
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
     <li>
            <h3>Royal Veggie</h3>
            <img src="../image/pizza/royal veggie.avif" alt="Pizza Royal Veggie"> <!-- Chemin de l'image de la pizza Royal Veggie -->
            <h5><p>Description : Une pizza végétarienne avec de la sauce tomate, du fromage mozzarella, des champignons, des poivrons </p></h5>
            <h5><p>Ingrédients: Sauce tomate, fromage mozzarella, champignons, poivrons, oignons, olives, tomates</p></h5>
            <p>Prix:11.99 €</p>
            <button class="commander" data-produit="Royal Veggie" data-prix="11.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
        </li>
</ul>
</div>
<div class="centered">
        <h5>Pour votre santé, évitez de manger trop gras, trop sucré, trop salé</h5>
        <h5>Pour votre santé, évitez de grignoter entre les repas</h5>
    </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>