<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Bienvenue sur Cestino Pizza, le meilleur endroit pour déguster de délicieuses pizzas. Venez découvrir notre menu varié et nos offres spéciales. Commandez en ligne ou rendez-vous dans l'un de nos restaurants.">
<meta name="keywords" content="Cestino Pizza, pizzas, restaurant, commande en ligne, menu, offres spéciales">
<meta name="author" content="Cestino Pizza">
<title>Cestino Pizza - Les meilleures pizzas à déguster</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="panier.ico">
</head>
<body>
     <header>
     <h1 style="display: flex; align-items: center;">
    <img src="../image/pizza/panier.png" width="80" height="60" alt="Logo Pizza Shop" style="margin-right: 10px;">Cestino Pizza
</h1>

        <?php include_once 'header/navbar.php'; ?>
        <?php require_once('footer.php'); ?>
     </header>
    <main>
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'accueil':
                    include_once 'pages/accueil.php';
                    break;
                case 'carte':
                    include_once 'pages/carte.php';
                    break;
                case 'promos':
                    include_once 'pages/promos.php';
                    break;
                case 'contact':
                    include_once 'pages/contact.php';
                    break;
                case 'panier':
                    include_once 'pages/panier.php';
                    break;
                case 'engagements':
                    include_once 'pages/engagements.php';
                    break;
                case 'compte':
                        include_once 'pages/compte.php';
                        break;
                default:
                    include_once 'pages/accueil.php';
                    break;
            }
        } else {
            include_once 'pages/accueil.php';
        }
        ?>
    </main>
</body>
</html>
