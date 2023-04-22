<?php
    // Démarrer la session
    session_start();

    // Vérifier si l'utilisateur a confirmé la commande
    if(isset($_POST['valider_commande']) && $_POST['valider_commande'] == 1) {
        // Récupérer les données du panier depuis la session
        $panier = $_SESSION['panier'];
        $total = $_POST['total'];

        // Effectuer les étapes nécessaires pour valider la commande
        // par exemple, enregistrer les données dans une base de données,
        // envoyer un e-mail de confirmation, etc.

        // Vider le panier dans la session
        unset($_SESSION['panier']);

        // Rediriger vers une page de confirmation de commande avec le total comme paramètre
        header("Location: confirmation.php?total=" . urlencode($total));
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pizza Shop - Valider Commande</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>

    <header>
        <h1>Pizza Shop</h1>
        <?php require_once('../header/navbar.php'); ?>
    </header>
    <br>
    <main>
        <h2>Valider Commande</h2>
        <?php
            if(isset($_SESSION['panier']) && count($_SESSION['panier']) > 0) {
                $total = 0;
        ?>
        <table>
            <br>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
            </tr>
            <?php
                foreach($_SESSION['panier'] as $index => $produit) {
                    $total += $produit['prix'];
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($produit['produit']); ?></td>
                        <td><?php echo htmlspecialchars($produit['prix']); ?> €</td>
                    </tr>
                    <?php
                }
            ?>
            <tr>
                <td colspan="2" align="right"><strong>Total :</strong> <?php echo htmlspecialchars($total); ?> €</td>
            </tr>
        </table>
        <form action="valider_commande.php" method="post">
            <input type="hidden" name="total" value="<?php echo htmlspecialchars($total); ?>">
            <input type="hidden" name="valider_commande" value="1">
            <input type="submit" value="Valider la commande">
        </form>
        <?php
         } else {
             echo "<p>Votre panier est vide.</p>";
         }
     ?>
</main>
<footer>
<p>© Pizza Shop. Tous droits réservés.</p>
</footer>

</body>
</html>