$(document).ready(function(event){
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("c-tabs__content");
    for (i = 1; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("c-tabs__section-button");
    for (i = 1; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    $("#boughtPlugins").css("display", "block");
    document.getElementById("cashPaymentButton").className += " active";

});



function openTab(evt, section) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("c-tabs__content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("c-tabs__section-button");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(section).style.display = "block";
    evt.currentTarget.className += " active";

}
