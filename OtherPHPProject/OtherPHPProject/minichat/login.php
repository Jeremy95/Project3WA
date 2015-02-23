<?php

// Initialisation de la DB et de la session
session_start();
$db = new PDO("mysql:host=127.0.0.1;dbname=minichat", 'root', 'troiswa');

// Si la variable POST ne contient pas les clés "username" et "password"
if (array_key_exists("username", $_POST) == false || array_key_exists("password", $_POST) == false)
{
	header("Location: search.php");
	exit();
}

// On va chercher en DB l'utilisateur ayant le nom passé en POST
$query = $db->prepare("SELECT * FROM users WHERE username = :username");
$query->execute(array("username" => $_POST["username"]));
$user = $query->fetch(PDO::FETCH_ASSOC);

// L'utilisateur existe-t-il ?
if ($user)
{
	// oui, alors on compare son mot de passe au mot de passe passé en POST
	if (password_verify($_POST["password"], $user["password"]))
	{
		// les mots de passe correspondent, on initialise des variables de session
		$_SESSION["id"] = $user["id"];
		$_SESSION["username"] = $user["username"];
	}
	else
	{
		// les mots de passe ne correspondent pas, on prépare un message d'erreur
		$_SESSION["error"] = "Invalid password";
	}
}
else
{
	// l'utilisateur n'existe pas, on prépare un message d'erreur
	$_SESSION["error"] = "Unknown user";
}

// Redirection vers l'index
header("Location: search.php");