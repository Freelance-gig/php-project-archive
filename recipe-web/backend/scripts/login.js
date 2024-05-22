$(document).ready(function() {
    $("#login-btn").click(function(){

        var email = $("#email").val()
        var password = $("#password").val()
        console.log(password)
        if (email === "" || password === "") {
            alert ('Email or Inputs are empty')
        } else {
            $.ajax({
                url: './backend/php/login.php',
                method: "POST",
                data: {
                    email: email,
                    password: password,
                    login: 1
                },
                success: function(response) {
                    if (response === 'success') {
                        window.location.href = "./list_recipes.php"
                    } else {
                        alert(response)
                    }
                }
            })
        }
    })
})