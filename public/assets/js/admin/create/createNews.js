

var image = '';

$("#crop").click(function() {
  image = getCroppedImage();
});


 function createNews(createNewsUrl){
    var newsProperties = getNewsInput();

    var newsData =new FormData();

    newsData.append('image', image);
    newsData.append('newsProperties',JSON.stringify(newsProperties));

    console.log(newsData)

    var result = ajaxRequest('POST', createNewsUrl, newsData);
    console.log(result);

    if (result == '1'){
        location.reload();
    }

}


