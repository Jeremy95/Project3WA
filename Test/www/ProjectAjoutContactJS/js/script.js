/**
 * Created by wap19 on 28/01/15.
 */

/********* FONCTIONS *********/

function showForm()
{
    var elemDiv = document.getElementById("js-contact-form");

    elemDiv.classList.toggle("hide");
    clearForm();
}

function showContactList()
{
    var currentList = loadDataFromLocalStorage("contactForm");
    var list = document.getElementById("js-address-book");
    list.innerHTML = "";

    for (var i = 0; currentList != null && i < currentList.length; i++)
    {
        list.innerHTML += "<li data-index=" + i +"><a href='#'>" +
        currentList[i].firstName +
        " " +
        currentList[i].lastName + "</a></li>";
    }

    installMulitpleEventHandler("#js-address-book li", "click", onClickShowDetails);


}

function onClickShowDetails()
{

    var i = this.dataset.index;
    var currentList = loadDataFromLocalStorage("contactForm");
    var div = document.querySelector("#js-contact-details div");
    document.querySelector("#js-contact-details").classList.remove("hide");
    div.innerHTML = "<h2>" + currentList[i].title + " " + currentList[i].lastName + "</h2>" +
    "<h3>" + currentList[i].firstName + " " + "</h3>" +
    "<p class='fa fa-phone'>" + " " + currentList[i].phone + "</p>";

    var elemList = document.querySelectorAll("#js-address-book li");

    for(var y = 0; y < elemList.length; y++)
    {
        if(elemList[y].classList.contains("selected"))
        {
            elemList[y].classList.remove("selected");
        }
    }

    this.classList.add("selected");

}


function onClickFormTraitement()
{

    var contact = createContact
    (
        getFormFieldValue("#js-contact-form", "title"),
        getFormFieldValue("#js-contact-form", "firstName"),
        getFormFieldValue("#js-contact-form", "lastName"),
        getFormFieldValue("#js-contact-form", "phone")
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
    var aside = document.getElementById("js-contact-details");
    aside.innerHTML = "";
    showContactList();
}

function clearForm()
{
    var elem = document.querySelector("form");
    elem.reset();
}


function initEventHandler()
{
    showContactList();

    installEventHandler("#js-add-contact", "click", showForm);

    installEventHandler("#js-save-contact", "click", onClickFormTraitement);

    installEventHandler("#js-show-list-contact", "click", showContactList);

    installEventHandler("#js-clear-address-book", "click", clearAddressBook);

    installEventHandler(".fa-times-circle", "click", function ()
    {
        document.querySelector("#js-contact-details").classList.add("hide");
    });
}

/********* CODE PRINCIPAL ********/

document.addEventListener("DOMContentLoaded", initEventHandler);
