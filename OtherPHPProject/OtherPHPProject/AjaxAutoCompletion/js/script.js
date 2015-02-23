/**
 * Created by wap19 on 20/02/15.
 */
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

function search()
{
    var pattern = $(this).val();
    var config =
    {
        url: "search.php?pattern=" + pattern
    };
    $.ajax(config).done(displayResult).fail();
}

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
        elem.html('<option value="">Entrez un code postal</option>');
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
        select.prepend("<option value="+ data[i]['ville_id'] +">" + data[i]['ville_nom'] + "</option>")
    }

    if(data == "")
    {
        var city = $('#city_id');
        city.empty();
        city.html('<option value="">Le code postal que vous avez rentré n\'existe pas !</option>');
        city.attr("disabled", "disabled");
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
    }
    else if(postValues.birthday == "")
    {
        $('#birthdayGroup').append('<div class="alert alert-danger" role="alert">Veuillez indiquez votre date de naissance</div>');
    }
    else if(postValues.city_id == "" || $('postalCode').val() == "")
    {
        $('#postalCodeGroup').append('<div class="alert alert-danger" role="alert">Veuillez indiquez votre code postal</div>');
    }
    else
    {
        var config =
        {
            url: "addStudent.php",
            type: "POST",
            data: postValues
        };

        $.ajax(config).done(addSuccess);
    }
}

function addSuccess(data)
{
    var elem = $('#queryResult');
    var cityElem = $('#city_id');

    if(data == "ok")
    {
        $('#name').val('');
        $('#birthday').val('');
        $('#postalCode').val('');
        cityElem.html('<option value="">Entrez un code postal</option>');
        cityElem.attr('disabled', 'disabled');

        var config =
        {
            url : "displayStudent.php?id=" + 0
        };

        $.ajax(config).done(displayStudent);
    }
    else
        elem.html('Echec ajout ajax !');

}

function displayStudent(data)
{
    var elem = $('#queryResult');
    for(var i = 0; i < data.length; i++)
    {
        elem.append("<tr>" +
        "<td>" + data[i]['name'] + "</td>" +
        "<td>" + data[i]['birthday'] + "</td>" +
        "</tr>");
    }
}
