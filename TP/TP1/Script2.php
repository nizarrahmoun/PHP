<?php
// Démarrer une nouvelle session ou reprendre une session existante
session_start();

// Modifier la variable de session
$_SESSION["nom"] = "Modifié";
?>