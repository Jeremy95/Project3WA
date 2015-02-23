<?php

// Initialisation de la DB et de la session
session_start();
$db = new PDO("mysql:host=127.0.0.1;dbname=minichat", 'root', 'troiswa');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Si la variable POST ne contient les clés "username" et "password"
if (array_key_exists("password", $_POST) && array_key_exists("username", $_POST))
{
	// On insère un nouvel utilisateur dans la base de données
	$query = $db->prepare("INSERT INTO users(username, password)
				  VALUES(:username, :password)");
	$query->execute(array(
		"username" => $_POST["username"],
		"password" => password_hash($_POST["password"], PASSWORD_DEFAULT) // ici, la fonction password_hash va "crypter" le mot de passe
		));

	// TODO : vérifier que l'utilisateur a bien été créé

	// On instancie les variables de session (on "connecte" l'utilisateur)
	$_SESSION["username"] = $_POST["username"];
	$_SESSION["id"] = $db->lastInsertId();

	// Redirection vers l'index
	header("Location: search.php");
	exit();
}
else
{
	// Si la variable POST est vide, cela signifie que le formulaire n'a pas été validé.
	// On l'affiche
	include "register.phtml";
}