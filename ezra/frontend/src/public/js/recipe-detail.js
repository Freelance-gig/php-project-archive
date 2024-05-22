const recipeInfoContainer = document.querySelector('#recipe-info');
const ingredientsContainer = document.querySelector('#ingridients-container');
const instructionsContainer = document.querySelector('#instructions-container');
const reviewContainer = document.querySelector('#review-container');
const carouselContainer = document.querySelector('#carousel-container');
const carouselItemContainer = document.querySelector('#carousel-item');

const params = new Proxy (new URLSearchParams(window.location.search), {
    get: (searchParams, prop) => searchParams.get(prop)
})
let value = params.recipe_id;
const baseUrl = "http://localhost:3000/api/v1"


const getRequest = async (url) => {

     let response = await fetch(`${baseUrl}/${url}`, { 
      method: "GET",
    });
    
    data = await response.json();
    return data;
}

const renderDetails= async() => {
    const recipeData = await getRequest(`recipes/getrecipe.php?id=${value}`)
    const instructions = recipeData.recipe_instructions.split("'").filter(item => item !== `, `).filter(item => item !== '"[').filter(item => item!== ']"')
   
    const ingredients = recipeData.recipe_ingredients.split("'").filter(item => item !== `, `).filter(item => item !== '"[').filter(item => item!== ']"')
    const images = recipeData.recipe_images.split("'").filter(item => item !== `, `).filter(item => item !== '"[').filter(item => item!== ']"').filter(item => item !== "[").filter(item => item !== "]")
    
    recipeInfoContainer.innerHTML += `
    <section class="my-4" id="recipe-info">
        <h2 class="fs-1"> ${recipeData.recipe_name}</h2>
        <p class="my-4"> ${recipeData.recipe_description}</p>
        <p class="fs-3"> Created by <span> ${recipeData.author && recipeData.author}</span></p>
    </section>
    `;

    instructions.forEach((element) => {
        instructionsContainer.innerHTML += `
                <li> ${element} </li>
        `
    })
    ingredients.forEach((element) => {
        ingredientsContainer.innerHTML += `
                <li> ${element} </li>
        `
    })
    carouselItemContainer.innerHTML += `
            <img src="${images[0]}" class="d-block w-100 rounded" style="height: 80vh; object-fit: contain;" alt="food-image carousel">

    `
    images.splice(1).forEach((element) => {
        carouselContainer.innerHTML+`
        <div class="carousel-item rounded">
        <img src="${element}" class="d-block w-100 rounded" style="height: 80vh; object-fit: contain;" alt="food-image carousel">   
        </div>

        `
    })

}
renderDetails()
