/**
 * Created by wap19 on 09/01/15.
 */

/* Commentaire
 en deux ligne */
// commentaire en une ligne

//alert('Hello world !');
//document.write('Hello world !');
//console.log('Hello world !');

// Creation d'une variable
//var name;
// Affectation d'une valeur
//name = "votre nom";

// Creation + affectation
//var name2 = "Roger"
//console.log(name);
//console.log(name2);

//name ="Votre nom modifié";
//console.log(name);

// comprend une chaine de caractere
//var age = "31";

//Comprend un vrai nombre
//var age2 = 31;

//console.log(age);
//console.log(age2);

// Les constantes sont des variable inchangeable
//const PI = 3.14;
//console.log(PI);

// Operation sur  les variables
//var age = 31;
//console.log(age);
//age = 32;
//console.log(age);
//
//age = age + 5;
//console.log(age);
//
//age += 5;
//console.log(age);

/*

 age = age [operateur] 5;
 age [operateur]= 5;

 age = age + 10;
 age += 10;

 age = age - 10;
 age -= 10;


 age = age / 2;
 age /= 2;

 */

//var nombre1 = 4;
//var nombre2 = 12;

//var resultat = nombre1 + nombre2;

//var age;
//
//age = "38";
//age = parseInt(age) + 15;
//
//console.log(age);
//
//age = 38;
//age = age + 15;
//
//console.log(age);
//
//var surname = "Jean";
//var lastname = "Dupont";
//var fullname =  surname + " " + lastname;
//console.log(fullname);

//do
//{
//    var montantHT = prompt("Entrez un montant HT");
//}
//while(isNaN(montantHT));
//
//do
//{
//    var tauxTVA = prompt("Entrez taux TVA (sans le %)");
//}
//while(isNaN(tauxTVA));
//
//
//tauxTVA = parseFloat(tauxTVA);
//montantHT = parseFloat(montantHT);
//var montantTVA = montantHT * tauxTVA / 100;
//var montantTTC = montantHT + montantTVA;
//montantTVA = Math.round(montantTVA*100)/100;
//montantTTC = Math.round(montantTTC*100)/100;
//
//document.write("<p>" + "Montant HT : " + montantHT + "€</p>");
//document.write("<p>" + "Montant TVA : " + montantTVA + "€</p>");
//document.write("<p>" + "Montant TTC : " + montantTTC + "€</p>");
//
//do
//{
//    var remiseMontantHT = prompt("Voulez vous une remise ? (oui ou non)");
//}
//while(remiseMontantHT != "oui" && remiseMontantHT != "non");
//
//if(remiseMontantHT == "oui")
//{
//    montantHT = montantHT * 0.9;
//    document.write("<h2> Nouveau prix</h2>");
//    document.write("<p>" + "Montant HT : " + montantHT + "€</p>");
//    document.write("<p>" + "Montant TVA : " + montantTVA + "€</p>");
//    document.write("<p>" + "Montant TTC : " + montantTTC + "€</p>");
//}
//
//
//else
//{
//    alert("Vous êtes bien con !");
//}

//var min = 1;
//var max = 10;
//
//var leJustePrix = Math.floor(Math.random() * (max - min - 1)) + min;
//var count = 0;
//var maxTry = 5;
//
//do
//{
//    var trouveLeJustePrix = prompt("Trouvez le bon numéro vous avez " +
//    "5 tentatives bonne chance !");
//
//    if (count >= maxTry)
//    {
//        alert("Vous avez épuisé toutes vos tentatives");
//        break;
//    }
//    if(!isNaN(trouveLeJustePrix) || trouveLeJustePrix == "")
//    {
//        if(trouveLeJustePrix > leJustePrix)
//        {
//            alert("C'est moins");
//        }
//        else if (trouveLeJustePrix == null)
//        {
//            break;
//        }
//        else if (trouveLeJustePrix < leJustePrix)
//        {
//            alert("C'est plus !");
//        }
//        else
//        {
//            alert("C'est bon");
//        }
//        count++;
//    }
//    else
//    {
//        alert("Tapez un numéro !");
//    }
//}
//while(leJustePrix != trouveLeJustePrix);
//
//var s = "";
//if (count > 1)
//    s = "s";
//if (leJustePrix == trouveLeJustePrix)
//    alert("vous avez gagné en "+count+" tentative"+s);



//for(i = 0; i < 1000; i++)
//{
//    if(i%3 == 0 || i%5 == 0)
//    {
//        resultat += i;
//    }
//}
//var i = 2;
//var prev = 1;
//var resultat = 0;
//var saveCurrent = 0;
//
//while(i < 4000000)
//{
//    saveCurrent = i;
//    i = i + prev;
//    prev = saveCurrent;
//
//    if(i%2 == 0)
//    {
//        resultat += i;
//    }
//}
//
//document.write(resultat);

var tab = [];
var tableMultiplication = prompt("Quelle table de multiplication voulez vous ?");

