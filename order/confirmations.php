<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <script>
// Récupérer le montant total de la commande depuis l'URL
var total = parseFloat(getParameterByName('total'));

// Afficher le montant total dans la page
document.getElementById('total').textContent = total.toFixed(2) + ' €';

// Récupérer le formulaire de confirmation
var confirmationForm = document.getElementById('confirmation-form');

// Ajouter un écouteur d'événement pour le soumission du formulaire
confirmationForm.addEventListener('submit', function(event) {
    event.preventDefault();

    // Récupérer les données du formulaire
    var nom = document.getElementById('nom').value;
    var email = document.getElementById('email').value;

    // Effectuer les étapes nécessaires pour envoyer les données de confirmation
    // par exemple, envoyer les données à un serveur pour enregistrement dans une base de données,
    // envoyer un e-mail de confirmation, etc.

    // Rediriger vers une page de remerciement
    window.location.href = 'remerciements.php';
});

// Fonction pour récupérer la valeur d'un paramètre dans l'URL
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}</script>
</head>
<body>
     <header>
        <h1>Pizza Shop</h1>
        <?php require_once('../header/navbar.php'); ?>
        <?php require_once('../footer.php'); ?>
    </header>
    <br>
    <h1>Merci pour votre commande</h1>
    <h4>Revenez nous voir</h4>
</body>
</html>
