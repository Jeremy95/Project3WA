/***********************************************************************************/
/*************************** CLASSE AFFICHANT L'ETAT DU JEU ************************/
/***********************************************************************************/

var GameState = function ()
{
    this.domObject = $('#js-ui-game-state');
};

GameState.prototype.refresh = function (player, dragon)
{
    this.domObject.find("h3").html(player.name);
    if (dragon != null)
    {
        this.domObject.find('li:first-child').html("PV Dragon : "+dragon.hp).show();
    }
    else
    {
        this.domObject.find('li:first-child').hide();
    }
    this.domObject.find('li:nth-child(2)').html("PV joueur : " + player.hp);
    this.domObject.find('li:nth-child(3)').html("Classe : " + player.class);
    if(player.armor != "None")
    {
        this.domObject.find('li:nth-child(4)').html("Armure : " + player.armor).show();
    }
    else
    {
        this.domObject.find('li:nth-child(4)').hide();
    }
    if(player.weapon != "None")
    {
        this.domObject.find('li:nth-child(5)').html("Arme : " + player.weapon).show();
    }
    else
    {
        this.domObject.find('li:nth-child(5)').hide();
    }

};