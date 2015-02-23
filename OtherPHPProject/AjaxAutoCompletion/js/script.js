/**
 * Created by wap19 on 20/02/15.
 */
function search()
{
    var pattern = $(this).val();
    var config =
    {
        url: "search.php?pattern=" + pattern
    };
    $.ajax(config).done(displayResult).fail();
}

$(function () {
    $("#searchInput").on("keyup", search);
    $('#postalCode').on("keyup", searchCityName);
    $('#addStudent').on("submit", addUser);
    $('#birthday').datepicker({
        dateFormat : "yy-mm-dd",
        changeYear : true,
        yearRAnge : "-50:0",
        changeMonth : true
    });
});

function displayResult(data)
{
    var table = $('#display');
    table.empty();
    table.html("<tr>" +
    "<th>Name</th>" +
    "<th>Code postal</th>" +
    "<th>Population</th>" +
    "<th>Surface</th>" +
    "</tr>");
    for(var i = 0; i < data.length; i++)
    {
        table.append("<tr>" +
        "<td>" + data[i]['name'] + "</td>" +
        "<td class='codePostal'>" + data[i]['postal_code'].replace('-', ' ', 'g') + "</td>" +
        "<td>" + data[i]['population'] + "</td>" +
        "<td>" + data[i]['surface'] + "</td>" +
        "</tr>");
    }
}

function searchCityName()
{
    var pattern = $(this).val();
    var config =
    {
        url: "searchCityName.php?postal_code=" + pattern
    };
    if(pattern == "")
    {
        var elem = $('#city_id');
        elem.empty();
        elem.html('<option>Entrez un code postal</option>');
        elem.attr("disabled", "disabled");
    }
    else
    {
        $.ajax(config).done(displayCityName).fail();
    }

}


function displayCityName(data)
{
    var select = $('#city_id');
    select.removeAttr("disabled");
    select.empty();
    for(var i = 0; i < data.length; i++)
    {
        select.prepend("<option value="+ data[i]['id'] +">" + data[i]['name'] + "</option>")
    }
}

function addUser(event)
{
    event.preventDefault();

    var postValues =
    {
        "name"     : $('#name').val(),
        "birthday" : $('#birthday').val(),
        "city_id"  : $('#city_id').val()
    };

    $('.alert').hide();


    if(postValues.name == "")
    {
        $('#nameGroup').append('<div class="alert alert-danger" role="alert">Veuillez indiquez votre nom</div>');
        return false;
    }
    else if(postValues.birthday == "")
    {
        $('#birthdayGroup').append('<div class="alert alert-danger" role="alert">Veuillez indiquez votre date de naissance</div>');
        return false;
    }
    else if(postValues.city_id == "")
    {
        $('#postalCodeGroup').append('<div class="alert alert-danger" role="alert">Veuillez indiquez votre code postal</div>');
        return false;
    }


    var config =
    {
        url: "addStudent.php",
        type: "POST",
        data: postValues
    };

    $.ajax(config).done(addSuccess);
}

function addSuccess(data)
{
    var elem = $('#queryResult');

    if(data == "ok")
        elem.html('Ajout réussi ajax !');
    else
        elem.html('Echec ajout ajax !');

    elem.delay(2000).fadeOut(1000);

}
