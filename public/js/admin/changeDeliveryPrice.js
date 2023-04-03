

function changeDeliveryPrice(url){
    var deliveryPrice = $('#change-delivery-price').val();
    var data = {'deliveryPrice': deliveryPrice};
    console.log(data)
    var result = ajaxRequest("POST", url, data);

    if (result == 1){
        location.reload();
    }

    console.log(result);
}
