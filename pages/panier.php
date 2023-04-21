<?php
    // Démarrer la session
    session_start();

    // Vérifier si un produit a été ajouté au panier
    if(isset($_POST['commander']) && $_POST['commander'] == 1) {
        $produit = $_POST['produit'];
        $prix = $_POST['prix'];

        // Ajouter le produit au panier
        $_SESSION['panier'][] = array(
            'produit' => $produit,
            'prix' => $prix
        );

        // Envoyer une réponse de succès à la requête Ajax
        echo "success";
        exit;
    }

    // Vérifier si un produit a été supprimé du panier
    if(isset($_POST['supprimer'])) {
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
    <title>Pizza Shop - Panier</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
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
        <h1>Pizza Shop</h1>
        <?php require_once('../header/navbar.php'); ?>
    </header>
    <main>
        <h2>Panier</h2>
        <?php
            if(isset($_SESSION['panier']) && count($_SESSION['panier']) > 0) {
                $total = 0;
        ?>
        <table>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Action</th>
            </tr>
            <?php
                foreach($_SESSION['panier'] as $index => $produit) {
                    $total += $produit['prix'];
                    ?>
                    <tr>
                        <td><?php echo $produit['produit']; ?></td>
                        <td><?php echo $produit['prix']; ?> €</td>
                        <td><button class="supprimer" data-index="<?php echo $index; ?>">Supprimer</button></td>
                    </tr>
                    <?php
                }
            ?>
            <tr>
                <td colspan="3" align="right"><strong>Total :</strong> <?php echo $total; ?> €</td>
            </tr>
        </table>
        <form action="../order/valider_commande.php" method="post">
            <input type="hidden" name="total" value="<?php echo $total; ?>">

          <!-- Bouton de confirmation de commande -->
         <button id="btnCommander">Confirmer la commande</button>

         <!-- Lien JavaScript pour charger le fichier confirmation.js -->
         <script src="../order/confirmation.js"></script>

         <!-- Code JavaScript pour le bouton de confirmation de commande -->
         <script>
          document.getElementById("btnCommander").addEventListener("click", function() {
          // Appeler la fonction de confirmation de commande
          confirmerCommande();
          });

          function confirmerCommande() {
          // Effectuer les étapes nécessaires pour confirmer la commande, par exemple :
  
          // Envoyer les données du panier au serveur pour traitement
          // ...
  
          // Rediriger vers la page de validation de commande
          window.location.href = "../order/valider_commande.php";
          }
        
         </script>

</body>
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