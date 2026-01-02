<?php
require 'header.php';
require 'bdd.php';

$bdd = connexion(); // correct function name

// Redirect if no ID in URL
if (empty($_GET['id'])) {
    header('Location: index.php');
    exit;
}

// Prepare and execute query to fetch artwork
$requete = $bdd->prepare('SELECT * FROM oeuvres WHERE id = ?');
$requete->execute([$_GET['id']]);
$oeuvre = $requete->fetch(PDO::FETCH_ASSOC);

// Redirect if no artwork found
if (!$oeuvre) {
    header('Location: index.php');
    exit;
}
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['titre'] ?></h1>
        <p class="description"><?= $oeuvre['artiste'] ?></p>
        <p class="description-complete">
             <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
