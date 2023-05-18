<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=pizza;charset=utf8;', 'root', '');

if (isset($_POST['valider'])) {
    // Vérifier si l'utilisateur est déjà connecté
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        // Rediriger vers la page d'accueil si déjà connecté
        header("Location: ../index.php");
        exit();
    }

    // Traitement du formulaire de confirmation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $pseudo = $_POST["pseudo"];
        $email = $_POST["email"];
        $montant = $_SESSION["montant_total"];

        // Préparer la requête d'insertion
        $bdd = "INSERT INTO commande (pseudo, email, montant) VALUES (:pseudo, :email, :montant)";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam('pseudo', $pseudo);
        $stmt->bindParam('email', $email);
        $stmt->bindParam('montant', $montant);

        if ($stmt->execute()) {
            // Rediriger vers une page de remerciements
            header("Location: ../order/confirmation.php");
            exit();
        } else {
            echo "Erreur lors de l'enregistrement de la commande : " . $stmt->errorInfo()[2];
        }
    }
}

// Fermer la connexion à la base de données
$bdd = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../image/panier.ico">
    <title>Confirmation</title>
    <script>
        // Récupérer le montant total de la commande depuis l'URL
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }

        // Fonction pour afficher le montant total dans la page
        function displayTotal() {
            // Récupérer le montant total de la commande depuis l'URL
            var total = parseFloat(getParameterByName('total'));

            // Afficher le montant total dans la page
            var totalElement = document.getElementById('total');
            if (totalElement) {
                totalElement.textContent = total.toFixed(2) + ' €';
            }
        }

        // Fonction pour gérer la soumission du formulaire
        function handleFormSubmit(event) {
            event.preventDefault();

            // Récupérer les données du formulaire
            var pseudo = document.getElementById('pseudo').value;
            var email = document.getElementById('email').value;
            var total = parseFloat(getParameterByName('total'));

                        // Effectuer les étapes nécessaires pour envoyer les données de confirmation
            // par exemple, envoyer les données à un serveur pour enregistrement dans une base de données,
            // envoyer un e-mail de confirmation, etc.

            // Créer un objet FormData pour envoyer les données du formulaire à la page de confirmation
            var formData = new FormData();
            formData.append('pseudo', pseudo);
            formData.append('email', email);
            formData.append('total', total);

            // Effectuer une requête AJAX pour envoyer les données du formulaire à la page de confirmation
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'confirmation.php', true);
            xhr.onload = function() {
                // Vérifier si la requête a réussi
                if (xhr.status === 200) {
                    // Rediriger vers une page de remerciements
                    window.location.href = 'confirmation.php';
                } else {
                    console.log('Erreur lors de l\'envoi des données du formulaire');
                }
            };
            xhr.send(formData);
        }

        // Fonction d'initialisation
        function initialize() {
            displayTotal();

            // Récupérer le formulaire de confirmation
            var confirmationForm = document.getElementById('confirmation-form');

            // Ajouter un écouteur d'événement pour la soumission du formulaire
            if (confirmationForm) {
                confirmationForm.addEventListener('submit', handleFormSubmit);
            }
        }

        // Appeler la fonction d'initialisation une fois que le DOM est prêt
        document.addEventListener('DOMContentLoaded', initialize);
    </script>
</head>
<body>
    <header>
        <h1>Pizza Shop</h1>
        <?php require_once('../header/navbar.php'); ?>
        <?php require_once('../footer.php'); ?>
    </header>
    <br><br>
    <h1>Merci pour votre commande</h1>
    <h4>Revenez nous voir</h4>
    <form id="confirmation-form" method="post" action="">
    <a href="../pages/carte.php" class="en-savoir-plus">Retour a la carte</a>
        <input type="hidden" name="pseudo" id="pseudo" value="<?php echo isset($_POST['pseudo']) ? $_POST['pseudo'] : '' ?>" />
        <input type="hidden" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" />
        <input type="hidden" name="valider" value="true" />
    </form>
</body>
</html>