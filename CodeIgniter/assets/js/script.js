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

    $('#pattern').on('keyup', searchProduct);
});

function searchProduct()
{
    console.log("salut");
    var pattern = $(this).val();

    var config =
    {
        url : BASE_URL + "/user/search/" + pattern
    };
    $.ajax(config).done(displayProduct).fail();
}

function displayProduct(data)
{
    try
    {
        var dataJSON = $.parseJSON(data);
    }
    catch (e)
    {
        var dataJSON = [];
    }


    $('#resultSearch').empty();

    for (var i = 0; i < dataJSON.length; i++)
    {
        $('#resultSearch').append(
            '<div class="col-sm-4 display-overlay">' +
            '<div class="product-image-wrapper">' +
            '<div class="single-products">' +
            '<div class="productinfo text-center">' +
            '<div class="product-overlay">' +
            '<div class="overlay-content">' +
            '<h2>'
            + dataJSON[i]["prix_products"] + '€' +
            '</h2>' +
            '<p>'
            + dataJSON[i]["name_products"] +
            '</p>' +
            '<a class="btn btn-default add-to-cart" href="#">' +
            '<i class="fa fa-shopping-cart"></i>Add to cart</a>' +
            '</div>' +
            '</div>' +
            '<img alt="" src="' + BASE_URL.replace("index.php", "") + dataJSON[i]["url_images"] + '">' +
            '<h2>'
            + dataJSON[i]["prix_products"] + '€'+
            '</h2>' +
            '<p>'
            + dataJSON[i]["name_products"] +
            '</p>' +
            '<p>'
            + dataJSON[i]["description_products"] +
            '</p>' +
            '<a class="btn btn-default add-to-cart" href="' + BASE_URL + "/user/addCart/" + dataJSON[i]["id_products"] + '">' +
            '<i class="fa fa-shopping-cart"></i>Add to cart</a>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>'
        );
    }

}


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
