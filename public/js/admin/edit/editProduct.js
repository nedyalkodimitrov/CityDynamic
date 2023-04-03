
var image = '';
var video = '';

$("#crop").click(function() {
    image = getCroppedImage();
    // start polling at an interval until the data is found at the global
    var intvl = setInterval(function() {
        if (image) {
            clearInterval(intvl);
            $('#imageChanger').attr('src', URL.createObjectURL(image));
        }
    }, 100);

});

$('#video').on('change', function (event){
    video = event.target.files[0];

});

function editProduct(editProductUrl){
    var productProperties = getProductBaseInput();

    var isSold = $('#isSold').val();
    productProperties['bg']['is_sold'] = isSold;
    productProperties['en']['is_sold'] = isSold;

    var productData =new FormData();
    productData.append('image', image);
    productData.append('video',video);
    productData.append('productProperties',JSON.stringify(productProperties));


    var result = ajaxRequest('POST', editProductUrl, productData);

    return result;
}


