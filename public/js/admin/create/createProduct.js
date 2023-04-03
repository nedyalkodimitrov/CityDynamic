
var image = '';
var video = '';

$("#crop").click(function() {
    image = getCroppedImage();

});

$('#video').on('change', function (event){
    video = event.target.files[0];

});

function createProduct(postProductUrl){
    var productProperties = getProductBaseInput();

    var productData =new FormData();
    productData.append('image', image);
    productData.append('video',video);
    productData.append('productProperties',JSON.stringify(productProperties));

    var result = ajaxRequest('POST', postProductUrl, productData);

    return result;
}


