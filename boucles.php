<?php

/*
** NOTE : par mesure de lisibilité, tous les exercices sont séparés par une ligne horizontale (une balise HTML <hr>)
*/

//affichez les nombres de 1 à 100
for($i=1; $i <= 100; $i++)
{
	echo $i."<br/>";
}

//affichez les nombres de 5 à 25, séparé par des virgules
echo "<hr>";

for($y=5; $y <= 25; $y++)
{
	echo $y.",";

	if($y == 25)
	{
		echo $y.".";
	}
}

//affichez les multiples de 5 compris entre 0 et 100
echo "<hr>";

for($x=0; $x <= 100; $x++)
{
	if($x%5 == 0)
	{
		echo $x;
	}
}
//affichez les nombres pairs de 20 à 60, séparés par des balises "<br />"
echo "<hr>";


for($c=20; $c <= 60; $c++)
{
	if($c%2 == 0)
	{
		echo $c."<br/>";
	}
}

//affichez toutes les années depuis votre naissance. Chaque année doit être affichée dans une balise "<p>"
//ayant une classe de "birth_date"
echo "<hr>";

$date = date("Y");

for($i=1992; $i <= $date; $i++)
{
	echo "<p class='birth_date'>".$i."</p>";
}

//affichez les nombres de 50 à 25, en ordre décroissant, sauf le nombre 30.
echo "<hr>";

for($i=50; $i >= 25; $i--)
{
	if($i != 30)
	{
		echo $i;
	}
}

//construisez un array nommé "nums" contenant les nombres 10 à 20 (avec une boucle)

$nums = array();

for($i=10; $i < 20; $i++)
{
	$nums[] = $i;
}
//voici un array numérique
$tiroir = array("clef", "monnaie", "facture", "facture", "facture");

//faites un print_r
echo "<hr>";

print_r($tiroir);

//affichez toutes les valeurs de l'array
echo "<hr>";

for($i=0; $i < count($tiroir); $i++)
{
	echo $tiroir[$i]." ";
}

//affichez toutes les valeurs, séparés par des "<br />"
echo "<hr>";

for($i=0; $i < count($tiroir); $i++)
{
	echo $tiroir[$i]."<br/>";
}

//voici un array associatif
$livre = array(
"titre" => "A Clash of Kings",
"annee" => 2000,
"pages" => 562,
"auteur" => "George R. R. Martin"
);

//affichez toutes les clefs et toutes les valeurs dans ce format, sans utiliser directement les clefs dans votre code :
//clef : valeur<br />
//clef : valeur<br />
echo "<hr>";

foreach($livre as $key => $value)
{
	echo $key." : ".$value."<br />\n";
}


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

//affichez tous les paiement.
//chaque paiement doit être contenu dans un div et être affiché sous cette forme :
//<div class="payment">
//<h3>PAIEMENT</h3>
//montant : 999.99
//date : 11/11/1911
//</div>
echo "<hr>";

foreach($paiements as $key => $value)
{
	echo "<div class='payment'>";
	echo "<h3>PAIEMENT</h3>";
	echo "montant : ".$paiements[$key]["montant"]."<br/>";
	echo "date : ".$paiements[$key]["date"];
	echo "</div>";
}



