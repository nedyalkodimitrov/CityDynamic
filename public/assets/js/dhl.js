window.onload = function(){
    document.getElementById("cashPaymentButton").click();
}

$('#cashPaymentButton').on('click', function () {
    $('#countryLabel').html("");
    $('#countryId').attr("type","hidden");
    $("#onlineEcont").prop("checked", true);

    $('#onlineCountryLabel').html("");
    $('#onlineCountryId').attr("type","hidden");

    $('input[name="office"]').on('change', function() {
        var radioValue = $('input[name="office"]:checked').val();

        if(radioValue == "DHL"){

            $('#countryLabel').html("Country");
            $('#countryId').attr("type", "text");

        } else{

            $('#countryLabel').html("");
            $('#countryId').attr("type","hidden");

        }
    });
});

$('#onlinePaymentButton').on('click', function (){
    $("#econt").prop("checked", true);
    $('#countryLabel').html("");
    $('#countryId').attr("type","hidden");

    $('input[name="onlineOffice"]').on('change', function() {
        var radioValue = $('input[name="onlineOffice"]:checked').val();

        if(radioValue == "DHL"){

            $('#onlineCountryLabel').html("Country");
            $('#onlineCountryId').attr("type", "text");

        } else{

            $('#onlineCountryLabel').html("");
            $('#onlineCountryId').attr("type","hidden");
        }
    });
});
