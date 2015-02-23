/***********************************************************************************/
/************************** CLASSE AFFICHANT L'ECRAN DE FIN DU JEU *****************/
/***********************************************************************************/

var GameOver = function () {

    this.domObj = $('#js-ui-game-over').find('p');
};

GameOver.prototype.imgDisplayWinner = function (isDragonDead) {

    var src = isDragonDead ? "images/chevalier.jpg" : "images/dragon.jpg";
    $('#js-ui-game-over').find('img').attr("src", src);
};

GameOver.prototype.textDisplay = function (isDragonDead) {

    this.domObj = isDragonDead ? this.domObj.html("Vous avez gagné") : this.domObj.html("Vous avez perdu");
};