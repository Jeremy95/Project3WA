/************************************************************************************/
/********************************** GESTIONNAIRES D'EVENEMENTS **********************/
/************************************************************************************/

function onGameStart()
{
    var dragonSlayer = new Game();
    dragonSlayer.setState(STATE_LAUNCH);
}


/************************************************************************************/
/********************************** CODE PRINCIPAL **********************************/
/************************************************************************************/

$(function() {
    $(document).on("game-start", onGameStart);
    $('#js-game-restart').on("click", onGameStart);
    $('#js-ui-game-title').delay(500).fadeOut(1000, function () {
        $('#js-ui-game-menu').fadeIn(500);
        $.event.trigger("game-start");
    });
});
