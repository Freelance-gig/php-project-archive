$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "./backend/php/view-recipelist.php",
        success: function (response) {
            var groupedData = groupBy(response, "list_name")
            $.each(Object.keys(groupedData), function(key, value) {
                $("#recipelist-container").append(`
                <div class="recipe-cards">
                    <h3> ${value} </h3>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card">
                                <img src="images/local1.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Best apperixe</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `)
            })
            $.each(response, function(key, value) {
              
                $("#recipe_list_id").append(`
                    <option value="${value['recipe_list_id']}">${value['list_name']}  </option>
                `)
            })
        }
    })
})

function groupBy (array, key) {
    return array.reduce((result, obj) => {
        (result[obj[key]] = result[obj[key]] || []).push(obj);
        return result;
    }, {})
}