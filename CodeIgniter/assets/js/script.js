/**
 * Created by wap19 on 04/03/15.
 */

const BASE_URL = "/Project3WA/CodeIgniter/index.php";

$(function(){
    $('#tableProduct').fadeIn(1000);
    /*$('#addProduct').on("submit", addProduct);*/
    $('.flexslider').flexslider(
        {
            slideshowSpeed: 4000,
            directionNav: false,
            controlNav: false
        }
    );
    $('.display-overlay').on("mouseenter", function(){
        $('.product-overlay', $(this)).slideDown(500);
    });
    $('.display-overlay').on("mouseleave", function(){
        $('.product-overlay', $(this)).slideUp(500);
    });
});

/*function addProduct(event)
{
    event.preventDefault();

    var postValues =
    {
        name : $('#name').val(),
        description : $('#description').val(),
        price : $('#price').val()
    };

    $('.alert-danger').hide();

    var config =
    {
        url: BASE_URL + "/product/add",
        type: "POST",
        data: postValues
    };

    $.ajax(config).done(displayProduct);
}

function displayProduct(data)
{
    var dataJson = $.parseJSON(data);
    $('#content_comment').val('');
    $('#tableProduct tbody').prepend(
        '<tr>' +
        '<td>' +
        dataJson["name_products"] +
        '</td>' +
        '<td>' +
        ' ' + dataJson["description_products"] + ' ' +
        '</td>' +
        ' ' + dataJson["prix_products"] +
        '</td>' +
        '</tr>'
    );
}*/
