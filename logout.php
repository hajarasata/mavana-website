<?php
// Fichier: logout.php

// Démarrer la session pour pouvoir la manipuler.
session_start();

// Détruire toutes les variables de session.
$_SESSION = array();

// Détruire la session elle-même.
session_destroy();

// Rediriger vers la page de connexion.
header("Location: login.php");
exit;
?>