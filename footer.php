<footer id="site-footer">
<link rel="stylesheet" type="text/css" href="../style/style.css">
    <div class="footer-links">
    <div class="footer-container">
        <div class="footer-column">
            <h3>NOS PRODUITS</h3>
            <ul>
                <li><a href="../pages/carte.php">La Carte</a></li>
                <li><a href="../footer/recettes.php">RECETTES DE PIZZA</a></li>
                <li><a href="#">DOUBLE KIFF</a></li>
                <li><a href="../index.php">Pizza Shop</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>NOS ENGAGEMENTS</h3>
            <ul>
                <li><a href="#">NOUVELLE APP'</a></li>
                <li><a href="../footer/nutriscore.php">NUTRISCORE</a></li>
                <li><a href="../pages/engagements.php">PRESSE</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>NEWSLETTER</h3>
            <ul>
                <li><a href="../footer/cookies.php">COOKIES</a></li>
                <li><a href="../footer/personnel.php">DONNÉES PERSONNELLES</a></li>
                <li><a href="../pages/contact.php">NOUS CONTACTER</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Service clients</h3>
            <ul>
                <li><a href="../footer/politique.php">POLITIQUE DE DIVULGATION RESPONSABLE</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Condition des OffresI</h3>
            <ul>
                <li><a href="../footer/fidelite.php">PizzaShop FIDÉLITÉ</a></li>
                <li><a href="../pages/promos.php">OFFRE DU MOMENT</a></li>
                <li><a href="#">NOUVEAUX JOURS FOUS</a></li>
            </ul>
        </div>
    </div>

</footer>

<script>
// Sélectionner le footer
var footer = document.getElementById("site-footer");

// Fonction pour afficher ou masquer le footer en fonction de la position de défilement
function toggleFooterVisibility() {
  if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
    footer.classList.remove("hidden");
  } else {
    footer.classList.add("hidden");
  }
}

// Écouter l'événement de défilement de la fenêtre
window.addEventListener("scroll", toggleFooterVisibility);

// Appeler la fonction au chargement initial de la page
toggleFooterVisibility();
</script>