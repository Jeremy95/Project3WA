<?php
// Initialisation de la session
session_start();

// On détruit et supprime la session en cours
session_destroy();

// Redirection vers l'index
header("Location: search.php");