const registerButton = document.querySelector("#register-btn");
const firstname = document.querySelector("#firstname");
const lastname = document.querySelector("#lastname");
const email = document.querySelector("#email");
const user_role = document.querySelector("#user_role");
const password = document.querySelector("#password");
const con_password = document.querySelector("#con_password");

const base_url = 'http://localhost/recipe-garden/server-side/api/v1'

const postDta = async (url, data) => {
    let response = await fetch (`${url}`, {
        method: "POST",
        body: JSON.stringify(data),
        mode: "no-cors"
    })

    return response
}

registerButton.addEventListener("click", async () => {
    const data = {
        userRole : user_role.value,
        lastname: lastname.value,
        firstname: firstname.value,
        email: email.value,
        password: password.value,
        con_password: con_password.value
    }
  
    const response = await postDta('./server-side/api/v1/signup.php', data)
    if (!response.ok) {
        alert ('Network response is faulty')
    }

    if (response.ok) {
        window.location.href = "signin.php"
    }
})