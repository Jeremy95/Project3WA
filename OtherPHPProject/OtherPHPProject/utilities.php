<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 05/02/15
 * Time: 13:52
 */

function getCsvData($filename)
{
    // ouvrir le fichier $filename
    $file = fopen($filename, "r"); // doc fopen : http://php.net/manual/fr/function.fopen.php

    // On crée un résultat vide pour le moment
    $data = [];
    do {
        $line = fgetcsv($file);
        if ($line != false)
        {
            array_push($data, $line);
        }

    } while($line != false); // on boucle tant que line n'est pas "false".
    // La fonction fgetcsv retourne false si il n'y a plus de ligne à lire

    // on ferme le fichier
    fclose($file);
    return $data;
}

function putCsvData($filename, $data)
{
    $file = fopen($filename, "a"); // doc fopen : http://php.net/manual/fr/function.fopen.php

    $res = fputcsv($file, $data);

    fclose($file);

    return $res;
}

function removeCsvData($filename, $id)
{
    $save = getCsvData($filename);
    $file_handle = fopen($filename, "w");
    array_splice($save, $id, 1);
    foreach ($save as $value)
    {
        fputcsv($file_handle, $value);
    }
    fclose($file_handle);

}