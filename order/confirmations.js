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
}