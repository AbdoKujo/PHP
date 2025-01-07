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

/*
2. L'utilité des propriétés et méthodes statiques en PHP :
- Elles appartiennent à la classe elle-même et non aux instances
- Elles peuvent être appelées sans créer d'instance de la classe
- Elles sont partagées entre toutes les instances de la classe
- Elles sont utiles pour des fonctionnalités communes à toute la classe (comme des compteurs, des configurations globales)
- Elles permettent d'économiser de la mémoire car elles ne sont pas dupliquées pour chaque instance
3. L'utilité du mot-clé 'final' en PHP :
- Pour les classes : Empêche l'héritage de la classe (la classe ne peut pas être étendue)
- Pour les méthodes : Empêche la redéfinition de la méthode dans les classes enfants
- Il permet de :
- Protéger des fonctionnalités critiques contre la modification
- Garantir qu'un comportement reste constant dans toute l'application
- Améliorer la sécurité en empêchant la modification de méthodes sensibles
*/

//ex2 regarder atelier 3 ex2
?>
