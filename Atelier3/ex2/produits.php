
<?php
include "connection0.php"; 
if(isset($_GET['idCat'])){
$produit=$conn->prepare("SELECT * FROM produit Where ID_CAT=?");
$produit->execute(array($_GET['idCat']));
?>
<table border="1" cellspacing="2px">
    <tr>
        <th>ID</th>
        <th>DES</th>
        <th>PRIX</th>
        <th>QUANTITE</th>
        <th>PROMO</th>
    </tr>
    <?php while($row=$produit->fetch()){?>
    <tr>
        <td><?php echo $row['ID_PROD']?></td>
        <td><?php echo $row['DESIGNATION']?></td>
        <td><?php echo $row['PRIX']?></td>
        <td><?php echo $row['QUANTITE']?></td>
        <td><?php echo $row['PROMO']?></td>
    </tr>
    <?php }} ?>

