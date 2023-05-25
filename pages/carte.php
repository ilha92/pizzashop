<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Pizza Shop - Carte</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="../image/panier.ico">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Inclusion de la bibliothèque jQuery -->
  <script>
$(document).ready(function() {
    $(".commander").click(function() {
        var produit = $(this).data("produit");
        var prix = $(this).data("prix");

        if (produit === "Margherita" || produit === "Pizza Pepperoni" || produit === "Pizza Quatre fromages" || produit === "Végétarienne" || produit === "Reine" || produit === "Beefchedar") {
            var quantite;

            if (produit === "Margherita") {
                quantite = parseInt($("#margherita_quantite").val());
            } else if (produit === "Pizza Pepperoni") {
                quantite = parseInt($("#pepperoni_quantite").val());
            } else if (produit === "Pizza Quatre fromages") {
                quantite = parseInt($("#fromages_quantite").val());
            } else if (produit === "Végétarienne") {
                quantite = parseInt($("#vegetarienne_quantite").val());
            } else if (produit === "Reine") {
                quantite = parseInt($("#reine_quantite").val());
            } else if (produit === "Beefchedar") {
                quantite = parseInt($("#beefchedar_quantite").val());
            }

            var prixBase = parseFloat($(this).data("prix"));
            var prixTaille, prixPate;

            if (produit === "Margherita") {
                prixTaille = parseFloat($("#margherita_taille option:selected").data("prix"));
                prixPate = parseFloat($("#margherita_pate option:selected").data("prix"));
            } else if (produit === "Pizza Pepperoni") {
                prixTaille = parseFloat($("#pepperoni_taille option:selected").data("prix"));
                prixPate = parseFloat($("#pepperoni_pate option:selected").data("prix"));
            } else if (produit === "Pizza Quatre fromages") {
                prixTaille = parseFloat($("#fromages_taille option:selected").data("prix"));
                prixPate = parseFloat($("#fromages_pate option:selected").data("prix"));
            } else if (produit === "Végétarienne") {
                prixTaille = parseFloat($("#vegetarienne_taille option:selected").data("prix"));
                prixPate = parseFloat($("#vegetarienne_pate option:selected").data("prix"));
            } else if (produit === "Reine") {
                prixTaille = parseFloat($("#reine_taille option:selected").data("prix"));
                prixPate = parseFloat($("#reine_pate option:selected").data("prix"));
            } else if (produit === "Beefchedar") {
                prixTaille = parseFloat($("#beefchedar_taille option:selected").data("prix"));
                prixPate = parseFloat($("#beefchedar_pate option:selected").data("prix"));
            }

            var prix = (prixBase + prixTaille + prixPate) * quantite;

            $.ajax({
                url: "../pages/panier.php",
                type: "post",
                data: {
                    commander: 1,
                    produit: produit,
                    prix: prix,
                    quantite: quantite
                },
                success: function(response) {
                    alert("Le produit a été ajouté au panier.");
                    location.reload();
                },
                error: function() {
                    alert("Une erreur s'est produite. Veuillez réessayer.");
                }
            });
        } else {
            $.ajax({
                url: "panier.php",
                type: "post",
                data: {
                    commander: 1,
                    produit: produit,
                    prix: prix
                },
                success: function(response) {
                    alert("Le produit a été ajouté au panier.");
                },
                error: function() {
                    alert("Une erreur s'est produite. Veuillez réessayer.");
                }
            });
        }
    });
});
</script>
</head>
<body>
<header>
     <h1 style="display: flex; align-items: center;">
     <img src="../image/pizza/panier.png" width="80" height="60" alt="Logo Pizza Shop" style="margin-right: 10px;">Cestino Pizza</h1>
     <?php include_once '../header/navbar.php'; ?>
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
    <div style="position: relative;">
    <img src="../image/pizza/margherita.avif" alt="Margherita">
    <img src="../image/pizza/basprix.png" alt="" style="position: absolute; top: 0; left: 0; z-index: 2;">
  </div>
    <h5><p>Description: Pizza classique avec de la sauce tomate, du fromage mozzarella et du basilic.</p></h5>
    <h5><p>Ingrédients: Sauce tomate, fromage mozzarella, basilic.</p></h5>
    <p>Prix: 8,99€</p>
    <div>
        <label for="margherita_taille">Taille :</label>
        <select id="margherita_taille" class="taille">
            <option value="petite" data-prix="0">M</option>
            <option value="moyenne" data-prix="2.00">Large (+2.00€)</option>
            <option value="grande" data-prix="4.00">XL (+4.00€)</option>
        </select>
        <label for="margherita_pate">Pâte :</label>
        <select id="margherita_pate" class="pate">
            <option value="fine" data-prix="0">Fine</option>
            <option value="epaisse" data-prix="0">Épaisse</option>
        </select>
        <label for="margherita_quantite">Quantité :</label>
        <select id="margherita_quantite" class="quantite" data-produit="Margherita">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
        <button class="commander" data-produit="Margherita" data-prix="8.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
    </div>
