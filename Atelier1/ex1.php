<?php

function dire_texte($qui,&$texte){
    $texte = "Bienvenue  $qui";
}
$chaine="Bonjour";
dire_texte("monsieur",$chaine);
echo $chaine;

function fun($x ,$y ) {
    if ($y == 0) return 1;
    else return $x * fun($x,$y-1);
}
$pow=0;
for($i=0;$i<2;$i++){
    $pow+=fun(2,3);
}
echo "<br>".fun($pow , 2)/16;
?>
