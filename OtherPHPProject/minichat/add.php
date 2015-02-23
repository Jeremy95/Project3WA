<?php

// Initialisation de la DB et de la session
session_start();
$db = new PDO("mysql:host=127.0.0.1;dbname=minichat", 'root', 'troiswa');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Si la variable POST ne contient pas les clés "content" et "username"
if (array_key_exists("content", $_POST) == false || array_key_exists("username", $_SESSION) == false)
{
	header("Location: search.php");
	exit();
}

// Ajout du message dans la DB
$query = $db->prepare("INSERT INTO messages(id_author, content)
			  VALUES(:id, :content)");
$query->execute(array(
				"id" => $_SESSION["id"],
				"content" => htmlentities($_POST["content"])
			));

// Redirection vers l'index
header("Location: search.php");