</li>
<li>
    <h3>Pepperoni</h3>
    <img src="../image/pizza/pepperoni.avif" alt="">
    <h5><p>Description: Pizza avec de la sauce tomate, du fromage mozzarella et des tranches de pepperoni.</p></h5>
    <h5><p>Ingrédients: Sauce tomate, fromage mozzarella, pepperoni.</p></h5>
    <p>Prix: 9,99€</p>
    <div>
        <label for="pepperoni_taille">Taille :</label>
        <select id="pepperoni_taille" class="taille">
            <option value="petite" data-prix="0">M</option>
            <option value="moyenne" data-prix="2.00">Large (+2.00€)</option>
            <option value="grande" data-prix="4.00">XL (+4.00€)</option>
        </select>
        <label for="pepperoni_pate">Pâte :</label>
        <select id="pepperoni_pate" class="pate">
            <option value="fine" data-prix="0">Fine</option>
            <option value="epaisse" data-prix="0">Épaisse</option>
        </select>
        <label for="pepperoni_quantite">Quantité :</label>
        <select id="pepperoni_quantite" class="quantite" data-produit="Pizza Pepperoni">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
        <button class="commander" data-produit="Pizza Pepperoni" data-prix="9.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
    </div>
</li>

<li>
    <h3>Pizza Quatre fromages</h3>
    <img src="../image/pizza/4 fromage.avif" alt="">
    <h5><p>Description: Pizza avec une combinaison de quatre fromages différents : mozzarella, gorgonzola, emmental et parmesan.</p></h5>
    <h5><p>Ingrédients: Sauce tomate, fromage mozzarella, gorgonzola, emmental, parmesan.</p></h5>
    <p>Prix: 10,99€</p>
    <div>
        <label for="fromages_taille">Taille :</label>
        <select id="fromages_taille" class="taille">
            <option value="petite" data-prix="0">M</option>
            <option value="moyenne" data-prix="2.00">Large (+2.00€)</option>
            <option value="grande" data-prix="4.00">XL (+4.00€)</option>
        </select>
        <label for="fromages_pate">Pâte :</label>
        <select id="fromages_pate" class="pate">
            <option value="fine" data-prix="0">Fine</option>
            <option value="epaisse" data-prix="0">Épaisse</option>
        </select>
        <label for="fromages_quantite">Quantité :</label>
        <select id="fromages_quantite" class="quantite" data-produit="Pizza Quatre fromages">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
        <button class="commander" data-produit="Pizza Quatre fromages" data-prix="10.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
    </div>
