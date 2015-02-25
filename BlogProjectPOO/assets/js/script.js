/**
 * Created by wap19 on 23/02/15.
 */
/**
 * Created by wap19 on 20/02/15.
 */
$(function () {
    $('#addUser').on("submit", addUser);
    $('#verifUser').on("submit", verifUser);
    /*$('#addArticle').on("submit", addArticle);*/
    $('.flexslider').flexslider(
        {
            slideshowSpeed: 4000,
            directionNav: false,
            controlNav: false
        }
    );
    $('#readMore').on('click', searchArticle)
});

function searchArticle()
{
    var pattern = $(this);
    var config =
    {
        url: "post.php?id=" + pattern.attr('id')
    };
    $.ajax(config).done(displaySingleArticle).fail();
}

function displaySingleArticle(data)
{
    $('').delay(500).fadeIn(500);
}


function addUser(event)
{
    event.preventDefault();

    var postValues =
    {
        email : $('#email').val(),
        pwd   : $('#pwd').val(),
        name  : $('#name').val()
    };

    $('.alert-danger').hide();

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

    if(data == "ok")
    {
        elem.html('Félicitations vous êtes maintenant inscrit !');

        $('#divQueryResult').delay(1000).fadeOut(1000, function () {
            setTimeout(window.location = "login.php", 1000);
        });
    }
    else
        elem.html('Echec ajout !');

}

function verifUser(event)
{
    event.preventDefault();

    var $this = $(this);

    var postValues =
    {
        login: $('#login').val(),
        pwd: $('#pwd').val()
    };

    $('.alert-danger').hide();

    if (postValues.login == "")
    {
        $('#loginGroup').append('<div class="alert alert-danger" role="alert">Veuillez indiquez un login</div>');
    }
    else if (postValues.pwd == "")
    {
        $('#pwdGroup').append('<div class="alert alert-danger" role="alert">Veuillez indiquez un mot de passe</div>');
    }
    else
    {
        var config =
        {
            data: postValues,
            url: "login.php",
            type: $this.attr('method')
        };
        $.ajax(config).done(function (data) {
            if (data == "ok") {
                window.location = "post.php";
            }
            else {
                $('#alert').html("Votre login ou votre mot de passe est incorrect");
                $('#alert').addClass("alert-danger");
            }
        });
    }
}

function addArticle(event)
{
    event.preventDefault();

    var postValues =
    {
        content: $('#content').val(),
        idUser : $('#idUser').val(),
        title  : $('#title').val()
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
            if(data == "ok")
            {
                window.location = "post.php";
            }
            else
            {
                $('body').append("<div class='alert alert-danger' role='alert'>L'insertion de votre article a échoué</div>")
            }
        });
    }
}



