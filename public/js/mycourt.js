$(document).ready(function () {
    // PLATZBELEGUNG
    if($(".court-div").length) {
        displayCourt(1);
    }
});


var displayCourt = function (courtNumber) {
    $(".court-div").hide();
    $("#court-select").find('li').removeClass('active');
    $("#court-" + courtNumber).show();
    $("#court-selector-" + courtNumber).addClass('active');
}

