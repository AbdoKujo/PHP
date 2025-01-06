<?php
require_once "Compte.php";
class CompteCourant extends Compte{
    private $decouvert;
    public function __construct($numCompte, $solde, $decouvert){
        parent::__construct($numCompte, $solde);
        $this->decouvert=$decouvert;
    }
    public function retirer($mt):void{
        if($this->solde + $this->decouvert >= $mt){
            $this->solde -= $mt;
        }else throw new Exception("Solde insuffisant");
    }

//redefinition de getCompteState
    public function getCompteState():void{
        parent::getCompteState();
        echo "Decouvert : $this->decouvert\n";
    }    
}
?>