document.write("<table class='tableau'><caption><strong>Table de multiplication de 1 à 10</strong></caption>");

for(i = 1; i <= tableMultiplication; i++)
{
    tab[i] = i;
    document.write("<tr><td>" + i + "</td>");
    for(y = 1; y <= tableMultiplication; y++)
    {
        //tab[y] = y;
        //document.write("tab [" + (tab[i]) + "]" +
        //                "[" + tab[y] + "]" + " = " + (i* y) + "<br/>");
        if(i == y)
        {
            document.write("<td class='special'>" + (i * y) + "</td>");
        }
        else
        {
            document.write("<td>" + (i * y) + "</td>");
        }

    }
    document.write("</tr>");
}
document.write("</table>");


//Tableau
//var list = new Array();
//list[0] = "pain";
//list[1] = "lait";
//list[2] = "oeufs";
//
//var list2 = ["chocolat", "cereales", "sucre"];
//
//console.log(list);
//console.log(list2);
//
////Tableau associatif ou dictionnaire
//var tableau = new Array();
//tableau["urgent"] = "faire la vaiselle";
//tableau["procrastiner"] = "Apeller maman";
//
//console.log(tableau);
//
//
//
//var tableau2 = {
//                "urgent" : "Faire la vaiselle",
//                "procrastiner" : "appeler maman"
//               };
//console.log(tableau2);
//
//var month = ["Janvier", "Fevrier", "Mars"];
//
//document.write(month[1]);
//
//var now = new Date();
//var dayNumber = now.getDay();
//var days = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
//var frenchDay = days[dayNumber];
//var month = ["Janvier", "Fevrier", "Mars", "Avril", "Mai",
//             "Juin", "Juillet", "Aout", "Septembre",
//             "Octobre", "Novembre", "Decembre"];
//
//var minutes = now.getMinutes();
//var seconds = now.getSeconds();
//
//if(minutes < 10)
//{
// minutes = "0" + minutes;
//}
//
//if(seconds < 10)
//{
// seconds = "0" + seconds;
//}
//var monthNumber = now.getMonth();
//document.write("</br>" + "Nous sommes " +
//               frenchDay + " " + now.getDate() + " " + month[monthNumber] + " "
//               + now.getFullYear() + " et il est " + now.getHours() + ": " +
//               minutes + ": " + seconds);

//var number = 1000;
//
//var askToClient = prompt("Entrez un numéro");
//
//if (askToClient < number)
//{
//    document.write("Le nombre que vous avez rentré est trop petit");
//}
//else if (askToClient > number) {
//    document.write("Le numéro est trop grand");
//}
//else
//{
//    document.write("C'est le bon numéro");
//}


// Créer une variable sans type :
//var maVariable;

// Créer une variable de type tableau :
//var tableau = []; // ou var tableau = new Array()

// Créer une variable de type objet
//var voiture = {};
//
//voiture['marque'] = 'Peugeot';
//voiture.marque = 'Peugeot';
//voiture.nbPlace = 5;
//voiture.passagers = [];
//voiture.passagers[0] = "Julie";
//voiture.passagers[1] = "Paul";
//voiture.dateAchat = new Date('2013-06-20');
//
//console.log(voiture);
//console.log(voiture.passagers);
//
//document.write("<h3>Informations voiture :</h3>"
//                + "<p> Date d'achat : "
//                + voiture.dateAchat.toDateString() + "</p>"
//                + "<p> Nombres passagers : " + voiture.nbPlace + "</p>"
//                + "<p> Marque de la voiture : " + voiture.marque + "</p>"
//                + "<p> Noms des passagers : " + voiture.passagers + "</p>");



//var num1 = parseFloat(prompt("Entrez un premier nombre"));
//var op = prompt("Entrez un opérateur (+, -, *, %)");
//var num2 = parseFloat(prompt("Entrez un deuxiéme nombre"));
//var resultat;
//
//
//switch (op)
//{
//    case "+" :
//        resultat = num1 + num2;
//        break;
//    case "-" :
//        resultat = num1 - num2;
//        break;
//    case "*" :
//        resultat = num1 * num2;
//        break;
//    case "/" :
//        resultat = num1 / num2;
//        break;
//    case "%" :
//        resultat = num1 % num2;
//        break;
//    default :
//        resultat = 0;
//}
//
//document.write(num1 + "+" + num2 + "=" + resultat);

