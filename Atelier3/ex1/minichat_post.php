<?php
include "connection.php";

    $req = $conn->prepare('INSERT INTO minichat (pseudo, msg) VALUES (?, ?)');
    $req->execute([$_POST['pseudo'], $_POST['msg']]);

    header('Location: minichat.php');
?>