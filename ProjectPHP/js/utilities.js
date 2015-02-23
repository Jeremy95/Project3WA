/*******************************************************************************************/
/********************************** FONCTIONS UTILITAIRES **********************************/
/*******************************************************************************************/
function getRandomInteger(min, max)
{
    var result = Math.floor(Math.random() * (max - min + 1)) + min;
    return result;
}

function getFormFieldValue(selector, fieldName)
{
    var form = document.querySelector(selector);
    var field = form.elements.namedItem(fieldName);

    return field.value;
}

function installEventHandler(selector, event, eventHandler)
{
    var domObject;

    // Récupération du premier objet DOM correspondant au sélecteur.
    domObject = document.querySelector(selector);

    // Installation d'un gestionnaire d'évènement sur cet objet DOM.
    domObject.addEventListener(event, eventHandler);
}

function installMulitpleEventHandler(selector, event, eventHandler)
{
    var domObjects;

    // Récupération de la liste de toutes les nodes correspondant
    domObjects = document.querySelectorAll(selector);

    for(var i = 0; i < domObjects.length; i++)
    {
        // pour chaque element dans la liste
        domObjects[i].addEventListener(event, eventHandler);
    }
}
