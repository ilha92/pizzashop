<!DOCTYPE html>
<html>
<head>
    <title>Pizza Shop - Accueil</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
    <header>
        <?php require_once('header/navbar.php'); ?>
    </header>
    <main>
        <br>
        <h2>Bienvenue sur Cestino Pizza</h2>
        <br>
        <p>Découvrez nos délicieuses pizzas faites maison avec des ingrédients frais et de qualité. 
        <br> <br>   
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
        </div>
        <br><br>
        Choisissez parmi notre large gamme de pizzas et profitez de nos offres spéciales.</p>
        <br><br>      
        <a href="../pages/carte.php"" class="en-savoir-plus">Voir la carte</a>
    </main>
    <div class="centered">
        <h5>Pour votre santé, évitez de manger trop gras, trop sucré, trop salé</h5>
        <h5>Pour votre santé, évitez de grignoter entre les repas</h5>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
