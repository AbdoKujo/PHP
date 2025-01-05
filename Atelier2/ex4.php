<form method="POST">
    <label for="loginU">login :</label>
    <input type="text" placeholder="login" name="loginU" id="loginU">
    <br>
    <label for="passwordU">password :</label>
    <input type="text" placeholder="password" name="passwordU" id="passwordU">
    <br>
    <select name="op" id="op">
        <option value="ajouter" id="ajouter" name="ajouter">Ajouter</option>
        <option value="valide?" id="valide?">valide?</option>
    </select>
    <input type="submit" value="Identifier">
</form>
<?php
// creation de tableau

$tableName = 'utilisateur';
$conn=mysqli_connect('localhost','root','','authentification');
// Vérification si la table existe déjà
$tableExists = mysqli_query($conn, "SHOW TABLES LIKE '$tableName'");

if (mysqli_num_rows($tableExists) == 0) {
    // Requête pour créer la table
    $sql = "
    CREATE TABLE $tableName (
        id INT(11) NOT NULL AUTO_INCREMENT,
        loginU VARCHAR(255) ,
        passwordU VARCHAR(255) ,
        PRIMARY KEY (id)
    )";
    // Exécuter la requête
    if (mysqli_query($conn, $sql)) {
        echo "Table '$tableName' créée avec succès.";
    } else {
        echo "Erreur lors de la création de la table : " . mysqli_error($conn);
    }
} else {
    echo "La table '$tableName' existe déjà.";
}
if(isset(($_POST['passwordU'])) && isset(($_POST['loginU'])) && isset(($_POST['op']))){
$loginU=$_POST['loginU'];
$passwordU=$_POST['passwordU'];

//insertion des donner
if($_POST['op']==="ajouter"){
    $sql3="
    INSERT INTO utilisateur(loginU,passwordU) values('$loginU','$passwordU');
    ";
    mysqli_query($conn,$sql3);
}

//conextion base de donnes 

if($_POST['op']==="valide?"){
    try{
        $sql="SELECT * FROM utilisateur WHERE loginU='$loginU' AND passwordU='$passwordU'";
        $existe = mysqli_query($conn, $sql);
        if(mysqli_num_rows($existe) == 0)
            throw new Exception("invalid !!");
        else
            echo "valid";	
    }catch(Exception $e){
        echo $e->getMessage();
    }
}
}
?>