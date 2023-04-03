var bs_modal = $('#modal');
function getCroppedImage(){

    var image = '';

    return new Promise(function(resolve, reject) {
        var canvas = cropper.getCroppedCanvas();
        canvas.toBlob(async function (blob) {
            var compressedImage = await compressImage(blob);
            bs_modal.modal('hide');
            resolve(compressedImage);
            console.log(compressedImage);
        });
    });
}


function compressImage(file) {
    return new Promise(function(resolve, reject) {
        new Compressor(file, {
            quality: 0.6,
            success(result) {
                var compressedImage = new File([result], randomNameGenerator(8)+".jpeg", {
                    type: result.type,
                });
                resolve(compressedImage);
            },
            error(err) {
                reject(err);
            },
        });
    });
}

const randomNameGenerator = num => {
    let res = '';
    for(let i = 0; i < num; i++){
        const random = Math.floor(Math.random() * 27);
        res += String.fromCharCode(97 + random);
    };
    return res;
};
