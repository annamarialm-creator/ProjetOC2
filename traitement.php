<?php

// Vérifications des champs
if (
    empty($_POST['titre']) ||
    empty($_POST['artiste']) ||
    empty($_POST['description']) ||
    strlen($_POST['description']) < 3 ||
    empty($_POST['image']) ||
    !filter_var($_POST['image'], FILTER_VALIDATE_URL)
) {
    // Si un champ est invalide, on redirige vers le formulaire
    header('Location: ajouter.php');
} else {
    // Tous les champs sont valides → on pourra insérer en base
}
?>
