/***********************************************************************************/
/*********************************** CLASSE DRAGON *********************************/
/***********************************************************************************/

var Dragon = function (difficulty) {

    var startHp;

    switch (difficulty)
    {
        case LEVEL_EASY :
            startHp = getRandomInteger(150, 200);
            break;
        case LEVEL_NORMAL :
            startHp = getRandomInteger(200, 250);
            break;
        case LEVEL_HARD :
            startHp = getRandomInteger(230, 270);
            break;
    }
    this.hp = startHp;

};

Dragon.prototype.attack = function (player, messagePanel) {

    var damage;
    damage = Math.round(getRandomInteger(40, 50)/player.armorRatio);
    player.takeHp(damage);

    messagePanel.add("Le joueur a subi " + damage + " de dégâts");
};

Dragon.prototype.takeHp = function (damage) {

    this.hp -= damage;
};

Dragon.prototype.isDead = function () {

    return bool = this.hp <= 0;
};