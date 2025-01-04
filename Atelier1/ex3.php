<?php
function ValideChar($var){
    if(!preg_match("#^[a-zA-Z]+$#", $var)){
		echo "Invalid chaine de caractere";
    }
    elseif(empty($_POST['char'])) echo "le champ est vide";
    else{
        echo "Valid chaine de caractere";
    }
}
function ValideEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "Invalid email";
    }
    elseif(empty($_POST['email'])) echo "le champ est vide";
    else{
        echo "Valid email";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    <label for="char">entrez une chaine de caractere
    <input type="text" name="char" id="char">
   
    </label>
    <label for="email">
    <input type="text" name="email" id="email" placeholder="entrez votre email">
   
    <input type="submit">
    <input type="reset">
    </label>
    </form>
    <?php
    //if($_SERVER['REQUEST_METHOD']=='GET'){
        if(isset($_POST['char']) && isset($_POST['email'])){
            if(!empty($_POST['char']) && !empty($_POST['email'])){
                $char=htmlspecialchars($_POST['char']);
                $email=htmlspecialchars($_POST['email']);
                ValideEmail($email);
                ValideChar($char);
            }
            else echo "champs vide";
        }
        else echo "champs ne exsite pas";
    //}
    ?>
</body>
</html>