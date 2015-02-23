/***********************************************************************************/
/*********************************** CLASSE JEU ************************************/
/***********************************************************************************/

var Game = function ()
{
    this.difficulty = null;
    this.player = null;
    this.dragon = null;
    this.map = new Map();

    this.ui = {
        gameMap : new GameMap(this.map),
        gameState : new GameState(),
        gameOver : new GameOver(),
        messagePanel : new MessagePanel()
    };

};

Game.prototype.setState = function(state)
{
    switch (state)
    {
        case STATE_LAUNCH :
            this.launch();
            $(function () {
                $('#js-game-scene').hide();
                $('#js-ui-game-menu').show();
                $('#js-game-restart').hide();
            });

            break;
        case STATE_PLAY :
            this.play();
            $(function () {
                $('#js-ui-game-menu').slideUp(500);
                $('#js-game-scene').delay(500).fadeIn(1000);
                $('#js-ui-game-over').hide();
                $('#js-ui-game-map').show();
            });

            break;
        case STATE_FIGHT :
            this.fight();
            break;
        case  STATE_END :
            this.end();
            break;


    }
};

Game.prototype.play = function ()
{
    this.drawScene();
};

Game.prototype.drawScene = function ()
{
    this.ui.gameMap.refresh(this.player);
    this.ui.gameState.refresh(this.player, this.dragon);
};

Game.prototype.launch = function()
{
    $('#js-game-start').off("click").on("click", this.onClickGameStart.bind(this));
};


/*** GESTIONNAIRES D'EVENEMENTS DE LA CLASSE ***************************************/

Game.prototype.onClickGameStart = function ()
{
    var difficulty = $('input:radio[name=difficulty]:checked').val();
    var name = $('#player-nick-name').val();
    var playerClass = $('#player-class').val();

    this.start(difficulty, name, playerClass);
};

Game.prototype.start = function (difficulty, name, playerClass)
{
    this.difficulty = difficulty;
    this.player = new Player(difficulty, name, playerClass, 5, 7);
    this.setState(STATE_PLAY);
};

Game.prototype.play = function()
{
    this.drawScene();

    $(document).on("keyup", this.onKeyUpGamePlay.bind(this));
};

Game.prototype.onKeyUpGamePlay = function(event)
{

    switch(event.keyCode)
    {
        case KEY_DOWN_ARROW :
            this.player.tryMoveTo(this.map, 0, 1);
            break;
        case KEY_UP_ARROW :
            this.player.tryMoveTo(this.map, 0, -1);
            break;
        case KEY_LEFT_ARROW :
            this.player.tryMoveTo(this.map, -1, 0);
            break;
        case KEY_RIGHT_ARROW :
            this.player.tryMoveTo(this.map, 1, 0);
            break;
        default :
            break;
    }

    if(this.map.getBlockAt(this.player.x,this.player.y) == MAP_TREASURE)
    {
        this.player.getTreasure(this.difficulty, this.ui.messagePanel);
        this.map.removeBlockAt(this.player.x, this.player.y);
    }

    if(this.map.getBlockAt(this.player.x,this.player.y) == MAP_DRAGON)
    {
        this.setState(STATE_FIGHT);
    }
    if(this.map.getBlockAt(this.player.x, this.player.y) == MAP_HEAL)
    {
        this.player.hp += 50;
        this.ui.messagePanel.add("Vous avez recupérer 50 HP");
        this.map.removeBlockAt(this.player.x, this.player.y);
    }


    this.drawScene();

};

Game.prototype.onKeyUpGameFight = function (event) {
    switch (event.keyCode)
    {
        case KEY_F :
            Array.prototype.shuffle = function() {
                this.sort(function() { return 0.5 - Math.random() })
            };

            var tableau = [1,2];
            tableau.shuffle();
            if(tableau[0] == 1)
            {
                this.player.attack(this.dragon, this.ui.messagePanel);
            }
            else
            {
                this.dragon.attack(this.player, this.ui.messagePanel);
            }
            break;
    }
    if(this.dragon.isDead() || this.player.isDead())
    {
        this.setState(STATE_END);
    }
    this.drawScene();
};

Game.prototype.end = function () {

    $(document).off("keyup");

    $(function()
    {
        $('#js-ui-game-map').delay(500).fadeOut(1000);
        $('#js-ui-game-over').fadeIn(500);
    });

    this.ui.messagePanel.clear();

    this.ui.gameOver.imgDisplayWinner(this.dragon.isDead());
    this.ui.gameOver.textDisplay(this.dragon.isDead());
    $(function () {
        $('#js-game-restart').show();
    });

};

Game.prototype.fight = function () {
    this.dragon = new Dragon(this.difficulty);
    Array.prototype.shuffle = function() {
        this.sort(function() { return 0.5 - Math.random() })
    };

    var tableau = [1,2];
    tableau.shuffle();
    if(tableau[0] == 1)
    {
        $(document).off("keyup");
        this.ui.messagePanel.add("Alerte Dragon ! Tu peux pas fuir !");

    }
    else
    {
        this.ui.messagePanel.add("Alerte Dragon ! Tu peux fuir dégage !");
    }

    $(document).on("keyup", this.onKeyUpGameFight.bind(this));
    this.drawScene();
};
