<?php

//voici un array numérique

$tiroir = array("clef", "monnaie", "facture", "facture", "facture");

//affichez la deuxième valeur
echo "<hr>";

echo $tiroir[1];

//faites un print_r de cet array
echo "<hr>";

print_r($tiroir);

//affichez la dernière valeur (sans compter, vous etes développeur et paresseux)
echo "<hr>";

echo end($tiroir);

//ajoutez un autre élément dans l'array
echo "<hr>";

$tiroir[] = "porte";

//voici un array associatif
$livre = array(
			"titre" => "A Clash of Kings",
			"annee" => 2000,
			"pages" => 562,
			"auteur" => "George R. R. Martin"
);

//faites un print_r sur cet array
echo "<hr>";
//ajouter la clé "ISBN" (0-553-10803-4)
//ajouter la clé "prix" (25,98)
//affichez uniquement le nombre de page, en concaténant la chaine "Nombre de pages : "
$livre["ISBN"] = "0-553-10803-4";
$livre["prix"] = 25.98;

echo "Nombre de pages : ".$livre["pages"];

echo "<hr>";

echo "<h3 class='book_title'>".$livre["titre"]."</h3>";
//affichez le titre dans un balise h3. Cette balise doit avoir une classe de "book_title".
echo "<hr>";

//voici un array multidimensionnel
		$paiements = array(
			array(
				"montant" => 12.55,
				"date" => "12/02/2013"
			),
			array(
				"montant" => 132.11,
				"date" => "21/11/2013"
			),
			array(
				"montant" => 125.00,
				"date" => "09/03/2013"
			),
			array(
				"montant" => 128.11,
				"date" => "11/12/2012"
			)
		);


//faites un print_r, à l'intérieur de balises <pre>
echo "<hr>";

echo "<pre>";
echo print_r($paiements);
echo "</pre>";

//affichez le montant du deuxième paiement
echo "<hr>";


echo $paiements[1]["montant"];


//affichez la date du dernier paiement
echo "<hr>";

$var = end($paiements);

foreach($paiements as $key => $value)
{
	if($value == $var)
	{
		echo $paiements[$key]["date"];
	}
}

//ajoutez un nouveau paiement

$newMontant = array();
$paiements[] = array(
					"montant" => 146.21,
					"date" => "12/11/10"
						);

// on affiche pour tester :
echo "<hr>";

var_dump($paiements);

//modifiez le montant du premier paiement (nouvelle valuer : 133.42)

for($i=0; $i < sizeof($paiements); $i++)
{
	if($i == 0)
	{
		$paiements[$i]["montant"] = 133.42;
	}
}

// on affiche pour tester :

var_dump($paiements);


//construisez un array nommé "students" comprenant les prenoms de tous les etudiants

$students = array();
$students[0] = "Bruno";
$students[1] = "Marc";
$students[2] = "Jean";
$students[3] = "Celia";
$students[4] = "Alex";


//faites un print_r sur cet array
echo "<hr>";

var_dump($students);

//affichez le 4e étudiant de votre array
echo "<hr>";

echo $students[3];

//modifiez, un à un, le prenom de chaque etudiant pour qu'il contienne plutôt le prenom ET le nom de famille. 
//si vous ne le connaissez pas, soyez créatif.

$students[0] += " Mars";
$students[1] += " Morandini";
$students[2] += "-Marc Genereux";
$students[3] += " Langer";
$students[4] += " Deslandes";

// on affiche pour tester :
echo "<hr>";

var_dump($students);

//créez un array vide nommé "me"

//ajoutez les paires de clefs-valeurs suivantes à votre array associatif : 
//age = votre age
//first_name = votre prénom
//last_name = votre nom de famille
		
//affichez votre age en utilisant la valeur stockée dans l'array
echo "<hr>";

//faites-vous vieillir de 5 ans en ajoutant 5 à votre age, dans l'array

// on affiche pour tester :
echo "<hr>";

//créez un array vide nommé "mess"
//ajoutez-y un nombre quelconque
//ajoutez-y une valeur booléenne
//ajoutez-y votre array students
//ajoutez-y une clef "me" ayant pour valeur votre array "me"
//faites un print_r de "mess"
echo "<hr>";

//affichez votre age à partir de cet array
echo "<hr>";

//affichez le nom du 2e étudiant dans l'array
echo "<hr>";

//modifiez la valeur booléenne