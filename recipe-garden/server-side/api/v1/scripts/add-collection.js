const addRecipeCollectionForm = document.querySelector('#add-collection-form') 
const base_url = 'http://localhost/recipe-garden/server-side/api/v1'
const collection_name = document.querySelector("#collection_name")
const collection_image = document.querySelector("#collection_image")
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
    formData.append('collection_image', collection_image.files[0])
    formData.append('collection_name', collection_name.value)

    const result = await postDta('./server-side/api/v1/addRecipeCollection.php', formData);
    console.log(result);
    if (result.message === '') {
        dataContainer.innerHTML = '<div> Addedd Successfully </div>'
    }
    // if (result.status === 200) {
    //     window.location.href = "index.php"
    // }
})