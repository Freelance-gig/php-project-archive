const collectionContainer = document.querySelector("#collections")
const base_url = 'http://localhost:3000/server-side/api/v1'

const getRequest = async (url) => {
    let response = await fetch (`${base_url}/${url}`, {
        method: "GET"
    })

    data = await response.json()

    return data;
}


const documentRender = async (container) => {
    const collections = await getRequest('getCollections.php')
    collections.data.forEach(item => (
        container.innerHTML += `
        <a href="./recipe-list.php?collection_id=${item["collection_id"]}">
        <div class="text-center space-y-2">
            <img alt="Dinner" src="./server-side/upload/${item['collection_image']}" class="w-[80%] h-[30vh] rounded-md"/>
            <h3 class="font-bold inter-noto"> ${item['collection_name']} </h3>
        </div>  
        </a>
        `
    ))
 
}

documentRender(collectionContainer);

const collectionContainer = document.querySelector('#collections')
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
    const data =  await getData('./server-side/api/v1/collections.php');
    if (data.data.length > 0 ) {
        data.data.forEach(item => {
            if (collectionContainer) {
                collectionContainer.innerHTML += `
                {/* <a href="./recipe-list.php?category=${item.collection_id}">
        <div class="space-y-2">
            <img alt="Dinner" src="./server-side/image/${item.collection_image}" class="w-[80%] h-[30vh] rounded-md"/>
            <h3 class="text-center font-bold inter-noto"> ${item.collection_name} </h3>
        </div>
        </a> */}
        `
            }
            if (collectonIdCont)   {
                collectonIdCont.innerHTML+= `
                <option value="${item.collection_id}">${item.collection_name}</option>
            `
            }
        })
    } else {
        if (collectionContainer) {
            collectionContainer.innerHTML += `<div style="text-align: center;" class='text-center'> No collection has been added yet </div>`
        }
        if (collectonIdCont)   {
            collectonIdCont.innerHTML += `<a href="add-collection.php"> Add A collection </a>`
        }
    }
}



renderCollections()
