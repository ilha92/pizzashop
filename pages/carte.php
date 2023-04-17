<!DOCTYPE html>
<html>
<head>
    <title>Carte des Pizzas</title>
    <link rel="stylesheet" href="style/style.css"> <!-- Lien vers votre fichier de style CSS -->
</head>
<body>
     <header>
        <h1>Pizza Shop</h1>
        <?php require_once('../header/navbar.php'); ?>
     </header>
    <h1>Carte des Pizzas</h1>
    <h2>Grands Classiques</h2>
    <ul>
        <li>
            <h3>Margarita</h3>
            <img src="pizzashop/image/pizza/margherita.avif" alt="Pizza Margarita"> <!-- Chemin de l'image de la pizza Margarita -->
            <p>9$</p>
            <p>Description : Une pizza classique avec de la sauce tomate, du fromage mozzarella et des feuilles de basilic frais.</p>
            <p>Ingrédients principaux : Sauce tomate, fromage mozzarella, basilic</p>
            <form action="pages/panier.php" method="post"> <!-- Formulaire pour ajouter la pizza au panier -->
                <input type="hidden" name="pizza" value="Margarita"> <!-- Champ caché pour stocker le nom de la pizza -->
                  <!-- Bouton Commander avec lien vers panier.php -->
                  <a href="../pages/panier.php">Commander</a>
            </form>
        </li>
    
                <li>
                    <img src="/pizzashop/image/pizza/reine.avif" alt="Reine">
                    <h4>Reine</h4>
                    <p>Tomate, mozzarella, jambon, champignons</p>
                    <form action="pages/panier.php" method="post">
                        <input type="hidden" name="pizza" value="Reine">
                        <input type="submit" value="Commander">
                    </form>
                </li>
                <li>
                    <img src="/pizzashop/image/pizza/orientale.avif" alt="Orientale">
                    <h4>Orientale</h4>
                    <p>Tomate, mozzarella, merguez, poivrons, oignons</p>
                    <form action="pages/panier.php" method="post">
                        <input type="hidden" name="pizza" value="Orientale">
                        <input type="submit" value="Commander">
                    </form>
                </li>
              
                <li>
                    <img src="/pizzashop/image/pizza/pepperoni.avif" alt="Pepperoni">
                    <h4>Pepperoni</h4>
                    <p>Tomate, mozzarella, pepperoni</p>
                    <form action="pages/panier.php" method="post">
                        <input type="hidden" name="pizza" value="Pepperoni">
                        <input type="submit" value="Commander">
                    </form>
                </li>
                <li>
                    <img src="/pizzashop/image/pizza/steak.avif" alt="Steak & Cheese">
                    <h4>Steak & Cheese</h4>
                    <p>Tomate, mozzarella, steak haché, oignons, fromage à raclette</p>
                    <form action="pages/panier.php" method="post">
                        <input type="hidden" name="pizza" value="Steak & Cheese">
                        <input type="submit" value="Commander">
                    </form>
                </li>
            </ul>
            <br><br>
    <h2>Nouveautés</h2>
    <ul>
        <li>
            <h3>Beef & Cheddar</h3>
            <img src="/pizzashop/image/pizza/beef&cheddar.avif" alt="Pizza Beef & Cheddar"> <!-- Chemin de l'image de la pizza Beef & Cheddar -->
            <p>Description : Une pizza avec de la viande de boeuf hachée, du fromage cheddar, des oignons et de la sauce barbecue.</p>
            <p>Ingrédients principaux : Viande de boeuf hachée, fromage cheddar, oignons, sauce barbecue</p>
            <form action="pages/panier.php" method="post"> <!-- Formulaire pour ajouter la pizza au panier -->
                <input type="hidden" name="pizza" value="Beef & Cheddar"> <!-- Champ caché pour stocker le nom de la pizza -->
                <input type="submit" name="submit" value="Commander"> <!-- Bouton pour commander la pizza -->
            </form>
        </li>
        <li>
                <h4>Authentique Raclette</h4>
                <img src="/pizzashop/image/pizza/authentiqueraclette.avif" alt="Authentique Raclette">
                <p class="description">Une pizza gourmande avec une généreuse couche de fromage raclette fondant, accompagnée de pommes de terre et d'oignons caramélisés.</p>
                <p class="ingredients">Ingrédients principaux : Fromage raclette, pommes de terre, oignons, jambon cru</p>
                <form action="pages/panier.php" method="post">
                    <input type="hidden" name="pizza" value="Authentique Raclette">
                    <input type="submit" name="submit" value="Commander">
                </form>
            </li>
            <li>
                <h4>Divine 3 Fromages</h4>
                <img src="/pizzashop/image/pizza/FR_P4FR_fr_menu_9172.avif" alt="Divine 3 Fromages">
                <p class="description">Une pizza savoureuse avec une combinaison de 3 fromages différents : mozzarella, gorgonzola et parmesan, pour les amateurs de fromage.</p>
                <p class="ingredients">Ingrédients principaux : Mozzarella, gorgonzola, parmesan, tomates, basilic</p>
                <form action="pages/panier.php" method="post">
                    <input type="hidden" name="pizza" value="Divine 3 Fromages">
                    <input type="submit" name="submit" value="Commander">
                </form>
            </li>
            <li>
                <h4>Savoyarde</h4>
                <img src="/pizzashop/image/pizza/savoyarde.avif" alt="Savoyarde">
                <p class="description">Une pizza savoyarde avec du fromage reblochon, des lardons fumés et des pommes de terre pour un goût authentique des Alpes.</p>
                <p class="ingredients">Ingrédients principaux : Fromage reblochon, lardons fumés, pommes de terre, oignons</p>
                <form action="pages/panier.php" method="post">
                    <input type="hidden" name="pizza" value="Savoyarde">
                    <input type="submit" name="submit" value="Commander">
                </form>
            </li>
            <li>
                <h4>Chicken & Cheddar</h4>
                <img src="/pizzashop/image/pizza/chikenchedar.avif" alt="Chicken & Cheddar">
                <p class="description">Une pizza généreuse avec du poulet grillé, du fromage cheddar, des oignons rouges et une délicieuse sauce barbecue.</p>
                <p class="ingredients">Ingrédients principaux : Poulet grillé, fromage cheddar, oignons rouges, sauce barbecue</p>
                <form action="pages/panier.php" method="post">
                    <input type="hidden" name="pizza" value="Chicken & Cheddar">
                    <input type="submit" name="submit" value=" Commander">
                </form>
            </li>
        </ul>
    </ul>
    <br><br>
    <h2>Gourmandes Veggies</h2>
    <ul>
        <li>
            <h3>Royal Veggie</h3>
            <img src="/pizzashop/image/pizza/royal veggie.avif" alt="Pizza Royal Veggie"> <!-- Chemin de l'image de la pizza Royal Veggie -->
            <p>Description : Une pizza végétarienne avec de la sauce tomate, du fromage mozzarella, des champignons, des poivrons, des
            <p>Ingrédients principaux : Sauce tomate, fromage mozzarella, champignons, poivrons, oignons, olives, tomates</p>
            <form action="pages/panier.php" method="post"> <!-- Formulaire pour ajouter la pizza au panier -->
                <input type="hidden" name="pizza" value="Royal Veggie"> <!-- Champ caché pour stocker le nom de la pizza -->
                <input type="submit" name="submit" value="Commander"> <!-- Bouton pour commander la pizza -->
            </form>
        </li>
        <li>
                <h4>Cheesy & Veggie</h4>
                <img src="/pizzashop/image/pizza/cheesy&veggie.avif" alt="Cheesy & Veggie">
                <p class="description">Une pizza délicieusement gourmande avec du fromage fondu, des légumes frais et une pâte croustillante.</p>
                <p class="ingredients">Ingrédients principaux : Fromage, poivrons, champignons, oignons, olives</p>
                <form action="pages/panier.php" method="post">
                    <input type="hidden" name="pizza" value="Cheesy & Veggie">
                    <input type="submit" name="submit" value="Commander">
                </form>
            </li>
            <li>
                <h4>Peppina</h4>
                <img src="/pizzashop/image/pizza/peppina.avif" alt="Peppina">
                <p class="description">Une pizza végétarienne avec une délicieuse combinaison de légumes et de fromage, parfaite pour les amateurs de saveurs équilibrées.</p>
                <p class="ingredients">Ingrédients principaux : Fromage, poivrons, tomates, oignons, basilic</p>
                <form action="pages/panier.php" method="post">
                    <input type="hidden" name="pizza" value="Peppina">
                    <input type="submit" name="submit" value="Commander">
                </form>
            </li>
            <li>
                <h4>Super Veggie</h4>
                <img src="/pizzashop/image/pizza/supervegie.avif" alt="Super Veggie">
                <p class="description">Une pizza végétarienne généreuse avec une variété de légumes frais et savoureux, idéale pour les amateurs de légumes.</p>
                <p class="ingredients">Ingrédients principaux : Fromage, poivrons, champignons, oignons, tomates, olives, maïs</p>
                <form action="pages/panier.php" method="post">
                    <input type="hidden" name="pizza" value="Super Veggie">
                    <input type="submit" name="submit" value="Commander">
                </form>
            </li>
    </ul>
    <br><br>
    <h3>Vegan</h3>
        <ul>
            <li>
                <img src="/pizzashop/image/pizza/vegan rocket.avif" alt="Vegan Rocket">
                <h4>Vegan Rocket</h4>
                <p>Description : Pizza végétalienne avec une base de sauce tomate, du fromage végétalien, de la roquette, des tomates cerises et des pignons de pin.</p>
                <p>Ingrédients principaux : Sauce tomate, fromage végétalien, roquette, tomates cerises, pignons de pin</p>
                <form action="pages/panier.php" method="post"> <!-- Formulaire pour ajouter la pizza au panier -->
                    <input type="hidden" name="pizza" value="Vegan Rocket"> <!-- Champ caché pour stocker le nom de la pizza -->
                    <input type="submit" name="submit" value="Commander"> <!-- Bouton pour commander la pizza -->
                </form>
            </li>
            <li>
                <img src="/pizzashop/image/pizza/veganmargherita.avif" alt="Vegan Margherita">
                <h4>Vegan Margherita</h4>
                <p>Description : Pizza végétalienne classique avec une base de sauce tomate, du fromage végétalien et des tomates fraîches.</p>
                <p>Ingrédients principaux : Sauce tomate, fromage végétalien, tomates</p>
                <form action="pages/panier.php" method="post"> <!-- Formulaire pour ajouter la pizza au panier -->
                    <input type="hidden" name="pizza" value="Vegan Margherita"> <!-- Champ caché pour stocker le nom de la pizza -->
                    <input type="submit" name="submit" value="Commander"> <!-- Bouton pour commander la pizza -->
                </form>
            </li>
            <li>
                <img src="/pizzashop/image/pizza/veganpeppina.avif" alt="Vegan Peppina">
                <h4>Vegan Peppina</h4>
                <p>Description : Pizza végétalienne avec une base de sauce tomate, du fromage végétalien, des poivrons, des oignons et des olives.</p>
                <p>Ingrédients principaux : Sauce tomate, fromage végétalien, poivrons, oignons, olives</p>
                <form action="pages/panier.php" method="post"> <!-- Formulaire pour ajouter la pizza au panier -->
                    <input type="hidden" name="pizza" value="Vegan Peppina"> <!-- Champ caché pour stocker le nom de la pizza -->
                    <input type="submit" name="submit" value="Commander"> <!-- Bouton pour commander la pizza -->
                </form>
            </li>
            <li>
                <img src="/pizzashop/image/pizza/supervegie.avif" alt="Super Veggie">
                <h4>Super Veggie</h4>
                <p>Description : Pizza végétalienne garnie de légumes frais, de champignons, d'olives et de fromage végétalien.</p>
                <p>Ingrédients principaux : Sauce tomate, fromage végétalien, champignons, olives, légumes frais</p>
                <form action="pages/panier.php" method="post"> <input type="hidden" name="pizza" value="Super Veggie"> <!-- Champ caché pour stocker le nom de la pizza -->
                    <input type="submit" name="submit" value="Commander"> <!-- Bouton pour commander la pizza -->
                </form>
            </li>
        </ul>

</body>
</html>