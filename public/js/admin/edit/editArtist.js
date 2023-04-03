var image = '';

$("#crop").click(function() {
    image = getCroppedImage();

});


function editArtist(ediArtistUrl){
    var artistData =new FormData();

    var artistProperties = getArtistInput();

    artistData.append('image', image);
    artistData.append('artistProperties',JSON.stringify(artistProperties));

    var result = ajaxRequest('POST', ediArtistUrl, artistData);
    return result;
}


