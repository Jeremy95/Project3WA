/**
 * Created by wap19 on 06/02/15.
 */
/**
 * Created by wap19 on 28/01/15.
 */

/********* FONCTIONS *********/

function showForm()
{
    var form = $('#js-contact-form');
    if(form.hasClass('hide'))
    {
        form.fadeIn(1000);
        form.removeClass('hide');
    }
    else
    {
        form.fadeOut(1000);
        form.addClass('hide');
    }
    clearForm();
}

function showContactList()
{
    var currentList = loadDataFromLocalStorage("contactForm");
    var listAddress = $('#js-address-book');
    listAddress.empty();

    for (var i = 0; currentList != null && i < currentList.length; i++)
    {
        listAddress.append("<li data-index=" + i +"><a href='#'>" +
        currentList[i].firstName +
        " " +
        currentList[i].lastName + "</a></li>");
    }

    listAddress.find('li').on('click', onClickShowDetails);


}

function onClickShowDetails()
{

    var i = this.dataset.index;
    var currentList = loadDataFromLocalStorage("contactForm");
    var div = $('#js-contact-details div');
    div.html("<h2>" + currentList[i].title + " " + currentList[i].lastName + "</h2>" +
    "<h3>" + currentList[i].firstName + " " + "</h3>" +
    "<p class='fa fa-phone'>" + " " + currentList[i].phone + "</p>");

    $('#js-contact-details').slideDown(1000);

    var elemList = $('#js-address-book').find('li');

    for(var y = 0; y < elemList.length; y++)
    {
        if($(elemList[y]).hasClass("selected"))
        {
            $(elemList[y]).removeClass("selected");
        }
    }

    $(this).addClass("selected");

}

function onClickFormTraitement()
{
    var contact = createContact
    (
        $("#title").val(),
        $("#firstName").val(),
        $("#lastName").val(),
        $("#phone").val()
    );

    var currentList = loadDataFromLocalStorage("contactForm");

    if(currentList == null)
    {
        currentList = [];
    }

    currentList.push(contact);

    saveToLocalStorage("contactForm", currentList);

    showContactList();

    clearForm();

}

function saveToLocalStorage(key, value)
{
    var objContactToStringJson = JSON.stringify(value);
    localStorage.setItem(key, objContactToStringJson);
}

function loadDataFromLocalStorage(key)
{
    var objData;
    var jsonData = localStorage.getItem(key);
    objData = JSON.parse(jsonData);


    return objData;
}

function createContact(title, firstName, lastName, phone)
{
    var contact = {};
    contact.title = title;
    contact.firstName = firstName;
    contact.lastName = lastName;
    contact.phone = phone;

    return contact;
}

function clearAddressBook()
{
    localStorage.removeItem("contactForm");
    $("#js-contact-details div").empty();
    showContactList();
}

function clearForm()
{
    $("form")[0].reset();
}


function initEventHandler()
{
    showContactList();

    $('#js-contact-details').hide();

    $('#js-contact-form').hide();

    $("#js-add-contact").on("click", showForm);

    $("#js-save-contact").on("click", onClickFormTraitement);

    $("#js-show-list-contact").on("click", showContactList);

    $("#js-clear-address-book").on("click", clearAddressBook);

    $(".fa-times-circle").on("click", function ()
    {
        $("#js-contact-details").slideUp(1000);
    });
}

/********* CODE PRINCIPAL ********/

$(initEventHandler);
