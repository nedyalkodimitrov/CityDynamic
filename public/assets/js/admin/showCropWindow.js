var bs_modal = $('#modal');
var imageCrop = document.getElementById('imageCrop');
var cropper,reader,file;
var options = {
    autoCropArea: 0.65,
    restore: false,
    guides: false,
    center: false,
    highlight: false,
    dragMode: 'none',
    // cropBoxResizable: false,
    toggleDragModeOnDblclick: false,
    data: {

    },
    // aspectRatio: 8/10,
    viewMode: 1,
    preview: '.preview',


};

$("body").on("change", ".image", function(e) {
    console.log("asdasd");
    var files = e.target.files;
    e.target.parentNode.querySelector(".imagechanger").classList.add("activeImageChanger");
    var done = function(url) {

        imageCrop.src = url;
        bs_modal.modal('show');
    };

    if (files && files.length > 0) {
        file = files[0];

        if (URL) {
            done(URL.createObjectURL(file));
        } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function(e) {
                done(reader.result);
                console.log("asdasdas");
            };
            reader.readAsDataURL(file);
        }
    }
});

bs_modal.on('shown.bs.modal', function() {
    options.aspectRatio = $('.default-aspect-ratio').attr('data-value');
    // options.data.height = parseInt($('.height').attr('data-value'));
    // options.data.width = parseInt($('.width').attr('data-value'));

    cropper = new Cropper(imageCrop,options);

}).on('hidden.bs.modal', function() {
    cropper.destroy();
    cropper = null;
});


// toggle aspect ratio after initialization
$(document).on('click', '#toggle-aspect-ratio .btn', function () {
    options.aspectRatio = $(this).attr('data-value');
    cropper.destroy();
    cropper = new Cropper(imageCrop,options);
});

// toggle aspect ratio after initialization
// $(document).on('click', '#crop', function () {
//     console.log(123123123);
//     cropper.destroy();
// });
//
