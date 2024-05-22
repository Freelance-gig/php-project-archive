const baseUrl = "http://localhost:3000/api/v1"

export const getRequest = async (url) => {
  // let headersList = {
  //   "Accept": "*/*",
  //  }
   let response = await fetch(`${baseUrl}/${url}`, { 
    method: "GET",
    // headers: headersList
  });
  
  data = await response.json();
  return data;
}


   