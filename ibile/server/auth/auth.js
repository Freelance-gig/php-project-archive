$(document).ready(function() {
    $("#login").on('click', function() {
        var email = $("#login-email").val();
        var password = $("#login-password").val();

        if (email == "" || password == "") {
            alert('Please check your inputs');
        } else {
            $.ajax({
                url: './server/auth/auth.php',
                method: 'POST',
                data: {
                    login: 1,
                    email: email,
                    password: password
                },
                success: function(response) {
                    if (response == 'success') {
                        window.location.href = '/ibile/dashboard.php';
                    }else {
                        alert(response)
                    }
                },
                dataType: 'text'
            })
        }
    })
    $("#signup").on('click', function() {
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var email = $("#email").val();
        var userType = $(".userType:checked").val();
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();

        if (email == "" || password == "") {
            alert ("You need to fill your email and password")
        } else {
            if (password != confirm_password) {
                alert ("Password Do not match")
            } else {
                $.ajax({
                    url: './server/auth/auth.php',
                    method: 'POST',
                    data: {
                        signup: 1,
                        firstname: firstname,
                        lastname: lastname,
                        email: email,
                        userType: userType,
                        password: password,
                        confirm_password: confirm_password
                    },
                    success: function(response) {
                        if (response == 'success') {
                            window.location.href = './auth.php';
                        } else {
                            alert(response)
                        }
                    },
                    dataType: 'text'
                })
            }
        }      
        
    })
})