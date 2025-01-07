<?php
$sql_categories = "INSERT INTO categories (NOM_CAT) VALUES
        ('Ordinateurs'),
        ('Imprimantes'),
        ('Scanner')";
    $conn->exec($sql_categories);
    echo "Données insérées dans la table `categories` avec succès.<br>";

    // Insertion des données dans la table `produit`
    $sql_produits = "INSERT INTO produit (DESIGNATION, PRIX, QUANTITE, PROMO, ID_CAT) VALUES
        ('PC Portable HP', 8000.00, 10, 0, 1),
        ('PC Gamer Asus', 12000.00, 5, 1, 1),
        ('Imprimante Epson', 1500.00, 20, 1, 2),
        ('Imprimante HP LaserJet', 2000.00, 15, 0, 2),
        ('Scanner Canon', 1000.00, 25, 1, 3),
        ('Scanner Epson', 1200.00, 30, 0, 3)";
    $conn->exec($sql_produits);
    echo "Données insérées dans la table `produit` avec succès.<br>";
    ?>