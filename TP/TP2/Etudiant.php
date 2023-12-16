<?php
include("Personne.php");
class Etudiant extends Personne {
    private $identifiant;

    public function __construct($nom, $prenom, $dateNaissance, $cne) {
        parent::__construct($nom, $prenom, $dateNaissance);
        $this->identifiant = $cne;
    }

    public function boursier() {
        $age = $this->age();
        if ($age < 23 && $age > 18) {
            return "boursier";
        }
        else {
            return "non boursier";
        }
    }

    public function decrirePersonne() {
        return parent::decrirePersonne()." Je suis ".$this->boursier().".<br/>";
    }
}
?>
