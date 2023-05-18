<!DOCTYPE html>
<html>
<head>
    <title>Pizza Shop - Accueil</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
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
</head>
<body>
    <header>
        <?php require_once('header/navbar.php'); ?>
    </header>
    <main>
        <br>
        <h2>Bienvenue sur Cestino Pizza</h2>
        <br>
        <p>Découvrez nos délicieuses pizzas faites maison avec des ingrédients frais et de qualité.</p>
        <br>
        <div id="classique" class="pizza">
            <ul>
                <li>
                    <h3>Beef & Cheddar</h3>
                    <img src="../image/pizza/beef&cheddar.avif" alt=""> <!-- Chemin de l'image de la pizza Beef & Cheddar -->
                    <h5><p>Une pizza avec de la viande de boeuf hachée, du fromage cheddar, des oignons et de la sauce barbecue.</p></h5>
                    <h5><p>Ingrédients: Sauce barbecue, fromage cheddar, oignons, viande de boeuf hachée.</p></h5>
                    <p>Prix: 13,99€</p>
                    <button class="commander" data-produit="Beef & Cheddar" data-prix="13.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
                </li>
                <li>
                    <h4>Chicken & Cheddar</h4>
                    <img src="../image/pizza/chikenchedar.avif" alt="Chicken & Cheddar">
                    <h5><p class="description">Une pizza généreuse avec du poulet grillé, du fromage cheddar, des oignons rouges et une délicieuse sauce barbecue.</p></h5>
                    <h5><p class="ingredients">Ingrédients : Poulet grillé, fromage cheddar, oignons rouges, sauce barbecue</p></h5>
                    <p>Prix: 13.99 €</p>
                    <button class="commander" data-produit="Chicken & Cheddar" data-prix="13.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
                </li>
                <li>
                    <h4>Savoyarde</h4>
                    <img src="../image/pizza/savoyarde.avif" alt="Savoyarde">
                    <h5><p class="description">Une pizza savoyarde avec du fromage reblochon, des lardons fumés et des pommes de terre pour un goût authentique des Alpes.</p></h5>
                    <h5><p class="ingredients">Ingrédients : Fromage reblochon, lardons fumés, pommes de terre, oignons</p></h5>
                    <p>Prix: 11.99 €</p>
                    <button class="commander" data-produit="Savoyarde" data-prix="11.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
                </li>
            </ul>
        </div>
        <br><br>
        <p>Choisissez parmi notre large gamme de pizzas et profitez de nos offres spéciales.</p>
        <br><br>      
        <a href="../pages/carte.php" class="en-savoir-plus">Voir la carte</a>
    </main>
    <div class="centered">
        <h5>Pour votre santé, évitez de manger trop gras, trop sucré, trop salé</h5>
        <h5>Pour votre santé, évitez de grignoter entre les repas</h5>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>

