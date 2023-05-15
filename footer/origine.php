<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Nos produits d'origine française - Domino's Pizza</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        main {
            text-align: center;
        }

        main > div {
            margin: 0 auto;
            max-width: 1000px;
        }

        main > div:first-child {
            margin-top: 50px;
        }

        main > div:not(:first-child) {
            display: inline-block;
            vertical-align: top;
            width: 45%;
            margin: 20px;
        }

        img {
            width: 100%;
            height: auto;
        }

        h1, h3 {
            color: #333;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            font-size: 16px;
            line-height: 1.5;
        }

        .image-wrapper {
  position: relative;
  display: inline-block; /* Pour que la taille de la div s'adapte au contenu */
}
    </style>
</head>
<body>
<header>
     <h1 style="display: flex; align-items: center;">
    <h1>Cestino pizza</h1>
     <?php include_once '../header/navbar.php'; ?>
        <?php require_once('../footer.php'); ?>
 </header>
    <main>
        <div>
            <h1>NOS PRODUITS D'ORIGINE FRANÇAISE</h1>
            <p>Chez Domino’s, les pizzas sont préparées en France, dans les cuisines de nos magasins et sur commande. Les recettes ont spécialement été pensées et élaborées pour le marché français pour s’adapter aux attentes des consommateurs.</p>
        </div>
    </main>
    <main>
        <div>
            <h3>NOTRE CRÈME FRAÎCHE</h3>
            <img width="560" height="315" src="../footer/images/3.avif" alt="">
            <br>
            <p>L’origine de notre crème fraîche légère est également française car elle est fabriquée à partir de lait français. L’une des bases les plus utilisées sur les recettes en France après la sauce tomate.</p>
        </div>
        <div>
            <h3>NOTRE MIEL FRANÇAIS</h3>
            <img width="560" height="315" src="../footer/images/437x242-px-miel.avif" alt="">
            <p>Rien que pour vous, le miel que nous avons sélectionné pour nos recettes est issu de ruches françaises, à déguster, notamment dans la pizza Chèvre-Miel ou dans notre Cal’z Chèvre-Miel.</p>
        </div>
        <br><br><br><br>
        <div>
            <h2>En savoir plus</h2>
            <br>
            <a href="../footer/legumes.php">
  <div class="image-wrapper">
    <img width="90" height="60" src="../footer/images/13.avif" alt="Description de l'image">
  </div>
</a>
    </div>
    </main>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
