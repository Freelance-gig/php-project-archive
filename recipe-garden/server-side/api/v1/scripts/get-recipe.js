const recipeContainer = document.querySelector('#collections')
const collectonIdCont = document.querySelector("#collection_id")
const getData = async (url) => {
    let response = await fetch (`${url}`, {
        method: "GET",
        mode: "no-cors"
    })

    return await response.json()
    
}
{/* <div class="text-center"><span>4</span> Recipes </div> */}

const renderCollections = async () => {
    const data =  await getData('./server-side/api/v1/recipes.php');
    if (data.data.length > 0 ) {
        data.data.forEach(item => {
            if (recipeContainer) {
                recipeContainer.innerHTML += `
                <div class="text-center space-y-2">
                <img alt="Dinner" src="./static/images/desert.jpg" class="w-[80%] h-[30vh] rounded-md"/>
                <span> Desert </span>
                <h3 class="text-center font-bold inter-noto"> Whole Lemon Blender Cake </h3>
                <a href="./recipe-detail.html"><button class="rounded-full border px-4 py-2" > View Recipe </button></a>
                
            </div>
        ` 
            }
         
            if (collectonIdCont)   {
                collectonIdCont.innerHTML+= `
                <option value="${item.collection_id}">${item.collection_name}</option>
            `
            }
         
        })
    } else {
        if (recipeContainer) {
            recipeContainer.innerHTML += `<div style="text-align: center;" class='text-center'> No collection has been added yet </div>`
        }
        if (collectonIdCont)   {
            collectonIdCont.innerHTML += `<a href="add-collection.php"> Add A collection </a>`
            
        }
    }
   
}



renderCollections()