<?php 
function cumul($prix) {
    static $cumul = 0; // Variable statique pour mémoriser le total
    static $i = 1; // Variable statique pour compter les appels
    echo "Total des achats $i = ";
    $cumul += $prix; // Ajouter le prix au total
    $i++; // Incrémenter le compteur
    return $cumul; // Retourner le total
}

echo cumul(175) . "<br>";//Total des achats 1 = 175
echo cumul(65) . "<br>";//Total des achats 2 = 240
echo cumul(69) . "<br>";//Total des achats 3 = 309

//ex2 regarder atelier 3 ex2
?>
