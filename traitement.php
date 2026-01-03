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

 // Tous les champs sont valides → insertion en base
    $titre = htmlspecialchars($_POST['titre']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $description = htmlspecialchars($_POST['description']);
    $image = htmlspecialchars($_POST['image']);

    //Insertion en BDD
    require 'bdd.php';
    $bdd = connexion();

    $requete = $bdd->prepare('INSERT INTO oeuvres (titre, description, artiste, image) VALUES (?, ?, ?, ?)');
    $requete->execute([$titre, $description, $artiste, $image]);

    // Redirection après insertion
    header('Location: oeuvre.php?id=' . $bdd->lastInsertId());
    
}
?>