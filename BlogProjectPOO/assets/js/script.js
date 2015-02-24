/**
 * Created by wap19 on 23/02/15.
 */
/**
 * Created by wap19 on 20/02/15.
 */
$(function () {
    $('#addUser').on("submit", addUser);
    $('#verifUser').on("submit", verifUser);
    $('#addArticle').on("submit", addArticle);
});

function addUser(event)
{
    event.preventDefault();

    var postValues =
    {
        "email" : $('#email').val(),
        "pwd"   : $('#pwd').val(),
        "name"  : $('#name').val()
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
    else if(postValues.name == "")
    {
        $('#nameGroup').append('<div class="alert alert-danger" role="alert">Veuillez indiquez un nom</div>');
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

        $('#divQueryResult').delay(1000).fadeOut(1000, function () {
            setTimeout(window.location = "index.php", 1000);
        });
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

    $('.alert').hide();

    if(postValues.login == "")
    {
        $('#loginGroup').append('<div class="alert alert-danger" role="alert">Veuillez indiquez un login</div>');
    }
    else if(postValues.pwd == "")
    {
        $('#pwdGroup').append('<div class="alert alert-danger" role="alert">Veuillez indiquez un mot de passe</div>');
    }
    else
    {
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
}

function addArticle(event)
{
    event.preventDefault();

    var postValues =
    {
        "content": $('#content').val(),
        "idUser" : $('#idUser').val(),
        "title"  : $('#title').val()
    };

    if(postValues.title == "")
    {
        $('#titleGroup').append('<div class="alert alert-danger" role="alert">Veuillez indiquez un titre</div>');
    }
    else if(postValues.content == "")
    {
        $('#contentGroup').append('<div class="alert alert-danger" role="alert">Veuillez écrire quelque chose</div>');
    }
    else
    {
        var config =
        {
            url: "createpost.php",
            type: "POST",
            data: postValues
        };

        $.ajax(config).done(function(data)
        {
            if(data.contains("koiwp"))
            {
                window.location = "post.php";
            }
            else
            {
                $('body').append("<div class='alert alert-danger' role='alert'>L'insertion de votre artcile a échoué</div>")
            }
        });
    }
}


