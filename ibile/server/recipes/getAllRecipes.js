$(document).ready(function () {
    getRecipes();
})

function getRecipes() {
    $.ajax({
        type: "GET",
        url: "./server/recipes/getAllRecipes.php",
        success: function (response) {
            console.log(response)
            console.log('I got here')
            const popularArr = response.slice(0,4)
            // $.each(popularArr, function(key, value){
            //     $('#recipe-container').append(`
            //     <div class="recipe" > 
            //         <img src="${value['image']} ? ./server/image-upload/${value['image']}  : "./assets/imgs/no-image.png"" class="recipe-img"/>
            //         <span class="recipe-cat"> ${value['category']} </span>
            //         <h3 class="recipe-name"> ${value['name']} </h3>
            //         <button class="btn" type="button" onclick="window.location.href='./recipe-detail.php?recipe_id=${value['recipe_id']}'"> View </button>
            //     </div>
            //     `
            //     )
            // }) 
        }
    })
}

