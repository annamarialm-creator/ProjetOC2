<?php
require 'header.php';
require_once 'bdd.php'; // include the database connection file

// Connect to the database
$pdo = connexion();

// Fetch artworks from the database
$stmt = $pdo->query("SELECT id, titre, artiste, description, image FROM oeuvres");
$oeuvres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>
