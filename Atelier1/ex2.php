<?php

// Initialisation du tableau
$notes = [
    "said" => 13,
    "badr" => 16,
    "najat" => 15
];

// Ajouter la note de l'étudiant "karim"
$notes["karim"] = 10;
echo "<br> \n apres ajouter karim";
var_dump($notes);

unset($notes["badr"]);// Supprimer ce objet

$note_max = max($notes); 
$note_min = min($notes); 

ksort($notes); // ordre alphabétique
echo "Tableau trié par ordre alphabétique :<br>";
foreach ($notes as $key => $value) {
    echo $key." => ".$value."<br>\n";
}

arsort($notes); // ordre décroissant
echo "<br><br>Tableau trié par mérite :<br>";
print_r(value: $notes);

$moyenne = array_sum($notes) / count($notes);
echo "<br><br>La moyenne de la classe est : $moyenne";

echo "<br><br>La note maximale est : $note_max";
echo "<br>La note minimale est : $note_min";

?>

