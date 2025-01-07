<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=db_cat_dwm;charset=utf8', 'root', '');
    // Activer les exceptions PDO pour une meilleure gestion des erreurs
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
