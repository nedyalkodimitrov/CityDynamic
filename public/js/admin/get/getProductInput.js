function getProductBaseInput(){
    var title = $('#title').val();
    var titleEn = $('#titleEn').val();
    var theme = $('#theme').val();
    var material = $('#material').val();
    var materialEn = $('#materialEn').val();
    var size = $('#size').val();
    var technique = $('#technique').val();
    var price = $('#price').val();
    var information = $('#information').val();
    var informationEn = $('#informationEn').val();
    var artist = $('.manufactures').find(':selected').val();
    var category = $('.category').find(':selected').val();

    var bg ={
        'title' : title,
        'theme' : theme,
        'material' : material,
        'technique' : technique,
        'information' : information,
        'price' : price,
        'size' : size,
        'artist_id' : artist,
        'category_id' : category,
    }
    var en ={
        'title' : titleEn,
        'theme' : theme,
        'material' : materialEn,
        'technique' : technique,
        'information' : informationEn,
        'price' : price,
        'size' : size,
        'artist_id' : artist,
        'category_id' : category,
    }

    return {bg, en};


}
