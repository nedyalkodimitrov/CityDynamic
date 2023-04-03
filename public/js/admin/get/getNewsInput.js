function getNewsInput(){
    var title = $('#title').val();
    var titleInEnglish = $('#titleEn').val();
    var heading = $('#heading').val();
    var headingInEnglish = $('#headingEn').val();
    var information = $('#information').val();
    var informationInEnglish = $('#informationEn').val();
    var date = $('#date').val();
    var time = $('#time').val();

    var bg ={
        'title' : title,
        'heading' : heading,
        'information' : information,
        'date' : date,
        'time' : time,
    };

    var en = {
        'title' : titleInEnglish,
        'heading' : headingInEnglish,
        'information' : informationInEnglish,
        'date' : date,
        'time' : time,
    };

    var data = {
        bg,
        en
    }

    return data;

}
