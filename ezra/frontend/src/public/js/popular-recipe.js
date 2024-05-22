const popluarRecipeContainer = document.querySelector("#popular-recipe");

const baseUrl = "http://localhost:3000/api/v1"


const getRequest = async (url) => {
    // let headersList = {
    //   "Accept": "*/*",
    //  }
     let response = await fetch(`${baseUrl}/${url}`, { 
      method: "GET",
      // headers: headersList
    });
    
    data = await response.json();
    return data.data;
  }
  

const renderDocuments = async (container) => {
const  recipeData = await getRequest('/recipes/all.php')
    recipeData.forEach((element) => {
        container.innerHTML += `
                <a href="./recipe-detail.html?recipe_id=${element.recipe_id}">

                <div class="shadow p-3 mb-5 bg-body rounded" style="width: fit-content;">
                    <img alt="food-image" class="rounded" src="${element.recipe_images.split("'")[1]}" style="width: 250px; height: 20vh;"/>
                    <div class="d-flex justify-content-between mt-3">
                        <div>
                            <span class="d-block gray-color fs-6 inter-regular"> ${element.recipe_category} </span>
                            <h3 class="fs-6"> ${element.recipe_name}</h3>
                            <p> ${element.recipe_description} <p>
                            <span class="orange-color">  ${element.time_to_cook}</span>
                        </div>
                        <div>
                            <span>
                                <img src="./public/img/star-icon.png" alt="star icon" style="width: 16px; height: 16px;"/>
                                <span class="fs-6 gray-color">${element.likes || 0} Likes </span>
                            </span>
                            <span>
                                <img src="./public/img/comments-icon.png" alt="comment icon" style="width: 16px; height: 16px;"/>
                                <span class="fs-6 gray-color"> 2</span>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        `
    })
};

renderDocuments(popluarRecipeContainer);