<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pizza Shop</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <?php include_once 'header/navbar.php'; ?>

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
