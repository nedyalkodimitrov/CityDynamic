var image = '';

$("#crop").click(function() {
    image = getCroppedImage();

    var intvl = setInterval(function() {
        if (image) {
            clearInterval(intvl);
            $('#imageChanger').attr('src', URL.createObjectURL(image));
        }
    }, 100);

});


function editNews(editNewsUrl){
    var newsProperties = getNewsInput();

    var newsData = new FormData();
    newsData.append('image', image);
    newsData.append('newsProperties',JSON.stringify(newsProperties));

    var result = ajaxRequest('POST', editNewsUrl, newsData);
    console.log(1);
    return result;

}


