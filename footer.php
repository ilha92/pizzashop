<footer id="site-footer">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <div class="footer-links">
        <div class="footer-container">
            <div class="footer-column">
                <h3>NOS PRODUITS</h3>
                <ul>
                    <li><a href="../pages/carte.php">La Carte</a></li>
                    <li><a href="../footer/recettes.php">RECETTES DE PIZZA</a></li>
                    <li><a href="../index.php">Cestino Pizza</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>NOS ENGAGEMENTS</h3>
                <ul>
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
                    <li><a href="../footer/politique.php">POLITIQUE DE DIVULGATION RESPONSABLE</a></li>
                </ul>
            </div>
            <div class="footer-column">
            <h3>Nous suivre</h3>
            <br>
            <ul>
    <a href="https://twitter.com/ilias_hamel" target="_blank">
      <img src="../footer/images/twitter.webp" alt="twitter">
    </a>
    <a href="https://www.instagram.com/ilcestinopizza.ve/" target="_blank">
      <img src="../footer/images/instagram.webp" alt="instagram">
    </a>
    <a href="https://www.youtube.com/channel/UCphb30cQ73NmjWBmZvnad-Q" target="_blank">
      <img src="../footer/images/youtube.webp" alt="Youtube">
    </a>
</ul>
     </div>
            <div class="footer-column">
                <h3>Condition des Offres</h3>
                <ul>
                    <li><a href="../footer/fidelite.php">Cestino Pizza FIDÉLITÉ</a></li>
                    <li><a href="../pages/promos.php">OFFRE DU MOMENT</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-column">
         <h4>PAYEZ EN TOUTE SÉCURITÉ AVEC</h4>
         <ul>
         <img src="../footer/images/visa.webp" alt="">
         <img src="../footer/images/maestro.webp" alt="">
         <img  width="40" height="55" src="../footer/images/Paypal_2014_logo.png" alt="">
         <img src="../footer/images/mastercard.webp" alt="">
         </ul>
        </div>
        
        <div class="footer-column">
        <ul>
        <li><a href="../footer/mention.php">Mention Légales</a></li>
        <li><a href="../footer/condition.php">CONDITIONS GÉNÉRALES DE VENTE</a></li>
        </div>
        </ul>
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