//var index;
//
//var phrases =
//    [
//        "Lorem ipsum dolor sit amet, consectetuer adipiscing elit.",
//        "Aenean commodo ligula eget dolor. Aenean massa.",
//        "Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.",
//        "Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.",
//        "Nulla consequat massa quis enim.",
//        "Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.",
//        "In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.",
//        "Nullam dictum felis eu pede mollis pretium.",
//        "Integer tincidunt. Cras dapibus.",
//        "Vivamus elementum semper nisi.",
//        "Aenean vulputate eleifend tellus.",
//        "Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.",
//        "Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.",
//        "Phasellus viverra nulla ut metus varius laoreet.",
//        "Quisque rutrum. Aenean imperdiet.",
//        "Etiam ultricies nisi vel augue.",
//        "Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.",
//        "Lorem ipsum dolor sit amet, consectetuer adipiscing elit.",
//        "Aenean commodo ligula eget dolor. Aenean massa.",
//        "Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus.",
//        "Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.",
//        "Nulla consequat massa quis enim.",
//        "Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.",
//        "In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.",
//        "Nullam dictum felis eu pede mollis pretium.",
//        "Integer tincidunt. Cras dapibus.",
//        "Vivamus elementum semper nisi.",
//        "Aenean vulputate eleifend tellus.",
//        "Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.",
//        "Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.",
//        "Phasellus viverra nulla ut metus varius laoreet.",
//        "Quisque rutrum. Aenean imperdiet.",
//        "Etiam ultricies nisi vel augue.",
//        "Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.",
//        "Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit ipsuminus max.",
//        "Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.",
//        "Maecenas nec odio et ante tincidunt tempus.",
//        "Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante.",
//        "Etiam sit amet orci eget eros faucibus tincidunt. Duis leo.",
//        "Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.",
//        "Sed consequat, leo eget bibendum sodales, augue velit cursus nunc."
//    ];
//
////for(initialisation;condition;incrémentation)
//var maximum = phrases.length;
//var phrasesLaPlusLongue = 0;
//var phrasesLaPlusCourte = 0;
//var total;
//
////for(index = 0; index < maximum; index++)
////{
////    document.write("La phrase numéro "+index+" est : "+phrases[index]+"<br>");
////    document.write("la longueur de cette phrase est : "+phrases[index].length+"<br>");
////}
//
//for(index = 0; index < maximum; index++)
//{
//    if(phrases[index].length > phrases[phrasesLaPlusLongue].length)
//    {
//        phrasesLaPlusLongue = index;
//    }
//
//    if(phrases[index].length < phrases[phrasesLaPlusCourte].length)
//    {
//        phrasesLaPlusCourte = index;
//    }
//}
//
//var total = 0;
//
//for (var i = 0; i < phrases.length; i++)
//{
//    total += phrases[i].length;
//}
//
//var moyenne = total / phrases.length;
//
//
//document.write("La phrase la plus longue est la phrase numéro : " + phrasesLaPlusLongue + " qui fait " + phrases[phrasesLaPlusLongue].length + " caractéres" + "<br/>");
//document.write("La phrase la plus courte est la phrase numéro : " + phrasesLaPlusCourte + " qui fait " + phrases[phrasesLaPlusCourte].length + " caractéres" + "<br/>");
//document.write("La moyenne de la longueur des phrases est de " + moyenne);

/****************************/

/*
 ** Variables
 */

// Primitives :
//var name = "Roger";
//var age = 42;

// Tableaux :
//var students = new Array();
//students[0] = "Bob";
//students[1] = "Alice";
// Syntaxe raccourcie
//var students = ["Bob", "Alice"];

// Tableaux associatifs :
//var student = new Array();
//student["name"] = "bob";
//student["subject"] = "Programming";

// Objets :
//var student = new Object();
//var truc = "subject";
//student.name = "Alice";
//student[truc] = "Programming";


/*
 ** Structures de contrôle
 */

// Conditions

//var age = 24;
//
//if (age < 18)
//{
//    console.log("vous êtes mineur");
//}
//else if(age > 70)
//{
//    console.log("vous êtes vieux");
//}
//else
//{
//    console.log("vous êtes majeur");
//}
//
//var game_level = 3;
//switch(game_level)
//{
//    case 1 :
//        console.log("facile");
//        break;
//    case 2 :
//        console.log("normal");
//        break;
//    case 3 :
//        console.log("difficile");
//        break;
//    default :
//        console.log("normal");
//        break;
//}

// Boucles
//var students["Bob", "Alice"];

//for(var index = 0; index < students.length; index++)
//{
//    console.log("Etudiant numéro "+index+" : "+students[index]);
//}


//var index = 0;
//while(index < students.length)
//{
//    console.log("Etudiant numéro "+index+" : "+students[index]);
//    index++;
//}

//var index = 0;
//do {
//    console.log("Etudiant numéro "+index+" : "+students[index]);
//    index++
//} while(index < students.length);

// Piles / Files
// Ce sont en réalité de "simples" tableaux
// MAIS on les utilise à l'aide de méthodes et non en accédant directement à une "case" du tableau

//var students = [];
//students.push("Bob"); // Ajouter un élément à la FIN du tableau;
//students.unshift("Alice"); // Ajouter un élément au DEBUT du tableau;
//
//var student1 = students.pop(); // Récupérer le DERNIER élément du tableau;
//var student1 = student.shift(); // Récupérer le PREMIER élément du tableau;

/*********************************************************/