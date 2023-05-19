<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Nutri-Score chez PizzaShop</title>
  <link rel="stylesheet" type="text/css" href="../style/style.css">
  <link rel="icon" type="image/x-icon" href="../image/panier.ico">
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
  padding: 10px;
  margin: 10px;
}
  </style>
</head>
<body>
<header>
     <h1 style="display: flex; align-items: center;">
    <img src="../image/pizza/panier.png" width="80" height="60" alt="Logo Pizza Shop" style="margin-right: 10px;">Cestino Pizza</h1>
     <?php include_once '../header/navbar.php'; ?>
        <?php require_once('../footer.php'); ?>
 </header>
  <br><br>
  <main>
    <section class="nutriscore-section">
      <h2>L'AFFICHAGE DU NUTRI-SCORE CHEZ PizzaShop</h2>
      <img width="500" height="300" src="../footer/images/image1.avif" alt="">
      <h3>Nutri-Score PizzaShop</h3>
      <p>Chez PizzaShop, nous continuons notre engagement qualité pour offrir toujours plus de transparence nutritionnelle à nos clients. Cet engagement de communiquer sur les valeurs nutritionnelles de nos produits participe à mettre en valeur nos produits et nos recettes et à nouer une relation de confiance avec nos clients.</p>
      <br><br>
      <h3><strong>Qu'est-ce que le Nutri-score ?</strong></h3>
      <img width="400" height="315" src="../footer/images/800x800_vignettes_steak_n_cheese.avif" alt="">
      <p>L’affichage du Nutri-Score sera visible pour l’ensemble des pizzas, entrées et desserts à la carte* (*hors boissons et glaces) , sur le site internet PizzaShop.fr ainsi qu’en magasin.
      Une indication nutritionnelle qui permettra de faciliter la compréhension des informations nutritionnelles pour les clients.
      Ce score, créé par Santé publique France, attribue une note allant de A à E aux aliments.
      De la note A, pour les aliments dont la consommation est à favoriser, à la note E pour les aliments qu'il faut consommer avec plus de modération. Le Nutri-Score est mesuré, en prenant en compte les nutriments et ingrédients à favoriser comme les protéines, les fibres, fruits et légumes d'un côté. De l'autre côté l'énergie et les nutriments à limiter comme les acides gras saturés, le sucre et le sel.</p>
      <br><br>
      <h3>PizzaShop à l’écoute de ses clients</h3>
      <p>Durant plusieurs mois, l’enseigne a réalisé des tests auprès des consommateurs pour recueillir leur avis. A la suite de ces tests, l’enseigne a réalisé une étude qui démontre que plus de 80% des consommateurs souhaitaient voir apparaître cette information sur le site.</p>
      <p>Le Nutri-Score de chaque pizza, entrée ou dessert sera accessible en ligne sur pizzashop.fr et sur la commande en ligne. L’information sera également facilement disponible en magasin grâce à une grille regroupant l’ensemble des notes Nutri-Score.</p>
<p>Le déploiement du Nutri-Score sera progressif sur la commande en ligne et s’étendra par la suite sur le programme de personnalisation « Créé ta pizza » qui offre plus d’1 million de possibilités de recettes ainsi que sur la personnalisation des recettes.</p>
<br><br>
<h3><strong>Comment le Nutri-Score est-il attribué ?</strong></h3>
<img src="../footer/images/téléchargement.avif" alt="">
<p>La note présente sur le logo est attribuée sur la base d’un score prenant en compte pour 100 g ou 100 mL de produit, la teneur :</p>
<ul>
<p>En nutriments et aliments à favoriser (fibres, protéines, fruits, légumes, légumineuses, fruits à coques, huile de colza, de noix et d’olive)</p>
<p>En nutriments à limiter (énergie, acides gras saturés, sucres, sel)</li>
</ul>
<p>Après calcul, le score obtenu par un produit permet de lui attribuer une lettre et une couleur tel que montré dans le schéma ci-dessous.</p>
</section>
  </main>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>