<?php
session_start();
$bdd = new PDO('mysql:host=cl1-sql12;dbname=mvx77601;charset=utf8;', 'mvx77601', 'admin');

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

// Traitement du formulaire de confirmation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $pseudo = $_POST["pseudo"];
    $email = $_POST["email"];

    // Préparer la requête d'insertion pour la table "Commande"
    $date_commande = date("Y-m-d H:i:s"); // Ajout de la date de commande actuelle
    $statut = "En attente"; // Définition du statut initial
    $montant = isset($_SESSION['montant_total']) ? $_SESSION['montant_total'] : 0; // Vérifier si la clé "montant_total" est définie dans $_SESSION
    $sql = "INSERT INTO commande (pseudo, date_commande, statut, email, montant) VALUES (:pseudo, :date_commande, :statut, :email, :montant)";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':date_commande', $date_commande);
    $stmt->bindParam(':statut', $statut);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':montant', $montant);

    // Exécuter la requête d'insertion pour la table "Commande"
    if ($stmt->execute()) {
        // Récupérer l'ID de la commande insérée
        $commande_id = $bdd->lastInsertId();

        // Préparer la requête d'insertion pour la table "DetailsDuPanier"
        $panier = $_SESSION['panier'];
        foreach ($_SESSION['panier'] as $index => $produit) {
            $produit_id = $commande_id; // Utilisation de $commande_id au lieu de $produit['id']
            $quantite = $produit['quantite'];
            $prix_unitaire = $produit['prix'];

            $sql = "INSERT INTO detailsdupanier (panier_id, produit_id, quantite, prix_unitaire) VALUES (:panier_id, :produit_id, :quantite, :prix_unitaire)";
            $stmt_details = $bdd->prepare($sql);
            $stmt_details->bindParam(':panier_id', $commande_id);
            $stmt_details->bindParam(':produit_id', $produit_id);
            $stmt_details->bindParam(':quantite', $quantite);
            $stmt_details->bindParam(':prix_unitaire', $prix_unitaire);

            // Exécuter la requête d'insertion pour la table "DetailsDuPanier"
            $stmt_details->execute();
        }
        // Réinitialiser le panier après la confirmation de commande
        $_SESSION['panier'] = array();

        // Rediriger vers la page de confirmation
        header("Location: ../order/confirmation.php");
        exit();
    } else {
        echo "Erreur lors de l'enregistrement de la commande : " . $stmt->errorInfo()[2];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cestino Pizza - Panier</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="../image/panier.ico">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AeMTmJIxDSss_eMYUhKkHTHvr58Yujo8Sknh8FHepZ-Nj7eQzisUSfKuODSEN3qtWL_IJxlCapczqIVk&currency=EUR"></script>
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
                <th>Supprimer</th>
            </tr>
            <?php
            foreach ($_SESSION['panier'] as $index => $produit) {
                $nom_produit = $produit['produit'];
                $prix_unitaire = $produit['prix'];
                $quantite = $produit['quantite'];
                $prix_total = $prix_unitaire;
                $total += $prix_total;
                ?>
                <tr>
                    <td><?php echo $nom_produit; ?></td>
                    <td><?php echo $prix_unitaire; ?> €</td>
                    <td><?php echo $quantite; ?></td>
                    <td><?php echo $prix_total; ?> €</td>
                    <td><button class="supprimer" data-index="<?php echo $index; ?>">Supprimer</button></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="3" style="text-align: right;"><strong>Total :</strong></td>
                <td colspan="2"><?php echo $total; ?> €</td>
            </tr>
        </table>
        <form method="post" action="">
            <h2>PAYEMENT :</h2>
            <br><br>
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
                            // Utilisez `details` pour récupérer les détails de la commande

                            // Vider le panier dans la session
                            unset($_SESSION['panier']);

                            // Rediriger vers une page de confirmation de commande avec le total comme paramètre
                            window.location.href = "confirmation.php?total=" + encodeURIComponent(<?php echo $total; ?>);
                        });
                    }
                }).render('#paypal-button-container');
            </script>
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" required>
            <br><br>
            <label for="email">Email :</label>
            <input type="email" name="email" required>
            <br><br>
            <input type="submit" value="Confirmer la commande">
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