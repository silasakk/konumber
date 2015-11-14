var app = angular.module('myApp', []);


app.controller('cartController', function($scope) {
    $scope.products = {};

    $scope.load_cart =function(){
        jQuery.ajax({
            url: ajax_object.ajaxUrl,
            type: 'post',
            dataType: 'json',
            data: {'action': 'load_cart'},
            success: function(response) {

                $scope.products = response;
                $scope.$apply();
            }
        });
    }
    $scope.load_cart();


    $scope.removeCart = function(products,$index){



        jQuery.ajax({
            url: ajax_object.ajaxUrl,
            type: 'post',
            dataType: 'json',
            data: {'action': 'remove_cart' , 'item_code' : products.id},
            success: function(response) {
                $scope.products = response;
                $scope.$apply();
            }
        });
    };

});

//logout
jQuery("#user_logout").on('click',function(){
    jQuery.ajax({
        url: ajax_object.ajaxUrl,
        type: 'post',
        dataType: 'json',
        data: {'action': 'user_logout'},
        success: function(response) {

            window.location = ajax_object.siteUrl;

        }
    });
})

//add cart
jQuery('.add-to-cart').on('click', function () {

    var item_code = $(this).attr("data-item-code");
    var cart = jQuery('.sp-cart .fa-shopping-cart');
    var imgtodrag = jQuery(this).parent().parent().find(".img-feature-num").eq(0);

    ajax_add_cart(item_code,imgtodrag,cart);

});

//ajax add cart
function ajax_add_cart(item_code,imgtodrag,cart){

    jQuery.ajax({
        url: ajax_object.ajaxUrl,
        type: 'post',
        dataType: 'json',
        data: {'action': 'add_cart' , 'item_code' : item_code},
        success: function(response) {
            if(response.error){

                alert("คุณเลือกสินค้าชิ้นนี้แล้ว");
            }else{
                cart_animate(imgtodrag,cart);
            }

        }
    });


}


//cart animate
function cart_animate(imgtodrag,cart){

    var imgclone = imgtodrag.clone()
        .offset({
            top: imgtodrag.offset().top,
            left: imgtodrag.offset().left
        })
        .css({
            'opacity': '0.5',
            'position': 'absolute',
            'height': '150px',
            'width': '150px',
            'z-index': '999999'
        })
        .appendTo(jQuery('body'))
        .animate({
            'top': cart.offset().top + 10,
            'left': cart.offset().left + 10,
            'width': 75,
            'height': 75
        }, 1000 );



    imgclone.animate({
        'width': 0,
        'height': 0
    }, function () {
        jQuery(this).detach()
    });
}