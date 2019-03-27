$(document).ready(function(){
    let productIds = [];
    let cartItemCounter = $('.cart-counter');
    $('.add-to-cart').click(function(){
        productIds.push($(this).attr('data'));

        console.log(productIds);
        cartItemCounter.text(

            productIds.length

        );
        console.log('<php print_r($savedCartItems); ?>')
    });
});