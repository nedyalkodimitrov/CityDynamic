var image = '';

$("#crop").click(function() {
    image = getCroppedImage();

});

function createArtist( createArtistUrl){
    var requestType = "POST";

    var artistProperties = getArtistInput();

    var artistData =new FormData();

    artistData.append('image', image);
    artistData.append('artistProperties', JSON.stringify(artistProperties));

    var result = ajaxRequest('POST', createArtistUrl, artistData);
    return result;
}


