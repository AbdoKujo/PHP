<?php
// Création de la table si elle n'existe pas
include "connection.php";

$sql = "CREATE TABLE IF NOT EXISTS minichat (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL,
    msg VARCHAR(50) NOT NULL
)";

try {
    $conn->exec($sql);
    echo "Table minichat créée avec succès ou déjà existante.";
} catch(PDOException $e) {
    echo "Erreur lors de la création de la table: " . $e->getMessage();
}
?>