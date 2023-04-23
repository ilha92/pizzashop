<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=pizza;charset=utf8;','root', '');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Rediriger vers la page de login si l'utilisateur n'est pas connecté
    header("Location: ../acces/login.php");
    exit();
}

// Récupérer les informations de l'utilisateur connecté
if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];
} else {
    // Rediriger vers la page de login si les informations de l'utilisateur ne sont pas disponibles
    header("Location: ../acces/login.php");
    exit();
}
// Récupérer tous les avis depuis la base de données
$query = "SELECT * FROM avis";
$stmt = $bdd->prepare($query);
$result = $stmt->execute();

// Vérifier si la requête a réussi
if ($result !== false) {
    $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Gérer l'erreur de requête ici
    die("Erreur de requête : " . print_r($stmt->errorInfo(), true));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Avis</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
    <header>
        <h1>Pizza Shop</h1>
        <?php require_once('../header/navbar.php'); ?>
     </header>
     <br>
    <!-- Formulaire d'avis -->
    <h2>Donner votre avis</h2>
   
    <form method="post" action="">
        <label for="note">Note :</label>
        <input type="number" name="note" id="note" min="1" max="5" required>
        <label for="commentaire">laisser un avis :</label>
        <textarea name="commentaire" id="commentaire" rows="5" required></textarea>
        <input type="submit" name="submit" value="Soumettre">
    </form>
    <br>
    <?php
 // Traitement du formulaire d'avis soumis
if (isset($_POST['submit'])) {
    $note = $_POST['note'];
    $commentaire = $_POST['commentaire'];
    
    // Insertion de l'avis dans la base de données
    $query = "INSERT INTO avis (pseudo, note, commentaire) VALUES (:pseudo, :note, :commentaire)";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->bindValue(':note', $note, PDO::PARAM_INT);
    $stmt->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);
    $result = $stmt->execute();
  
    // Vérifier si l'insertion a réussi
    if ($result !== false) {
        $id = $bdd->lastInsertId(); // Récupération de l'ID de l'avis inséré
        // Afficher le message d'avis soumis
        echo '<h2>Avis soumis :</h2>';
        echo '<div class="avis-container">';
        echo '<div class="note">Note : ' . $note . ' étoiles</div>';
        echo '<div class=commentaire>"' . $commentaire . '"</div>';
        echo '<div class="options">';
        echo 'Auteur : ' . $pseudo;
        echo '<a href="avis.php?action=supprimer&id=' . $id . '">Supprimer</a>'; // Utiliser l'ID de l'avis inséré dans le lien de suppression
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } else {
        // Gérer l'erreur d'insertion ici
        die("Erreur d'insertion : " . print_r($stmt->errorInfo(), true));
    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id'])) {
    // Traitement de la demande de suppression d'un avis
    $id = $_GET['id'];
    
    // Suppression de l'avis dans la base de données
    $query = "DELETE FROM avis WHERE id = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $result = $stmt->execute();
    
    // Vérifier si la suppression a réussi
    if ($result !== false) {
        echo 'Avis supprimé avec succès';
    } else {
        // Gérer l'erreur de suppression ici
        die("Erreur de suppression : " . print_r($stmt->errorInfo(), true));
    }
}
?>
    <br>
    <!-- Affichage des avis -->
    <h2>Avis des utilisateurs</h2>
   
    <?php
    // Parcourir les avis et les afficher
    foreach ($avis as $avisItem) {
        echo '<div class="avis-container">';
        echo '<div class=note>Note : ' . $avisItem['note'] . ' étoiles</div>';
        echo '<div class=commentaire>"' . $avisItem['commentaire'] . '"</div>';
        echo '<div class="options">';
        echo 'Auteur : ' . $avisItem['pseudo'];
        echo '</div>';
        echo '</div>';
    }
    ?>
</body>
</html>