</li>
<li>
                <h3>Végétarienne</h3>
                <img src="../image/pizza/royal veggie.avif" alt="">
                <h5><p>Description: Pizza avec de la sauce tomate, des légumes frais (tomates, poivrons, oignons, champignons) et du fromage mozzarella.</p></h5>
                <h5><p>Ingrédients: Sauce tomate, fromage mozzarella, tomates, poivrons, oignons, champignons.</p></h5>
                <p>Prix: 9,99€</p>
                <div>
                    <label for="vegetarienne_taille">Taille :</label>
                    <select id="vegetarienne_taille" class="taille">
                        <option value="petite" data-prix="0">M</option>
                        <option value="moyenne" data-prix="2.00">Large (+2.00€)</option>
                        <option value="grande" data-prix="4.00">XL (+4.00€)</option>
                    </select>
                    <label for="vegetarienne_pate">Pâte :</label>
                    <select id="vegetarienne_pate" class="pate">
                        <option value="fine" data-prix="0">Fine</option>
                        <option value="epaisse" data-prix="0">Épaisse</option>
                    </select>
                    <label for="vegetarienne_quantite">Quantité :</label>
                    <select id="vegetarienne_quantite" class="quantite" data-produit="Végétarienne">
                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <button class="commander" data-produit="Végétarienne" data-prix="9.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
                </div>
            </li>
            <li>
    <h3>Reine</h3>
    <img src="../image/pizza/reine.avif" alt="pizza reine">
    <h5><p>Description: Pizza avec de la sauce tomate, du fromage mozzarella, du jambon et de l'ananas.</p></h5>
    <h5><p>Ingrédients: Sauce tomate, mozzarella, jambon, champignons de Paris.</p></h5>
    <p>Prix: 12,99€</p>
    <div>
        <label for="reine_taille">Taille :</label>
        <select id="reine_taille" class="taille">
            <option value="petite" data-prix="0">M</option>
            <option value="moyenne" data-prix="2.00">Large (+2.00€)</option>
            <option value="grande" data-prix="4.00">XL (+4.00€)</option>
        </select>
        <label for="reine_pate">Pâte :</label>
        <select id="reine_pate" class="pate">
            <option value="fine" data-prix="0">Fine</option>
            <option value="epaisse" data-prix="0">Épaisse</option>
        </select>
        <label for="reine_quantite">Quantité :</label>
        <select id="reine_quantite" class="quantite" data-produit="Reine"> 
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
        <button class="commander" data-produit="Reine" data-prix="12.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button> 
    </div>       
</li>
<li>
    <h3>Cannibale</h3>
    <img src="../image/pizza/cannibale.avif" alt=""> <!-- Chemin de l'image de la pizza Beef & Cheddar -->
    <h5><p>Une pizza avec de la viande de boeuf hachée, du fromage cheddar, des oignons et de la sauce barbecue.</p></h5>
    <h5><p>Ingrédients: Sauce barbecue, mozzarella, poulet rôti*, merguez*, haché au bœuf assaisonné*..</p></h5>
    <p>Prix: 11,99€</p>
    <button class="commander" data-produit="Cannibale" data-prix="11.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
</li>
</ul>
</div>

