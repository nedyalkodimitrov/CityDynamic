window.onload = function(){
    document.getElementById("cashPaymentButton").click();
}

$('#cashPaymentButton').on('click', function () {
    document.getElementById("cashPaymentButton").clicked = true;

    var delivery = parseFloat($('#delPrice').text());

    $('#totalPrice').html(getPrice() + delivery);
    addSpecificDeliveryPrice();
});

$('#onlinePaymentButton').on('click', function (){
    document.getElementById("cashPaymentButton").clicked = false;


    $('#onlineDelPrice').html($('#onlineDelPrice').text());
    var delivery = parseFloat($('#onlineDelPrice').text());
    $('#onlineTotalPrice').html(getPrice() + delivery);
    addSpecificDeliveryPrice();

});


function addSpecificDeliveryPrice(){
    var deliveryPrice = parseFloat($('#delPrice').text());;

    var total = getPrice() + deliveryPrice;
    setDeliveryPrices(total);
}

function setDeliveryPrices(total){

    if(document.getElementById("cashPaymentButton").clicked == true){
        $('#productPriceId').attr("value", total);
        $('#totalPrice').text(total);
    }else{
        $('#onlineProductPriceId').attr("value", total);
        $('#onlineTotalPrice').text(total);
    }

}

function getPrice(){
    return parseFloat($('#priceOfProduct').text());
}





