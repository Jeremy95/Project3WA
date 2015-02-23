/**
 * Created by wap19 on 23/02/15.
 */
/**
 * Created by wap19 on 20/02/15.
 */
$(function () {
    $('#addUser').on("submit", addUser);
});

function addUser(event)
{
    event.preventDefault();

    var postValues =
    {
        "email" : $('#email').val(),
        "pwd"   : $('#pwd').val()
    };

    $('.alert').hide();

    if(postValues.email == "")
    {
        $('#emailGroup').append('<div class="alert alert-danger" role="alert">Veuillez indiquez votre email</div>');
    }
    else if(postValues.pwd == "")
    {
        $('#pwdGroup').append('<div class="alert alert-danger" role="alert">Veuillez indiquez un mot de passe</div>');
    }
    else
    {
        var config =
        {
            url: "register.php",
            type: "POST",
            data: postValues
        };

        $.ajax(config).done(addSuccess);
    }
}

function addSuccess(data)
{
    var elem = $('#queryResult');

    if(data == "ok")
    {
        elem.html('Félicitations vous êtes maintenant inscrit !');
    }
    else
        elem.html('Echec ajout !');

}

