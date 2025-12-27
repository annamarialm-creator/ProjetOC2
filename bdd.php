<?php
// bdd.php
require_once 'config.php'; // include the constants

function connexion() {
    try {
        $pdo = new PDO(
            sprintf(
                'mysql:host=%s;dbname=%s;port=%s;charset=utf8mb4',
                MYSQL_HOST,
                MYSQL_NAME,
                MYSQL_PORT
            ),
            MYSQL_USER,
            MYSQL_PASSWORD
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

?>
