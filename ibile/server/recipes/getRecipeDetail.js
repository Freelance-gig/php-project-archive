$(document).ready(function () {
    getRecipeDetail();
})

function getUrlParameter(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

const recipe_id = getUrlParameter('recipe_id')

function getRecipeDetail() {
    $.ajax({
        type: "GET",
        url: `./server/recipes/getRecipeDetail.php?recipe_id=${recipe_id}`,
        success: function (response) {
            response = JSON.parse(response)
            console.log(response)
            $("#recipe-info").append(`
                <h2> ${response.name} </h2>
                <span class="recipe-cat"> ${response.category} </span>
                <p> ${response.description} </p>
            `);
            $('#recipe-detail-image').html = `
            <img src='./image-upload/${response.image}' />
            `


        }
    })
}

