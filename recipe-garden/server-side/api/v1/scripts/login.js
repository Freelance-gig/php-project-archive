const email = document.querySelector("#email");
const password = document.querySelector("#password");

const loginButton = document.querySelector("#login-btn");

const base_url = 'http://localhost/recipe-garden/server-side/api/v1'

const postDta = async (url, data) => {
    let response = await fetch (`${url}`, {
        method: "POST",
        body: JSON.stringify(data),
        mode: "no-cors"
    })

    return response
}

loginButton.addEventListener("click", async() => {
    const data = {
        email: email.value,
        password: password.value
    }

    const result = await postDta('./server-side/api/v1/login.php', data)
    if (result.status === 200) {
        window.location.href = "recipe-list.php"
    }
})