$(document).ready(function () {
    homeSearch()
})
function homeSearch() {
    $("#home-search-button").click(function ( ) {
        var homeInputValue = $("#home-search").val();
        if (homeInputValue !== "") {
            window.location.href= `./recipes.php?search_q=${homeInputValue}`
        }
    })
}