/***********************************************************************************/
/********************************** CLASSE JOUEUR **********************************/
/***********************************************************************************/

var Player = function (difficulty, name, playerClass, x, y) {

    var startHp;

    switch (difficulty)
    {
        case LEVEL_EASY :
            switch (playerClass)
            {
                case CLASS_PALADIN :
                    startHp = getRandomInteger(200, 250);
                    break;
                case CLASS_THIEF :
                    startHp = getRandomInteger(250, 300);
                    break;
                case CLASS_WIZARD :
                    startHp = getRandomInteger(200, 250);
                    break;
            }
            break;
        case LEVEL_NORMAL :
            switch (playerClass)
            {
                case CLASS_PALADIN :
                    startHp = getRandomInteger(200, 250);
                    break;
                case CLASS_THIEF :
                    startHp = getRandomInteger(200, 250);
                    break;
                case CLASS_WIZARD :
                    startHp = getRandomInteger(150, 200);
                    break;
            }
            break;
        case LEVEL_HARD :
            switch (playerClass)
            {
                case CLASS_PALADIN :
                    startHp = getRandomInteger(150, 200);
                    break;
                case CLASS_THIEF :
                    startHp = getRandomInteger(200, 250);
                    break;
                case CLASS_WIZARD :
                    startHp = getRandomInteger(150, 175);
                    break;
            }
            break;

    }

    if (name == "")
        this.name = "Anonymous";
    else
        this.name = name;

    this.x = x;
    this.y = y;

    this.armor = "None";
    this.armorRatio = 1;
    this.class = playerClass;
    this.hp = startHp;
    this.weapon = "None";
    this.weaponRatio = 1;
    this.image = new Image();
    this.image.src = 'images/Dark_Knight.png';
    this.imageT = new Image();
    this.imageT.src = 'images/tresor.jpg';

};

Player.prototype.tryMoveTo = function(map, dx, dy)
{
    var x = this.x + dx;
    var y = this.y +dy;

    // map.isBlockEmptyAt sera utile

    // vérifications :
    // - est-ce que je ne sors pas de la carte
    // - est-ce que la case de la carte est libre


    if(x < 0 || y < 0 ) {
        return false;
    }

    if(x >= map.getSize() || y >= map.getSize()){
        return false;
    }


    if(map.isBlockEmpty(x, y))
    {
        this.x = x;
        this.y = y;
    }


    // déplacer le joueur


};

Player.prototype.takeHp = function (damage) {

    this.hp -= damage;
};

Player.prototype.isDead = function () {

    return bool = this.hp <= 0;
};

Player.prototype.attack = function (dragon, messagePanel) {
    var damage;

    damage = getRandomInteger(20, 30);

    damage = Math.round(damage * this.weaponRatio);
    dragon.takeHp(damage);

    messagePanel.add("Le Dragon a subi " + damage + " de dégâts");
};

Player.prototype.getTreasure = function (difficulty, messagePanel)
{
  switch (difficulty)
  {
      case LEVEL_EASY :
          this.armor = "armure solaire";
          this.armorRatio = getRandomInteger(1.1, 1.3);
          this.weapon = "epee Excalibur";
          this.weaponRatio = getRandomInteger(1.1, 1.3);
          messagePanel.add("Vous avez obtenu l'" + this.armor + " et l'" + this.weapon);
          break;
      case LEVEL_NORMAL :
          this.armor = "Armure solaire";
          this.armorRatio = getRandomInteger(1.2, 1.4);
          this.weapon = "Epee Excalibur";
          this.weaponRatio = getRandomInteger(1.2, 1.4);
          messagePanel.add("Vous avez obtenu l'" + this.armor + " et l'" + this.weapon);
          break;
      case LEVEL_HARD :
          this.armor = "Armure solaire";
          this.armorRatio = getRandomInteger(1.3, 1.5);
          this.weapon = "Epee Excalibur";
          this.weaponRatio = getRandomInteger(1.3, 1.5);
          messagePanel.add("Vous avez obtenu l'" + this.armor + " et l'" + this.weapon);
          break;

  }
};