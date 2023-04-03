function getArtistInput(){
    var name = $('#name').val();
    var nameEn = $('#nameEn').val();
    var birthDate = $('#birthDate').val();
    var deathDate = $('#deathDate').val();
    var information = $('#information').val();
    var informationEn = $('#informationEn').val();


    var bg ={
        'name' : name,
        'birth_date' : birthDate,
        'death_date' : deathDate,
        'information' : information,
    }

    var en ={
        'name' : nameEn,
        'birth_date' : birthDate,
        'death_date' : deathDate,
        'information' : informationEn,
    }

    return {bg, en};
}
