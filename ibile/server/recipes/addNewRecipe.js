$(document).ready(function () {
    addRecipe()
})

function addRecipe () {
    $("#add-recipe-form").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            method: "POST",
            url: "./server/recipes/addNewRecipe.php",
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(response) {
                if (response == 'success') {
                    alert ("Recipe Added Successfully");
                    window.location.href = '/ibile/recipes.php';
                } else {
                    alert (response);
                }
            }
        })

    })
}