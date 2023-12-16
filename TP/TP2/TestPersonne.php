<?php
include("Personne.php");
include("Etudiant.php");
include("CertainsPersonnes.php");
$personne1 = new Personne("amine", "kamal", "1990");
echo $personne1->decrirePersonne();
$personne2 = new Personne("ahmed", "ali", "1995");
echo $personne2->decrirePersonne();
$personne3 = new CertainsPersonnes("mohamed", "khalid", "1992", "rabat");
echo $personne3->decrirePersonne();
$personne4 = new Etudiant("youssef", "mohamed", "1993", "casablanca");
echo $personne4->decrirePersonne();

?>