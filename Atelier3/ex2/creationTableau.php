<?php
include "connection0.php"; // Assurez-vous que la connexion utilise PDO

try {
    // Création de la table `categories`
    $sql = "CREATE TABLE IF NOT EXISTS categories (
        ID_CAT INT AUTO_INCREMENT PRIMARY KEY,
        NOM_CAT VARCHAR(30)
    )";
    $conn->exec($sql); // Utilisation de la méthode PDO
    echo "Table `categories` créée avec succès.<br>";

    // Création de la table `produit`
    $rqt = "CREATE TABLE IF NOT EXISTS produit (
        ID_PROD INT AUTO_INCREMENT PRIMARY KEY,
        DESIGNATION VARCHAR(30),
        PRIX DOUBLE,
        QUANTITE INT(11),
        PROMO TINYINT(4),
        ID_CAT INT(11),
        FOREIGN KEY (ID_CAT) REFERENCES categories(ID_CAT)
    )";
    $conn->exec($rqt);
    echo "Table `produit` créée avec succès.";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
