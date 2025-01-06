<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>