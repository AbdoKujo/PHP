<?php
abstract class compte{
    protected int $code;
    protected float $solde;
    public function __construct($code,$solde){
        echo "Création d'un compte\n";
        $this->code=$code;
        $this->solde=$solde;
    }
    public function verser($mt):void{
        $this->solde+=$mt;
    }
    public function getCode():int{
        return $this->code;
    }
    public function retirer($mt):void{
        $this->solde-=$mt;
    }
    public function getCompteState():void{
        foreach($this as $key=>$value)
        echo($key."=".$value."<br/>");
    }
}
?>