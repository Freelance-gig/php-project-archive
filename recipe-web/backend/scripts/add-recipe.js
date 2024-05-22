$(document).ready(function() {
    $("#add-recipe-form").submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        // var recipe_name = $("#recipe_name").val();
        // var recipe_description = $("#recipe_description").val();
        // var recipe_ingredients = $("#recipe_ingredients").val();      
    
        // if (recipe_name === "" || recipe_description === "" || recipe_ingredients === "" ) {
        //     alert ("Tell us more about your recipe");
        // } else {
            $.ajax({
                url: "./backend/php/add-recipe.php",
                method: "POST",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response)
                    if (response.success) {
                        alert ("Added Recipe successfully");
                    } else {
                        alert(response);
                    }
                }
            })
    // }

    })

})