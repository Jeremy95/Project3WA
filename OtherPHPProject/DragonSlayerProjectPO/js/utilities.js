/*******************************************************************************************/
/********************************** FONCTIONS UTILITAIRES **********************************/
/*******************************************************************************************/

// TODO: Ajouter ici la function permettant d'obtenir un nombre aléatoire.

function getRandomInteger(min, max)
{
    var result;
    result = Math.floor(Math.random() * (max - min + 1)) + min;
    return result;
}