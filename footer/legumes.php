<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Légumes frais - Domino's Pizza</title>
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
            <h1>NOS LÉGUMES FRAIS</h1>
            <img width="1000" height="315" src="../footer/images/microsoftteams-image.avif" alt="">
            <p>Les légumes sont souvent indispensables à la conception d'une bonne pizza. C'est pourquoi, Domino's sélectionne pour garnir sa pâte à pizza des tomates, champignons et poivrons frais pour garantir aux pizzas qui en possèdent, une saveur et une fraicheur optimale.</p>
        </div>
    </main>
    <main>
        <div>
            <h3>NOS TOMATES</h3>
            <img width="560" height="315" src="../footer/images/tomate.avif" alt="">
            <br>
            <p>La tomate fraîche est un ingrédient couramment utilisé dans nos pizzas et nos salades. Nous en consommons près de 150 tonnes par an.</p>
            <p>C’est pourquoi, nous faisons preuve d'exigence quant à nos sources d'approvisionnement et favorisons des pays reconnus pour la qualité de leur production. Ainsi, nous proposons des tomates origine France en toppings de nos pizzas durant toute la saison de ce fruit. Un engagement qui contribue à apporter encore plus de goût à nos recettes !</p>
        </div>
        <div>
            <h3>NOS CHAMPIGNONS</h3>
            <img width="560" height="315" src="../footer/images/champi.avif" alt="">
            <p>Tout comme nos poivrons, nos champignons sont livrés frais dans toutes nos pizzerias. Finement coupés pour répondre à notre cahier des charges, ils entrent dans la composition de plusieurs de nos pizzas telles que la Forestière, la Reine, l’Extravaganzza…</p>
            <p>Les champignons ont l'avantage de retranscrire toute leur gourmandise aussi bien avec une base à la sauce tomate qu'une base à la crème fraîche légère.</p>
        </div>
        <br><br><br>
        <div>
            <h2>En savoir plus</h2>
            <br>
            <a href="../footer/origine.php">
  <div class="image-wrapper">
    <img width="400" height="200" src="../footer/images/17.avif" alt="Description de l'image">
  </div>
</a>
<br><br><br>
<h5>Pour votre santé, évitez de manger trop gras, trop sucré, trop salé</h5>
<h5> Pour votre santé, évitez de grignoter entre les repas</h5>
    </div>
    </main>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>