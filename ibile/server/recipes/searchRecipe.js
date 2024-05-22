$(document).ready(function () {
    searchRecipeOnPage()
    searchRecipe()
})

function getUrlParameter(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}


function searchRecipeOnPage () {
    const searchQuery = getUrlParameter('search_q')
    if (searchQuery) {
        if(searchQuery != "") {
            $.ajax({
                url: "./server/recipes/searchRecipe.php",
                method: "POST",
                data: {
                    input: searchQuery
                },
                success: function (response) {
                    $.each(response, function(key, value){
                        $('#recipe-container').append(`
                        <div class="recipe" > 
                            <img src="${value['image'] ? value['image'] : "./assets/imgs/no-image.png"}" class="recipe-img"/>
                            <span class="recipe-cat"> ${value['category']} </span>
                            <h3 class="recipe-name"> ${value['name']} </h3>
                            <button class="btn" type="button" onclick="window.location.href='./recipe-detail.php?recipe_id=${value['recipe_id']}'"> View </button>
                        </div>
                        `
                        )
                    })
                }
            })
        }
    } else {
        $.ajax({
            type: "GET",
            url: "./server/recipes/getAllRecipes.php",
            success: function (response) {
                $.each(response, function(key, value){
                    $('#recipe-container').append(`
                    <div class="recipe" > 
                        <div> I got her e </diV>
                        <img src="./server/image-upload/${value['image'] ? value['image'] : "./assets/imgs/no-image.png"}" class="recipe-img"/>
                        <span class="recipe-cat"> ${value['category']} </span>
                        <h3 class="recipe-name"> ${value['name']} </h3>
                        <button class="btn" type="button" onclick="window.location.href='./recipe-detail.php?recipe_id=${value['recipe_id']}'"> View </button>
                    </div>
                    `
                    )
                }) 
            }
        })
    }
}

function search(input) {
        console.log(input)
        if (input !== "") {
            $.ajax({
                url: "./server/recipes/searchRecipe.php",
                method: "POST",
                data: {
                    input: input
                },
                success: function (response) {
                    console.log(response);
                    $('#recipe-container').html("")
                    $.each(response, function(key, value){
                        $('#recipe-container').append(`
                        <div class="recipe" > 
                            <img src="${value['image'] ? value['image'] : "./assets/imgs/no-image.png"}" class="recipe-img"/>
                            <span class="recipe-cat"> ${value['category']} </span>
                            <h3 class="recipe-name"> ${value['name']} </h3>
                            <button class="btn" type="button" onclick="window.location.href='./recipe-detail.php?recipe_id=${value['recipe_id']}'"> View </button>
                        </div>
                        `
                        )
                    })
                }
            })
        }
}

function searchRecipe () {
    var input 
    $(".search-input").on('change', function () {
        input = $(this).val()
    })
    $("#select-location").on('change', function () {
        search($(this).val());
    })

    $("#live-search-button").click(() => search(input))

}

