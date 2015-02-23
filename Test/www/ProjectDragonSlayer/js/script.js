/**
 * Created by wap19 on 22/01/15.
 */

/*
 ** Données
 */
var game;

const LEVEL_EASY = 1;
const LEVEL_NORMAL = 2;
const LEVEL_HARD = 3;

const SWORD_WOOD = 1;
const SWORD_SILVER = 2;
const SWORD_DIAMANT = 3;

const ARMOR_WOOD = 1;
const ARMOR_STEEL = 2;
const ARMOR_DIAMANT = 3;

function initializeGame()
{
    game = {};
    game.round = 1;

    game.difficulty = requestInteger("Choisissez votre niveau de difficulté : " +
    "\n 1. Facile" +
    "\n 2. Normal" +
    "\n 3. Difficile", 1, 3);

    game.weaponRatio = requestInteger("Choisissez votre arme : " +
    "\n 1. Epee en Bois" +
    "\n 2. Epee en Argent " +
    "\n 3. Epee en Diamant", 1, 3);

    game.armorRatio = requestInteger("Choisissez votre armure : " +
    "\n 1. Armure en Bois" +
    "\n 2. Armure en Argent " +
    "\n 3. Armure en Diamant", 1, 3);

    switch(game.difficulty)
    {
        case LEVEL_EASY :
            game.dragonLife = getRandomInteger(100, 200);
            game.playerLife = getRandomInteger(200, 250);
            break;

        case LEVEL_NORMAL :
            game.dragonLife = getRandomInteger(200, 250);
            game.playerLife = getRandomInteger(200, 250);
            break;

        case LEVEL_HARD :
            game.dragonLife = getRandomInteger(200, 250);
            game.playerLife = getRandomInteger(150, 200);
            break;
    }

    switch (game.weaponRatio)
    {
        case SWORD_WOOD :
            game.weaponRatio = 0.5;
            break;

        case SWORD_SILVER :
            game.weaponRatio = 1;
            break;

        case SWORD_DIAMANT :
            game.weaponRatio = 3;
            break;
    }

    switch (game.armorRatio)
    {
        case ARMOR_WOOD :
            game.armorRatio = 1.2;
            break;

        case ARMOR_STEEL :
            game.armorRatio = 1.5;
            break;

        case ARMOR_DIAMANT :
            game.armorRatio = 2;
            break;
    }

    console.log(game);
}

function showGameState()
{
    console.log("Dragon: " + Math.round(game.dragonLife) + "HP" +
    " Player: " + Math.round(game.playerLife) + "HP");
}

function getPlayerDamagePoint()
{
    var damage;
    switch (game.difficulty)
    {
        case LEVEL_EASY :
            damage = getRandomInteger(20, 30);
            break;
        case LEVEL_NORMAL :
            damage = getRandomInteger(10, 20);
            break;
        case LEVEL_HARD :
            damage = getRandomInteger(1, 10);
            break;
    }

    damage = damage * game.weaponRatio;
    return damage;
}

function getDragonDamagePoint()
{
    var damage;
    switch (game.difficulty)
    {
        case LEVEL_EASY :
            damage = getRandomInteger(1, 10);
            break;
        case LEVEL_NORMAL :
            damage = getRandomInteger(10, 20);
            break;
        case LEVEL_HARD :
            damage = getRandomInteger(20, 30);
            break;
    }

    damage = damage / game.armorRatio;
    return damage;
}

function gameLoop()
{
    var damagePoint;
    var initiative;
    var potion;
    var burn;

    while(game.dragonLife > 0 && game.playerLife > 0)
    {
        initiative = getRandomInteger(1, 2);
        potion = getRandomInteger(1, 60/game.difficulty);
        burn = getRandomInteger(1, 20/game.difficulty);
        console.log("Round: " + game.round);

        if(burn < 2)
        {
            game.burn = true;
        }

        if(potion < 2)
        {
            game.playerLife += 25;
            if(game.burn == true)
            {
                game.burn = false;
                console.log("Tu brûle plus !");
            }

            console.log("Super ta une popo tu gagne 25 pts de vie");
            document.write("<img src='img/potion.png'>");
        }

        if(initiative > 1)
        {
            damagePoint = getPlayerDamagePoint();
            game.dragonLife -= damagePoint;
            console.log("Le joueur est plus rapide et attaque en premier et inflige " + Math.round(damagePoint) + " de dégât");
        }
        else
        {
            damagePoint = getDragonDamagePoint();
            game.playerLife -= damagePoint;
            console.log("Le dragon est plus rapide et attaque en premier et inflige " + Math.round(damagePoint) + " de dégât");
        }

        if(game.burn == true)
        {
            game.playerLife -= 3;
            console.log("Tu brûles comme une merde !");
        }


        game.round++;
        showGameState();
    }
}

function showGameWinner()
{
    if(game.dragonLife <= 0)
    {
        document.write("<br/>" + "Vous avez gagné" +
        "<br/>" +
        "Dragon: " + game.dragonLife +
        "<br/>" +
        "Player: " + game.playerLife +
        "<img src='img/castlevania-chevalier-noir_1.jpg'>");
    }
    else
    {
        document.write("Vous vous êtes fait défoncé" +
        "<br/>" +
        "Dragon: " + Math.round(game.dragonLife) +
        "<br/>" +
        "Player: " + Math.round(game.playerLife) +
        "<img src='img/red_dragon_by_sandara-d6hpycs.jpg'>");
    }
}


function startGame()
{
    //Initialisation du jeux
    initializeGame();

    //Execution du jeux
    gameLoop();

    //Fin du jeux
    showGameWinner();
}

startGame();