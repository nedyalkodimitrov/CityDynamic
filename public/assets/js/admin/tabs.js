$(".tablinks").first().addClass("active");
var id = $(".tablinks").first().attr('id');
document.getElementById(id + "-tab").style.display = "block";
$(".tablinks").on("click", function () {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    var id = $(this).attr('id');
    console.log(id)
    document.getElementById(id + "-tab").style.display = "block";
    $(this).addClass("active");
});
