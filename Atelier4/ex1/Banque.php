<?php
require_once "IBanque.php";
require_once "Compte.php";
require_once "IAdmin.php";

class Banque implements IBanque, IAdmin {
    private $comptes = array();

    // Ajouter un compte
    public function addCompte(Compte $cp) {
        $this->comptes[] = $cp; // Ajoute simplement à la fin du tableau
    }

    // Afficher les comptes
    public function afficherComptes() {
        foreach ($this->comptes as $cp) {
            $cp->getCompteState(); // Méthode de la classe Compte
            echo "<hr/>";
        }
    }

    // Supprimer un compte par son code
    public function supprimerCompte($code) {
        foreach ($this->comptes as $index => $cp) {
            if ($cp->getCode() == $code) {
                unset($this->comptes[$index]); // Supprime le compte
                $this->comptes = array_values($this->comptes); // Réindexe le tableau
                break;
            }
        }
    }
}
?>
