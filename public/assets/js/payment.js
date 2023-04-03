window.onload = function(){
    document.getElementById("cashPaymentButton").click();
    var total =  parseInt($('#priceOfProduct').text());
    var deliveryPricer = 3.99;
    total += deliveryPricer;
    $('#delPrice').text(deliveryPricer);
    $('#totalPrice').text(total);
    $('#productPriceId').attr("value", total);

}

$('#cashPaymentButton').on('click', function () {
    document.getElementById("cashPaymentButton").clicked = true;
    console.log(document.getElementById("cashPaymentButton").clicked)
    $('#countryLabel').html("");
    $('#countryId').attr("type","hidden");
    $("#onlineEcont").prop("checked", true);

    $('#onlineCountryLabel').html("");
    $('#onlineCountryId').attr("type","hidden");
    // $('#delPrice').html("");
    // $('#totalPrice').html("");
    // $('#productPriceId').html("");


    $('input[name="office"]').on('change', function() {
        var radioValue = $('input[name="office"]:checked').val();
        if(radioValue == "DHL"){

            $('#countryLabel').html("Country");
            $('#countryId').attr("type", "text");

        } else{

            $('#countryLabel').html("");
            $('#countryId').attr("type","hidden");

        }
        console.log(radioValue);
        addSpecificDeliveryPrice(radioValue);
    });
});

$('#onlinePaymentButton').on('click', function (){
    document.getElementById("cashPaymentButton").clicked = false;
    var delivery = 3.99;

    $("#econt").prop("checked", true);
    $('#countryLabel').html("");
    $('#countryId').attr("type","hidden");
    $('#onlineDelPrice').html(3.99);
    $('#onlineTotalPrice').html(parseInt($('#priceOfProduct').text()) + delivery);
    $('#onlineProductPriceId').html(parseInt($('#priceOfProduct').text()) + delivery);

    $('input[name="onlineOffice"]').on('change', function() {
        var radioValue = $('input[name="onlineOffice"]:checked').val();
        if(radioValue == "DHL"){

            $('#onlineCountryLabel').html("Country");
            $('#onlineCountryId').attr("type", "text");

        } else{

            $('#onlineCountryLabel').html("");
            $('#onlineCountryId').attr("type","hidden");

        }
        addSpecificDeliveryPrice(radioValue);
    });
});


function addSpecificDeliveryPrice(deliveryOffice){
    var price;
    var total =  parseInt($('#priceOfProduct').text());

    switch (deliveryOffice) {
        case "Econt":
            price = 3.99;
            setDeliveryPrices(total,price);
            break;

        case "Speedy":
            price = 3.99;
            setDeliveryPrices(total,price);
            break;

        case "DHL":
            price = 20.99;
            setDeliveryPrices(total,price);
            break;
    }
}

function setDeliveryPrices(total, deliveryPrice){
    total += deliveryPrice;

    if(document.getElementById("cashPaymentButton").clicked == true){
        $('#productPriceId').attr("value", total);
        $('#delPrice').text(deliveryPrice);
        $('#totalPrice').text(total);
    }else{
        $('#onlineProductPriceId').attr("value", total);
        $('#onlineDelPrice').text(deliveryPrice);
        $('#onlineTotalPrice').text(total);
    }

}

function cash(route){
    var requestType = "POST";
    var fullName = $("[name='name']").val();
    var mobile = $("[name='mobile']").val();
    var email = $("[name='email']").val();
    var office = $('input[name="office"]:checked').val();
    var address = $("[name='address']").val();
    var country = $("[name='country']").val();
    var totalPrice =  parseInt($('#priceOfProduct').text());
    var delivery = $('#delPrice').text();
    console.log(delivery);
    console.log(totalPrice);


    var data = {
        "fullName": fullName,
        "mobile": mobile,
        "email":email,
        "office":office,
        "address":address,
        "country":country,
        'totalPrice':totalPrice
    };


    console.log(JSON.stringify(data));



    console.log(totalPrice);
    console.log(route);
    var result = ajaxRequest(requestType, route,data);
    console.log(data);
    return result;
}


