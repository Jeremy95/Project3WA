/***********************************************************************************/
/***************************** CLASSE PANNEAU DE MESSAGES **************************/
/***********************************************************************************/

var MessagePanel = function()
{
    this.domObject = $("#js-ui-message-panel").find("ul");
};


MessagePanel.prototype.add = function(content, category)
{

    // ajouter au li une classe (ui-message-xxxx), xxx étant la catégorie de message
    // exemple : ui-message-important, ui-message-info, ui-message-normal
    if (category == undefined)
    {
        category = "info";
    }
    var elem = $("<li>").html(content).addClass("ui-message"+category).hide();
    this.domObject.append(elem);
    elem.fadeIn();

};

MessagePanel.prototype.clear = function () {

    this.domObject.empty();
};