$(document).ready(function() {
    $("#signup-btn").click(function() {
        
        var fullname = $("#fullname").val();
        var email = $("#email").val();
        var user_type = $("#user_type").val();
        var password = $("#password").val();
        var conPassword = $("#conPassword").val();
        var username = $("#username").val();

        if (password === "" || email === "" || conPassword === "" || username === "") {
            alert (" You are missing required input")
        } else {
            if (password !== conPassword) {
                alert ("Password do not match")
            }
            else {
                $.ajax({
                    url: "./backend/php/signup.php",
                    method: "POST",
                    data: {
                        fullname: fullname,
                        email: email,
                        user_type: user_type,
                        password: password,
                        conPassword: conPassword,
                        username: username,
                        signup: 1,
                    }, 
                    success: function(response) {
                        if (response == 'success') {
                            window.location.href = "./login.php"
                        } else {
                            alert(response);
                        }
                    }
                    
                })
            }
        }
    })
})