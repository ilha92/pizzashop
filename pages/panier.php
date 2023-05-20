<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Rediriger vers la page de login si l'utilisateur n'est pas connecté
    header("Location: ../acces/login.php");
    exit();
}
// Vérifier si un produit a été ajouté au panier
if (isset($_POST['commander']) && $_POST['commander'] == 1) {
    $produit = $_POST['produit'];
    $prix = $_POST['prix'];
    $quantite = isset($_POST['quantite']) ? $_POST['quantite'] : 1; // Définir la quantité par défaut à 1

    // Vérifier si le prix est un nombre
    if (!is_numeric($prix)) {
        // Gérer l'erreur ou définir une valeur par défaut
        $prix = 0;
    }

    // Ajouter le produit au panier
    $_SESSION['panier'][] = array(
        'produit' => $produit,
        'prix' => $prix,
        'quantite' => $quantite
    );

    // Envoyer une réponse de succès à la requête Ajax
    echo "success";
    exit;
}

// Vérifier si un produit a été supprimé du panier
if (isset($_POST['supprimer'])) {
    $index = $_POST['index'];

    // Supprimer le produit du panier
    unset($_SESSION['panier'][$index]);

    // Réorganiser les index du panier
    $_SESSION['panier'] = array_values($_SESSION['panier']);

    // Envoyer une réponse de succès à la requête Ajax
    echo "success";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cestino Pizza - Panier</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="../image/panier.ico">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".supprimer").click(function() {
                var index = $(this).data("index");
                $.ajax({
                    url: "panier.php",
                    type: "post",
                    data: {
                        supprimer: 1,
                        index: index
                    },
                    success: function(response) {
                        alert("Le produit a été supprimé du panier.");
                        location.reload();
                    },
                    error: function() {
                        alert("Une erreur s'est produite. Veuillez réessayer.");
                    }
                });
            });
        });
    </script>
</head>
<body>
<header>
     <h1 style="display: flex; align-items: center;">
     <img src="../image/pizza/panier.png" width="80" height="60" alt="Logo Pizza Shop" style="margin-right: 10px;">Cestino Pizza</h1>
     <?php include_once '../header/navbar.php'; ?>
     <?php require_once('../footer.php'); ?>
</header>
    <main>
        <br><br>
        <h2>Panier :</h2>
        <br><br>
        <?php
        if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0) {
            $total = 0;
            ?>
            <table>
                <br>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Prix total</th>
                    <th>Action</th>
                    </tr>
                <?php
                foreach ($_SESSION['panier'] as $index => $produit) {
                    $prixTotalProduit = $produit['prix'];

                    // Vérifier si le prix est un nombre
                    if (is_numeric($prixTotalProduit)) {
                        $total += $prixTotalProduit;
                    }

                    ?>
                    <tr>
                        <td><?php echo $produit['produit']; ?></td>
                        <td><?php echo $produit['prix']; ?> €</td>
                        <td><?php echo $produit['quantite']; ?></td>
                        <td><?php echo $prixTotalProduit; ?> €</td>
                        <td><button class="supprimer" data-index="<?php echo $index; ?>">Supprimer</button></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="5" align="right"><strong>Total :</strong> <?php echo $total; ?> €</td>
                </tr>
            </table>
            <form action="../order/valider_commande.php" method="post">
                <input type="hidden" name="total" value="<?php echo $total; ?>">
                <?php foreach ($_SESSION['panier'] as $index => $produit) { ?>
                    <input type="hidden" name="produit[]" value="<?php echo $produit['produit']; ?>">
                    <input type="hidden" name="prix[]" value="<?php echo $produit['prix']; ?>">
                    <br>
                <?php } ?>
                <!-- Bouton de confirmation de commande -->
                <button id="btnCommander">Confirmer la commande</button>
            </form>

            <!-- Lien JavaScript pour charger le fichier confirmation.js -->
            <script src="../order/confirmation.js"></script>

            <!-- Code JavaScript pour le bouton de confirmation de commande -->
            <script>
                document.getElementById("btnCommander").addEventListener("click", function() {
                    // Appeler la fonction de confirmation de commande
                    confirmerCommande();
                });

                function confirmerCommande() {
                    // Effectuer les étapes nécessaires pour confirmer la commande,
                    // Envoyer les données du panier au serveur pour traitement
                    // ...

                    // Rediriger vers la page de validation de commande
                    window.location.href = "../order/valider_commande.php";
                }
            </script>
        <?php } else {
            echo "<p>Votre panier est vide.</p>";
        } ?>
    </main>
    <br><br><br><br><br><br>
    <div class="centered">
        <h5>Pour votre santé, évitez de manger trop gras, trop sucré, trop salé</h5>
        <h5>Pour votre santé, évitez de grignoter entre les repas</h5>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>