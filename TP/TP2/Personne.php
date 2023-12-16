<?php
class Personne {
    private $nom;
    private $prenom;
    private $dateNaissance;

    public function __construct($nom, $prenom, $dateNaissance) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
    }

    public function presenter() {
        echo "je m'appelle ".$this->prenom." ".$this->nom.".<br/>";
    }

    public function age(){
        $dateNaissance = new DateTime($this->dateNaissance);
        $dateAujourdhui = new DateTime();
        $age = $dateNaissance->diff($dateAujourdhui)->y;
        return $age;
        }

    public function decrirePersonne() {
        return $this -> presenter()." et j'ai ".$this->age()." ans.<br/>";
    }


}

?>

