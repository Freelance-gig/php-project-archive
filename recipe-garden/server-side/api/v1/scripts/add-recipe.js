const addRecipeCollectionForm = document.querySelector('#add-collection-form') 
const base_url = 'http://localhost/recipe-garden/server-side/api/v1'
const food_name = document.querySelector("#food_name")
const food_image = document.querySelector("#food_image")
const dataContainer = document.querySelector('#dataContainer');

const postDta = async (url, data) => {
    let response = await fetch (`${url}`, {
        method: "POST",
        body: data,
        mode: "no-cors"
    })
    console.log(await response.json())
    return response
}

addRecipeCollectionForm.addEventListener("submit", async (e) => {
    e.preventDefault()
    const formData = new FormData();
    formData.append('food_image', food_image.files[0])
    formData.append('food_name', food_name.value)

    const result = await postDta('./server-side/api/v1/addRecipe.php', formData);
    console.log(result);
    if (result.message === '') {
        dataContainer.innerHTML = '<div> Addedd Successfully </div>'
    }
    // if (result.status === 200) {
    //     window.location.href = "index.php"
    // }
})