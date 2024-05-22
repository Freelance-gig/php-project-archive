$(document).ready(function () {
    getRecipesByUser();
})

function getRecipesByUser() {
    $.ajax({
        type: "GET",
        url: "./server/recipes/recipesByUser.php",
        success: function (response) {
            $.each(response, function(key, value){
                $('#recipe-container').append(`
                <div class="recipe" > 
                    <img src="${value['image'] ? value['image'] : "./assets/imgs/no-image.png"}" class="recipe-img"/>
                    <span class="recipe-cat"> ${value['category']} </span>
                    <h3 class="recipe-name"> ${value['name']} </h3>
                    <button class="btn" type="button" onclick="window.location.href='./recipe-detail.php?id=${value['recipe_id']}'"> View </button>
                </div>
                `
                )
            }) 
        }
    })
}
