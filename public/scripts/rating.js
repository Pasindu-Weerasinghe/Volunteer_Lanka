var rating_data = 0;

$(document).on("mouseenter", ".submit_star", function () {
    var rating = $(this).data("rating");

    resetBackground();

    for (var count = 1; count <= rating; count++) {
        $("#submit_star_" + count).removeClass("unchecked");
        $("#submit_star_" + count).addClass("checked");
    }
});

function resetBackground() {
    for (var count = 1; count <= 5; count++) {
        $("#submit_star_" + count).addClass("unchecked");
        $("#submit_star_" + count).removeClass("checked");
    }
}

$(document).on("mouseleave", ".submit_star", function () {
    resetBackground();

    for (var count = 1; count <= rating_data; count++) {
        $("#submit_star_" + count).removeClass("unchecked");

        $("#submit_star_" + count).addClass("checked");
    }
});

$(document).on("click", ".submit_star", function () {
    rating_data = $(this).data("rating");
    document.getElementById("rate").innerHTML = rating_data;
    $("#rating").val(rating_data);
});