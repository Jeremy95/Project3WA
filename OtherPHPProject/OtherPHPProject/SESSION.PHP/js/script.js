/**
 * Created by wap19 on 19/02/15.
 */
var lastMessage = 0;

$(function () {
    $('#message').delay(2000).fadeOut();
    setInterval(checkNewMessages, 500);
    $('#formAjout').on('submit', sendMessage);
});

function checkNewMessages()
{
    var config =
    {
        url: "newMessage.php?after=" + lastMessage
    };
    $.ajax(config).done(showNewMessages).fail(ajaxError);
}

function showNewMessages(data)
{
    var tableau = $('.tableauChatMessage');

    for(var i = 0; i < data.length; i++)
    {
        tableau.prepend("<tr><td>"+
        data[i]['name']
        + " " + data[i]['date']
        + " " + data[i]['content']
        + " "
        + "<a href='#' class='delete' data-id =" + data[i]["id"] + ">supprimer</a>"
        + "</td></tr>");

        lastMessage = data[i]["id"];
    }

    $('.delete').off('click').on('click', deleteMessage);
}

function ajaxError()
{
    console.log("Erreur Ajax");
}

function sendMessage(event)
{
    event.preventDefault();
    var postValues =
    {
        "content" : $('#name').val()
    };
    var config =
    {
        url: "add.php",
        type: "POST",
        data: postValues
    };

    $.ajax(config).done(sendMessageOK).fail(ajaxError)
}

function sendMessageOK()
{
    $('#name').val("");
}

function deleteMessage(event)
{
    event.preventDefault();

    var config =
    {
        url : "delete.php?id_message=" + this.dataset.id
    };

    $.ajax(config).done().fail();

    $(this).parents("tr").remove();

    return false;
}