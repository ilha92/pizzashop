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
    <title>Cestino Pizza - Valider Commande</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="../image/panier.ico">
    <script src="https://www.paypal.com/sdk/js?client-id=AeMTmJIxDSss_eMYUhKkHTHvr58Yujo8Sknh8FHepZ-Nj7eQzisUSfKuODSEN3qtWL_IJxlCapczqIVk&currency=EUR"></script>
</head>
<body>
<header>
    <h1 style="display: flex; align-items: center;">
        <img src="../image/pizza/panier.png" width="80" height="60" alt="Logo Pizza Shop" style="margin-right: 10px;">Cestino Pizza
    </h1>
    <?php include_once '../header/navbar.php'; ?>
    <?php require_once('../footer.php'); ?>
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
        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [
                            {
                                amount: {
                                    value: '<?php echo $total; ?>'
                                }
                            }
                        ]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        // Traitement de la commande effectué sur le serveur
                        // Utilisez `details` pour récupérer les détails de
  // Effectuer les étapes nécessaires pour valider la commande
                        // par exemple, enregistrer les données dans une base de données,
                        // envoyer un e-mail de confirmation, etc.

                        // Vider le panier dans la session
                        unset($_SESSION['panier']);

                        // Rediriger vers une page de confirmation de commande avec le total comme paramètre
                        window.location.href = "confirmation.php?total=" + encodeURIComponent(<?php echo $total; ?>);
                    });
                }
            }).render('#paypal-button-container');
        </script>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>