<div id="classique" class="pizza">
<h2>Grands Classiques</h2>
<ul>
<li>
    <h3>Beef & Cheddar</h3>
    <img src="../image/pizza/beef&cheddar.avif" alt=""> <!-- Chemin de l'image de la pizza Beef & Cheddar -->
    <h5><p>Une pizza avec de la viande de boeuf hachée, du fromage cheddar, des oignons et de la sauce barbecue.</p></h5>
    <h5><p>Ingrédients: Sauce barbecue, fromage cheddar, oignons, viande de boeuf hachée.</p></h5>
    <p>Prix: 13,99€</p>
    <button class="commander" data-produit="Beefcheddar" data-prix="13.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
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
        <h3>Classique Jambon</h3>
        <div style="position: relative;">
    <img src="../image/pizza/jambonn.avif" alt="Super Veggie" style="position: relative; z-index: 1;">
    <img src="../image/pizza/basprix.png" alt="" style="position: absolute; top: 0; left: 0; z-index: 2;">
  </div>
        <p>Description: Pizza avec de la sauce tomate, du fromage mozzarella, du jambon de dinde.</p></h5>
        <h5><p>Ingrédients:Sauce tomate, mozzarella, jambon.</p></h5>
        <p>Prix: 8€</p>
        <button class="commander" data-produit="Classique Jambon" data-prix="8">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
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
        <div style="position: relative;">
        <img src="../image/pizza/Cheeky pizza merguez.avif" alt="">
        <img src="../image/pizza/new.avif" alt="" style="position: absolute; top: 0; left: 0;">
        </div>
        <h5><p class="description">Une pizza épicée à la merguez garnie de poivrons et de frites, accompagnée d'une sauce blanche kebab.</p></h5>
        <h5><p class="ingredients">Ingrédients : Sauce tomate, mozzarella, viande kebab, duo de poivrons, Domino's Fries, sauce blanche kebab.</p></h5>
        <p>Prix:14 €</p>
        <button class="commander" data-produit="CHEEKY PIZZA MERGUEZ" data-prix="14">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
    </li>
    <li>
        <h4>SUMMER GRILLED</h4>
        <div style="position: relative;">
        <img src="../image/pizza/summer grilled.avif" alt="Authentique Raclette">
        <img src="../image/pizza/new.avif" alt="" style="position: absolute; top: 0; left: 0;">
        </div>
        <h5><p class="description">Une pizza légère avec des légumes grillés, des olives et des tomates, agrémentée d'origan.</p></h5>
        <h5><p class="ingredients">Ingrédients : Sauce tomate, mozzarella, mélange de légumes grillés 
            (aubergines, courgettes, poivrons rouges et jaunes),olives Kalamata bio, tomates fraîches, origan.</p></h5>
        <p>Prix:13 €</p>
        <button class="commander" data-produit="SUMMER GRILLED" data-prix="13">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
    </li>
    <li>
        <h4>CHEEKY PIZZA KEBAB</h4>
        <div style="position: relative;">
        <img src="../image/pizza/cheeky kebab.avif" alt="Divine 3 Fromages">
        <img src="../image/pizza/new.avif" alt="" style="position: absolute; top: 0; left: 0;">
        </div>
        <h5><p class="description">Une pizza kebab avec une base de sauce tomate, de la mozzarella, de la viande kebab, des poivrons et une sauce blanche kebab.</p></h5>
        <h5><p class="ingredients">Ingrédients : Sauce tomate, mozzarella, viande kebab, duo de poivrons,sauce blanche kebab.</p></h5>
        <p>Prix:12.20 €</p>
        <button class="commander" data-produit="CHEEKY PIZZA KEBAB" data-prix="12.90">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
    </li>
            <li>
                <h4>SUBLIM'CURRY</h4>
                <div style="position: relative;">
                <img src="../image/pizza/curry.avif" alt="">
                <img src="../image/pizza/new.avif" alt="" style="position: absolute; top: 0; left: 0;">
                </div>
                <h5><p class="description">Une pizza SUBLIM'CURRY avec Crème fraîche légère française, mozzarella, oignons, poulet rôti.</p></h5>
                <h5><p class="ingredients">Ingrédients :Crème fraîche légère française, mozzarella, oignons, poulet rôti, duo de poivrons, sauce au curry.</p></h5>
                <p>Prix:11.99 €</p>
        <button class="commander" data-produit="SUBLIM'CURRY" data-prix="11.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
            </li>
            <li>
                <h4>CHICK'N GRILLED</h4>
                <div style="position: relative;">
                <img src="../image/pizza/CHIKEN GRIL.avif" alt="Chicken & Cheddar">
                <img src="../image/pizza/new.avif" alt="new" style="position: absolute; top: 0; left: 0;">
                </div>
                <h5><p class="ingredients">Ingrédients: Sauce tomate, mozzarella, mélange de légumes grillés 
                (aubergines, courgettes, poivrons rouges et jaunes), poulet rôti, tomates fraîches, origan.</p></h5>
                <p>Prix:13.99 €</p>
        <button class="commander" data-produit="CHICK'N GRILLED" data-prix="13.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
      </li>
      <li>
                <h4>Forestiere</h4>
                <div style="position: relative;">
  <img src="../image/pizza/forestiere.avif" alt="Vegan Margherita">
  <img src="../image/pizza/new.avif" alt="" style="position: absolute; top: 0; left: 0;">
