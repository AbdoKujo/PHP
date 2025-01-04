<form method="POST" action="ex2.php">
    Salaire :<input type="number" name="salaire" value="1"><br> // very important to add the name attribute
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">

</form>

<?php
if(isset($_POST['salaire'])){
    $salaire = $_POST['salaire'];
    calculer($salaire);
}
else{
    $salaire = 0;
}
$impote = 0;
function calculer($salaire){
    if($salaire < 3000){
        $impote = $salaire * 0.05;
        echo $impote;
    }
    elseif($salaire >= 3000 && $salaire < 6000){
        $impote = $salaire * 0.10;
        echo $impote;
    }
    elseif($salaire >= 6000 && $salaire < 10000){
        $impote = $salaire * 0.15;
        echo $impote;
    }
    elseif($salaire >= 10000){
        $impote = $salaire * 0.20;
        echo $impote;
    }
}
?>