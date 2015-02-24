/**
 * Created by wap19 on 23/02/15.
 */
/**
 * Created by wap19 on 20/02/15.
 */
$(function () {
    $('#addUser').on("submit", addUser);
    $('#verifUser').on("submit", verifUser);
});

function addUser(event)
{
    event.preventDefault();

    var postValues =
    {
        "email" : $('#login').val(),
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
    if(data.contains("kjhgf"))
    {
        elem.html('Félicitations vous êtes maintenant inscrit !');
    }
    else
        elem.html('Echec ajout !');

}

function verifUser(event)
{
    event.preventDefault();
    var postValues =
    {
        "login" : $('#login').val(),
        "pwd"   : $('#pwd').val()
    };
    var login = postValues.email;

    var config =
    {
        url     : "login.php",
        type    : "POST",
        data    : postValues
    };
    $.ajax(config).done(function(data)
    {
        if(data.contains("ok"))
        {
            alert("Bienvenue ! " + login);
            window.location = "post.php";
        }
        else if(data.contains("Votre login ou votre mot de passe est incorrect"))
        {
            $('.alert').html("Votre login ou votre mot de passe est incorrect");
        }

    });
}

