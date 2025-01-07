<?php
include("connection0.php");

    $categorie = $conn->prepare("SELECT * FROM categories");
    $categorie->execute();
?>

<select name="cat" id="cat">
    <?php while ($ligne=$categorie->fetch()): ?>
        <option value="<?php echo $ligne['ID_CAT']; ?>">
            <?php echo $ligne['NOM_CAT']; ?>
        </option>
    <?php endwhile; ?>
</select>