const chefLoginForm = document.querySelector('#chef-login');
const chefRegistForm = document.querySelector('#chef-register');
const baseUrl = "http://localhost:3000/api/v1/auth"
const signUpEmail = document.querySelector('#signupemailinput');
const signUpPassword= document.querySelector('#signuppasswordinput');
const signUpConPassword = document.querySelector('#signupconpasswordinput')

const loginEmail = document.querySelector('#loginemailinput');
const loginPassword= document.querySelector('#loginpasswordinput');


const postData = async (url, data) => {

    let response = await fetch(`${baseUrl}/${url}`, { 
        method: "POST",
        body: JSON.stringify(data),
        mode: "no-cors"
    });

    const res =  response;
    return res;
}

chefLoginForm.addEventListener('click', async () => {
    const data = {
            email: loginEmail.value,
            password: loginPassword.value
        }
    const  result = await postData('login.php', data )

    localStorage.setItem("auth", true);
    localStorage.setItem("user", data);
    window.location.href = "http://localhost:5500/frontend/src/recipes-list.html"
})