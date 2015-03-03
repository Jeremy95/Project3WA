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
    $('.readMore').on('click', searchArticle);
    $('.update').on('click', searchUpdate);
});

function searchUpdate()
{
    var config =
    {
        url: "updatepost.php?id=" + $(this).attr('id')
    };
    $.ajax(config).done(displayOnUpdate).fail();
}


function displayOnUpdate(data)
{
    var dataJson = $.parseJSON(data);
    $('#edit-basic-information2').fadeIn(1000);

    $('#edit-basic-information-container2').html(
        '<div class="blogpost clearfix">' +
        '<div class="panel panel-default">' +
        '<div class="panel-body narrow">' +
        '<form action="updatepost.php" method="post" id="formUpdate" enctype="multipart/form-data">' +
        '<label for="title">Titre</label>'+
        '<input id="title" name="title" type="text" value="' + dataJson["title"] + '"/>' +
        '<input type="hidden" id="articleId" name="articleId" value="' + dataJson["id"] + '"/>' +
        '<p id="tags">' +
        '</p>' +
        '<p></p>' +
        '<hr>' +
        '<ul class="slides" id="slides2">' +
        '</ul>' +
        '<input type="file" name="image[]" multiple/>' +
        '<label for="title"></label>' +
        '<textarea id="contentArticle" type="text" name="contentArticle" cols="50" rows="3">'+ dataJson["content_article"] +'</textarea>' +
        '<br/>' +
        '<input type="submit" value="Update" />' +
        '</form>' +
        '</div>' +
        '</div>' +
        '</div>'
    );

    if(dataJson['image'].length > 0)
    {
        for (var i = 0; i < dataJson["image"].length; i++)
        {
            $('#slides2').append('<li>' +
            '<img width="510" src="'+ dataJson["image"][i]["url"] +'">' +
            '</li>');
        }
    }

    if(dataJson['tags'].length > 0)
    {
        for (var x = 0; x < dataJson["tags"].length; x++)
        {
            $('#tags').append(
                '<span class="btn btn-default btn-xs">' +
                '<span class="glyphicon glyphicon-tag"></span> ' +
                '<input name="tags[]" type="text" value="' + dataJson["tags"][x]["content_tag"] + '"/>' +
                '<input type="hidden" name="idTag[]" value="' + dataJson["tags"][x]["id"] + '"/>' +
                '</span>'
            );
        }
    }

    $('#edit-basic-information2').on("click", function(e)
    {
        $('#edit-basic-information2').hide();

    });

    $('#edit-basic-information-container2').on("click", function(e)
    {
        e.stopPropagation();

    });



}

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
    var dataJson = $.parseJSON(data);
    $('#edit-basic-information').fadeIn(1000);

    $('#edit-basic-information-container').html(
        '<div class="blogpost clearfix">' +
        '<div class="panel panel-default">' +
        '<div class="panel-body narrow">' +
        '<h2>'+
        '<a href="post.php?id="'+ dataJson["id"] + '>' + dataJson["title"] +
        '</a></h2>' +
        '<hr>' +
        '<p class="post-header">'+
        '<span class="glyphicon glyphicon-user"></span>' +
        ' ' + dataJson['username'] + ' ' +
        '<span class="glyphicon glyphicon-time"></span>' +
        ' ' + dataJson['date_article'] + '<br>' +
        '</p><p id="tags">' +
        '</p>' +
        '<p></p>' +
        '<hr>' +
        '<div class="flexslider">' +
        '<ul class="slides" id="slides">' +
        '</ul>' +
        '</div>' +
        '<p>' + dataJson["content_article"] + '</p>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '<div class="row well">' +
        '<blockquote>' +
        '<h4>Ecrivez un commentaire...</h4>' +
        '<form action="" method="post" id="addComment">' +
        '<textarea name="content_comment" id="content_comment" cols="50" rows="3">' +
        '</textarea>' +
        '<input type="hidden" id="IdUser" name="IdUser" value="' + dataJson["id_user"] + '"/>' +
        '<input type="hidden" id ="articleId" name="articleId" value="' + dataJson["id"] + '"/>' +
        '<input type="submit" value="Envoyez"/>' +
        '</form>' +
        '</blockquote>' +
        '</div>' +
        '<div>' +
        '<p class="alert-danger">' +
        '</p>' +
        '</div>' +
        '<div id="row" class="row well">' +
        '</div>'
    );

    if(dataJson['image'].length > 0)
    {
        for (var i = 0; i < dataJson["image"].length; i++)
        {
            $('#slides').append('<li>' +
            '<img src="'+ dataJson["image"][i]["url"] +'">' +
            '</li>');
        }
    }

    if(dataJson['commentary'].length > 0)
    {
        for (var y = 0; y < dataJson["commentary"].length; y++)
        {
            $('#row').append(
                '<blockquote>' +
                '<p>' +
                dataJson["commentary"][y]["content_comment"] +
                '</p>' +
                '<footer>' +
                '<span class="glyphicon glyphicon-user"></span>' +
                ' ' + dataJson["commentary"][y]["username"] + ' ' +
                '<span class="glyphicon glyphicon-time"></span>' +
                ' ' + dataJson["commentary"][y]["date_comment"] +
                '</footer>' +
                '</blockquote>'
            );
        }
    }
    if(dataJson['tags'].length > 0)
    {
        for (var x = 0; x < dataJson["tags"].length; x++)
        {
            $('#tags').append(
                '<a href="">' +
                '<span class="btn btn-default btn-xs">' +
                '<span class="glyphicon glyphicon-tag"></span> ' +
                dataJson["tags"][x]["content_tag"] +
                '</span>' +
                '</a>'
            );
        }
    }


    $('.flexslider').flexslider(
        {
            slideshowSpeed: 4000,
            directionNav: false,
            controlNav: false
        }
    );

    $('#edit-basic-information').on("click", function(e)
    {
        $('#edit-basic-information').hide();
        window.location = "post.php";

    });

    $('#edit-basic-information-container').on("click", function(e)
    {
        e.stopPropagation();

    });


    $('#addComment').on("submit", addComment);


}

function addComment(event)
{
    event.preventDefault();

    var postValues =
    {
        content_comment : $('#content_comment').val(),
        IdUser : $('#IdUser').val(),
        articleId : $('#articleId').val()
    };

    $('.alert-danger').hide();

    if(postValues.content_comment == "")
    {
        $('.alert-danger').html("Veuillez remplir le champ avant d'envoyé");
    }
    else
    {
        var config =
        {
            url: "post.php",
            type: "POST",
            data: postValues
        };

        $.ajax(config).done(addCommentSuccess);
    }
}

function addCommentSuccess(data)
{
    var dataJson = $.parseJSON(data);
    $('#content_comment').val('');
    $('#row').prepend(
        '<blockquote>' +
        '<p>' +
        dataJson["content_comment"] +
        '</p>' +
        '<footer>' +
        '<span class="glyphicon glyphicon-user"></span>' +
        ' ' + dataJson["username"] + ' ' +
        '<span class="glyphicon glyphicon-time"></span>' +
        ' ' + dataJson["date_comment"] +
        '</footer>' +
        '</blockquote>'
    );



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