</div>
                <h5><p class="ingredients">Ingrédients: Crème fraîche légère française, mozzarella, lardons fumés, oignons, jambon, champignons de Paris, origan.</p></h5>
                <p>Prix:12.95 €</p>
        <button class="commander" data-produit="CHICK'N GRILLED" data-prix="12.95">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
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
  <div style="position: relative;">
    <img src="../image/pizza/supervegie.avif" alt="Super Veggie" style="position: relative; z-index: 1;">
    <img src="../image/pizza/basprix.png" alt="" style="position: absolute; top: 0; left: 0; z-index: 2;">
  </div>
  <h5><p class="description">Une pizza végétarienne généreuse avec une variété de légumes frais et savoureux, idéale pour les amateurs de légumes.</p></h5>
  <h5><p class="ingredients">Ingrédients : Sauce tomate, mozzarella, roquette, huile d’olive AOP Kalamata.</p></h5>
  <p>Prix : 5 €</p>  
  <button class="commander" data-produit="Super Veggie" data-prix="7.99">Ajouter au panier <i class="ri-price-tag-3-line"></i></button>
</li>

      <li>
                <h4>Rocket Veggie</h4>
                <img src="../image/pizza/Rocket.avif" alt="Super Veggie">
                <h5><p class="description">Une pizza végétarienne généreuse avec une variété de légumes frais et savoureux, idéale pour les amateurs de légumes.</p></h5>
                <h5><p class="ingredients">Ingrédients : Fromage, poivrons, champignons, oignons, tomates, olives, maïs</p></h5>
                <p>Prix:7.99 €</p>  
        <button class="commander" data-produit="Super Veggie" data-prix="7.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
      </li>
      <li>
                <h4>Vegan Margherita</h4>
                <div style="position: relative;">
  <img src="../image/pizza/veganmargherita.avif" alt="Vegan Margherita">
  <img src="../image/pizza/vegan.avif" alt="" style="position: absolute; top: 10px; left: 10px;">
</div>
                <h5><p class="description">Une pizza végétarienne généreuse avec une variété de légumes frais et savoureux, idéale pour les amateurs de légumes.</p></h5>
                <h5><p class="ingredients">Ingrédients : Fromage, poivrons, champignons, oignons, tomates, olives, maïs</p></h5>
                <p>Prix:7.99 €</p>  
        <button class="commander" data-produit="Vegan Margherita" data-prix="13.99">Ajouter au panier<i class="ri-price-tag-3-line"></i></button>
      </li>
</ul>
</div>
<script>
        function showCategory(category) {
            $('.pizza').hide();
            $('#' + category).show();
        }
</script>
<div class="centered">
  <figure>
    <img src="../image/pizza/new.avif" alt="" srcset="">
    <figcaption>New = Nouveau produit</figcaption>
  </figure>
  <figure>
    <img src="../image/pizza/basprix.png" alt="" srcset="">
    <figcaption>Le prix minimum s'applique aux produits suivis de ce pictogramme sur l'ensemble du site. Des suppléments peuvent s'appliquer pour des recettes et tailles différentes.</figcaption>
  </figure>
</div>
</div>
    <br><br><br>
      <div class="centered">
        <h5>Pour votre santé, évitez de manger trop gras, trop sucré, trop salé</h5>
        <h5>Pour votre santé, évitez de grignoter entre les repas</h5>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
<?php require_once('../footer.php'); ?>
</footer>
</body>
</html>