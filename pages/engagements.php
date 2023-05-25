<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="../image/panier.ico">
    <style>
        main {
          padding: 20px;
          display: flex;
          flex-wrap: wrap;
          justify-content: center;
        }

        div {
          width: calc(50% - 40px);
          display: flex;
          flex-direction: column;
          align-items: center;
          text-align: center;
        }

        img {
          display: block;
          margin: 0 auto;
        }

        h1, h2, p {
          margin-bottom: 10px;
        }
        
        /* Ajout de styles spécifiques pour les petits écrans */
        @media screen and (max-width: 768px) {
          div {
            width: 100%;
          }
        }
    </style>
</head>
<body>
<header>
     <h1 style="display: flex; align-items: center;">
     <img src="../image/pizza/panier.png" width="80" height="60" alt="Logo Pizza Shop" style="margin-right: 10px;">Cestino Pizza</h1>
     <?php include_once '../header/navbar.php'; ?>
     </header>
    <br>
    <h1>NOTRE IDENTITÉ : notre pâte</h1>
    <main>
    <div>
        <br>
        <img  width="560" height="315"  src="../footer/images/492x239px_maïs.avif" alt="">
        <br>
        <h2>PÂTE CROUSTILLANTE GRÂCE AU MAÏS FRANÇAIS</h2>
        <br>
        <p>La farine de maïs utilisée en magasin pour la réalisation des pizzas et qui fait le croustillant de la pâte PizzaShop est issue de maïs cultivé exclusivement dans le sud de la France.</p>
    </div>
        <div>
    <img  width="560" height="315"  src="../footer/images/492x239px_blé.avif" alt="">
    <br>
    <h2>FABRIQUÉE À PARTIR DE BLÉ 100% FRANÇAIS</h2>
    <br>
    <p>Notre pâte est fabriquée à partir de farine de blés cultivés en France et sélectionnés pour PizzaShop par Les Grands Moulins de Paris.</p>
    <br><br><br><br><br>
    </div>  
    <div>
        <br>
        <img  width="560" height="315"  src="../footer/images/âte.avif" alt="">
        <br>
        <h2>PÂTE FRAÎCHE JAMAIS CONGELÉE </h2>
        <br>
        <p>Chez Cestino Pizza la pâte à pizza est fabriquée dans nos ateliers de production en France et les pâtons sont livrés frais à nos magasins plusieurs fois par semaine.
        </p>
        <br><br><br><br><br>
    </div>
    <div>
        <br>
        <img  width="560" height="315"  src="../footer/images/image2.avif" alt="">
        <br>
        <h2>PRÉPARÉE À LA COMMANDE</h2>
        <br>
        <p>Nos pizzas sont préparées sous vos yeux et travaillées grâce à un savoir-faire unique de plus de 60 ans.
        </p>
        <br><br><br><br><br><br><br><br>
    </div>
    <h2>MAIS C'EST AUSSI DES INGRÉDIENTS SELECTIONNÉS AVEC SOIN</h2>
    <br><br>
    <p>Une bonne pizza, c’est d’abord de bons ingrédients. Depuis les légumes jusqu’aux fromages, en passant par les viandes, nous sélectionnons nos ingrédients pour leurs qualités nutritionnelles et leur saveur. 
</p>
<br><br><br><br><br><br>
<div>
    <h2>DES OLIVES KALAMATA BIO</h2>
    <br>
    <img width="1000" height="315" src="../footer/images/989x241px-olives.avif" alt="">
    <br>
    <p  width="560" height="315">Depuis le 1er septembre, Cestino Pizza utilise des olives Kalamata Bio dénoyautées pour l’ensembles des recettes contenant des olives.
Issues des villages de Sparte et Kalamata dans la province du Péloponnèse en Grèce, ces olives sont reconnues pour leur goût riche et fruité. Elles conservent un équilibre parfait entre qualité supérieure et respect de l’environnement. 
</p>
</div>
</main>
<main>
    <style>
        .en-savoir-plus {
  display: inline-block;
  padding: 10px 20px;
  background-color: #f00;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
}
    </style>
<div>
    <img  width="560" height="315" src="../footer/images/microsoftteams-image.avif" alt="">
    <br>
    <h3>UNE SÉLECTION DE LÉGUMES FRAIS</h3>
<br><br>
<p>Découvrez nos légumes frais présents dans vos pizzas.</p>
<br>
<a href="../footer/legumes.php" class="en-savoir-plus">En savoir plus</a>
</div>
<div>
    <img  width="560" height="315" src="../footer/images/437x242-px-miel.avif" alt="">
    <br>
    <h3>DES PRODUITS D'ORIGINE FRANÇAISE</h3>
    <br>
    <p>Découvrez nos produits d'origine française.</p>
    <br>
    <a href="../footer/origine.php" class="en-savoir-plus">En savoir plus</a>
</div>
</main>
</body>
</html>