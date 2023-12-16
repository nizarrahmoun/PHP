<?php
class CertainsPersonnes extends Personne {
    private $lieuNaissance;

    public function __construct($nom, $prenom, $dateNaissance, $lieuNaissance) {
        parent::__construct($nom, $prenom, $dateNaissance);
        $this->lieuNaissance = $lieuNaissance;
    }

    public function decrirePersonne() {
        return parent::decrirePersonne()." Je suis né à ".$this->lieuNaissance.".<br/>";
    }
}
?>