<?php
include "connection.php";


    $response = $conn->query("SELECT pseudo, msg FROM minichat ORDER BY id DESC LIMIT 0, 10");
    while ($donnees = $response->fetch(PDO::FETCH_ASSOC)) {
        echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['msg']) . '</p>';
    }
?>

<form action="minichat_post.php" method="post">
    <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" required><br />
        <label for="msg">Message</label> : <input type="text" name="msg" id="msg" required><br />
        <input type="submit" value="Envoyer">
    </p>
</form>