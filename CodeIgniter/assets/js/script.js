/**
 * Created by wap19 on 04/03/15.
 */

const BASE_URL = "/Project3WA/CodeIgniter/index.php";
const ASSETS_URL = "/Project3WA/CodeIgniter/";

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
    $('#content').fadeIn(1000);
    $('#birthdate').datepicker({
        dateFormat : "yy-mm-dd",
        changeYear : true,
        yearRAnge : "-50:0",
        changeMonth : true
    });
    $('#addComment').on("submit", addComment);
    /*$('#addInfoUser').on("submit", verifForm);*/
    $.ui.autocomplete.prototype._renderItem = function( ul, item ) {
        return $( "<li>" )
            .attr( "data-value", item.value )
            .append("<img style='width:30px; height: 30px' src='"+ ASSETS_URL + item.url_images +"'>")
            .append(item.label)
            .appendTo( ul );
    };
    $('#pattern').autocomplete({
        source: BASE_URL + "/user/search",
        select: function(event, ui){

            window.location = BASE_URL + "/product/detail/" + ui.item.id_products;
        }
    });

    $('.display-overlay').on("mouseenter", function(){
        $('.product-overlay', $(this)).slideDown(500);
    });
    $('.display-overlay').on("mouseleave", function(){
        $('.product-overlay', $(this)).slideUp(500);
    });

    calculTotal();
    $('.quantity').on('keyup', function ()
    {
        if($(this).val() != "")
        {
            var id = this.dataset.id;
            var res;
            var priceCartItem = parseInt($('.priceCartItem[data-id='+ id +'] strong').html());
            res = $(this).val() * priceCartItem;
            $('.totalCartItem[data-id='+ id +'] strong').html(res + " €");
        }
        else
        {
            $('.totalCartItem[data-id='+ id +'] strong').html(parseInt($('.priceCartItem[data-id='+ id +'] strong').html()) + " €");
        }

        calculTotal();

    });
    $('.quantity').on('click', function ()
    {
        if($(this).val() != "")
        {
            var id = this.dataset.id;
            var res;
            var priceCartItem = parseInt($('.priceCartItem[data-id='+ id +'] strong').html());
            res = $(this).val() * priceCartItem;
            $('.totalCartItem[data-id='+ id +'] strong').html(res + " €");
        }
        else
        {
            $('.totalCartItem[data-id='+ id +'] strong').html(parseInt($('.priceCartItem[data-id='+ id +'] strong').html()) + " €");
        }

        calculTotal();

    });
});

/*function verifForm(event)
{
    event.preventDefault();

    if($('#name').val() == "" || $('#firstName').val() == "" || $('#birthdate').val() == "" || $('#address').val() == "")
    {
        $('#infoCustomerError').fadeIn(500);
        $('#infoCustomerError').html("You must fill in all th fields");
    }
    else
    {
        var config =
        {
            url: BASE_URL + "/product/precommand"
        };

        $.ajax(config).done();
    }


}*/

function calculTotal()
{
    var data = [];
    $('.productItem').each(function()
    {
        var quantity = $('.quantity', $(this)).val();
        var price = parseInt($('.priceCartItem strong', $(this)).html());
        data.push({
            quantity : quantity,
            price : price
        });

    });

    $('#data').val(JSON.stringify(data));


    var result = 0;
    $('.totalCartItem strong').each(function()
    {
        result += parseInt($(this).html());

    });
    $('#totalCart strong').html(result + " €");
}


function addComment(event)
{
    event.preventDefault();

    var postValues =
    {
        content_comment : $('#content_comment').val(),
        IdUser : $('#IdUser').val(),
        productId : $('#productId').val()
    };

    $('.alert-danger').hide();

    if(postValues.content_comment.trim() == "")
    {
        $('.alert-danger').fadeIn(500);
        $('.alert-danger').html("Veuillez remplir le champ avant d'envoyé");
    }
    else
    {
        var config =
        {
            url: BASE_URL + "/product/addComment",
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
    $('#comments').prepend(
        '<div id="row" class="row well">' +
        '<blockquote>' +
        '<p>' +
        dataJson["content_comments"] +
        '</p>' +
        '<footer>' +
        '<span class="glyphicon glyphicon-user"></span>' +
        ' ' + dataJson["name_user"] + ' ' +
        '<span class="glyphicon glyphicon-time"></span>' +
        ' ' + dataJson["date_comments"] +
        '</footer>' +
        '</blockquote>' +
        '</div>'
    );
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
