<?php
require_once "Banque.php";
require_once "CompteCourant.php";

$b=new Banque();

$b->addCompte(new CompteCourant(1, 800 , 5222));
$b->addCompte(new CompteCourant(2, 1680, 8212));
$b->addCompte(new CompteCourant(3, 872, 1578));

$b->afficherComptes();

echo "<h3>apres suppression d 'un compte</h3>";
$b->supprimerCompte(2);
$b->afficherComptes();

?>