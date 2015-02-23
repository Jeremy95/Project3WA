<?php

// Initialisation de la DB et de la session
session_start();
$db = new PDO("mysql:host=127.0.0.1;dbname=minichat", 'root', 'troiswa');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// L'utilisateur est-il connecté ?
if (array_key_exists("username", $_SESSION))
{
	// oui, on lui affiche la page "bienvenue"
	include "welcome.phtml";
}
else
{
	// non, on lui affiche le formulaire pour se connecter
	include "login.phtml";
}

// On récupère tous les messages dans le DB
$query = $db->prepare("SELECT messages.id, messages.content, messages.date, users.username
			  FROM messages
			  JOIN users ON messages.id_author = users.id
			  ORDER BY date DESC");
$query->execute();
$messages = $query->fetchAll(PDO::FETCH_ASSOC);

// Puis on affiche la page "messages"
include "messages.phtml";