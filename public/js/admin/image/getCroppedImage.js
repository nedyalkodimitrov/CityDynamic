var bs_modal = $('#modal');
var image = '';

 function getCroppedImage(){
    var canvas = cropper.getCroppedCanvas();

    canvas.toBlob(function(blob) {
        compressImage(blob);
        bs_modal.modal('hide');
    });

    return image;
}


function compressImage(file){
    new Compressor(file, {
        quality: 0.6,
        // The compression process is asynchronous,
        // which means you have to access the `result` in the `success` hook function.
        success(result) {
            image = new File([result], "image.jpeg", {
                type: result.type,
            });
        },
        error(err) {
            console.log(err.message);
        },
    });
}
