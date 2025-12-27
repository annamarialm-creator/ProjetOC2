<?php
function connexion() {
    $host = '127.0.0.1';  // or 'localhost'
    $dbname = 'artbox';    // the database you created
    $username = 'root';    // default XAMPP user
    $password = '';        // default XAMPP password is empty

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        // set error mode to exception for easier debugging
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        // stop script and display error if connection fails
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}
?>
