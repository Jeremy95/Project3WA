<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 30/01/15
 * Time: 11:16
 */

$dictionary = array(
    "dog" => "chien",
    "hello" => "bonjour",
    "above" => "au-dessus",
    "about" => "sur",
    "actor" => "acteur",
    "accept" => "accepter",
    "accompany" => "accompagner",
    "add" => "ajouter",
    "address" => "adresse",
    "adjective" => "adjectif",
    "accident" => "accident",
    "after" => "apres",
    "before" => "avant"
);

$message = "";

function translate($word, $dictionary, $direction)
{
    if ($direction == "toFrench")
    {
        if (array_key_exists($word, $dictionary))
        {
            // définir le message "le mot $word se traduit par <traduction>"
            $message = "Le mot ".$word." se traduit par ".$dictionary[$word];
        }
        else
        {
            // définir le message "je ne connais pas le mot $word"
            $message = "Je ne connais pas le mot ".$word;
        }
    }
    else if ($direction == "toEnglish")
    {

        if (in_array($word, $dictionary))
        {
            $message = "Le mot ".$word." se traduit par ".array_search($word, $dictionary);
        }
        else
        {
            $message = "Je ne connais pas le mot ".$word;
        }
    }
    else
    {
        $message = "Je ne connais pas cette langue";
    }
    return $message;
}

function translatePost($word, $dictionary, $direction)
{
    if ($direction == "toFrench")
    {
        if (array_key_exists($word, $dictionary))
        {
            // définir le message "le mot $word se traduit par <traduction>"
            $message = "Le mot ".$word." se traduit par ".$dictionary[$word];
        }
        else
        {
            // définir le message "je ne connais pas le mot $word"
            $message = "Je ne connais pas le mot ".$word;
        }
    }
    else if ($direction == "toEnglish")
    {

        if (in_array($word, $dictionary))
        {
            $message = "Le mot ".$word." se traduit par ".array_search($word, $dictionary);
        }
        else
        {
            $message = "Je ne connais pas le mot ".$word;
        }
    }
    else
    {
        $message = "Je ne connais pas cette langue";
    }
    return $message;
}



if (array_key_exists("word", $_GET) && !empty($_GET["word"]))
{
    // oui, il y a bien une clé "word" dans le tableau $_GET

    if (array_key_exists("direction", $_GET) && !empty($_GET["direction"]))
    {
        $direction = $_GET["direction"];
    }
    else
    {
        $direction = "toFrench";
    }

    $message = translate($_GET["word"], $dictionary, $direction);
}
else
{
    $message = "Veuillez entrer un mot";
}




if (array_key_exists("word", $_POST) && !empty($_POST["word"]))
{
    // oui, il y a bien une clé "word" dans le tableau $_GET

    if (array_key_exists("direction", $_POST) && !empty($_POST["direction"]))
    {
        $direction = $_POST["direction"];
    }
    else
    {
        $direction = "toFrench";
    }

    $message = translate($_POST["word"], $dictionary, $direction);
}
else
{
    $message = "Veuillez entrer un mot";
}



include "viewTranslate.phtml";