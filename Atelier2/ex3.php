<form method="POST">

    <LABEL for="nom">nom</LABEL>
    <input type="text" id="nom" name="nom" placeholder="Nom">

    <LABEL for="prenom">prenom</LABEL>
    <input type="text" id="prenom" name="prenom" placeholder="prenom">
    <br>
    <LABEL for="salaire">salaire</LABEL>
    <input type="number" id="salaire" name="salaire" placeholder="salaire" >
  
    <LABEL for="id">id</LABEL>
    <input type="number" id="id" name="id" placeholder="id" >
    <br>
    <select name="op" id="op" name="op">
        <option name="ajouter" id="ajouter" value="ajouter">ajouter</option>
        <option value="modifier" name="modifier" id="modifier">modifier</option>
        <option value="afficher" name="afficher" id="afficher">afficher</option>
        <option value="supprimer" name="supprimer" id="supprimer">supprimer</option>
    </select>

    <input type="submit">

</form>
<?php

$conn = mysqli_connect('localhost', 'root', '', 'database');

// Vérifie si la connexion est établie
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

function add($conn){
    
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['salaire'])){
        $insert=$conn->prepare('INSERT INTO personnes(nom,prenom,salaire) VALUES(?,?,?)');
        $insert->execute(array($_POST['nom'],$_POST['prenom'],$_POST['salaire']));
     }else echo "Veuillez remplir tous les champs";
}
function edit($conn){
    if( isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['salaire']) && isset($_POST['id']) ){
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $salaire=$_POST['salaire'];
        $id=$_POST['id'];
        $modifier=$conn->prepare("UPDATE personnes SET nom ='$nom' ,prenom ='$prenom' ,salaire ='$salaire' WHERE id =$id ");
        $modifier->execute();
     }else echo "Veuillez remplir tous les champs";
}
function deletee($conn){
    if(isset($_POST['id'])){
        $supp=$conn->prepare('DELETE FROM personnes WHERE id =?');
        $supp->execute(array($_POST['id']));
     }else echo "Veuillez remplir le champs id";
}
    function display($conn){
        $query = "SELECT * FROM personnes";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo '<br>';
            echo '<table border="1">';
            echo '<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Salaire</th></tr>';
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                echo '<td>' . htmlspecialchars($row['nom']) . '</td>';
                echo '<td>' . htmlspecialchars($row['prenom']) . '</td>';
                echo '<td>' . htmlspecialchars($row['salaire']) . '</td>';
                echo '</tr>';
            }
            echo '</table>';
            mysqli_free_result($result);
        } else {
            echo "Erreur lors de l'affichage des données : " . mysqli_error($conn);
        }
}
if(isset($_POST['op']) && $_POST['op']==="ajouter") add($conn);
if(isset($_POST['op']) && $_POST['op']==="modifier") edit($conn);
if(isset($_POST['op']) && $_POST['op']==="afficher") display($conn);
if(isset($_POST['op']) && $_POST['op']==="supprimer") deletee($conn);

?>
<?php

// Connexion à la base de données
$conn = mysqli_connect('localhost', 'root', '', 'database');

// Vérifie si la connexion est établie
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Vérification si la table existe déjà
$tableName = 'personnes';
$tableExists = mysqli_query($conn, "SHOW TABLES LIKE '$tableName'");

if (mysqli_num_rows($tableExists) == 0) {
    // Requête pour créer la table
    $sql = "
    CREATE TABLE $tableName (
        id INT(11) NOT NULL AUTO_INCREMENT,
        nom VARCHAR(255) NOT NULL,
        prenom VARCHAR(255) DEFAULT NULL,
        salaire FLOAT DEFAULT NULL,
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

// Fermer la connexion
mysqli_close($conn);
?>