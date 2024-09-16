$(document).ready(function() {
  $("#login-btn").on('click', function() {
    var email = $("#login-email").val();
    var password = $("#login-password").val();
    if (email == "" || password == "") {
      alert('Please check your inputs');
    } else {
      $.ajax({
          url: './server/auth.php',
          method: 'POST',
          data: {
              login: 1,
              email: email,
              password: password,
              pathname: $(location).attr("pathname")
          },
          success: function(response) {
              if (response == 'success') {
                  window.location.href = 'election-list.php';
              }else {
                  alert(response)
              }
          },
          dataType: 'text'
      })
  }

  })
  $("#signup-voter-btn").on('click', function() {
    var location = $("#vlocation").val();
    var nationality = $("#vnationality").val();
    var DOB =  $("#vdob").val();
    var firstname = $("#vfirstname").val();
    var lastname = $("#vlastname").val();
    var email = $("#vemail").val();
    var password = $("#vpassword").val();
    var confirm_password = $("#vconpassword").val();
    if (email == "" || password == "") {
      alert ("You need to fill your email and password")
    } else {
      if (password != confirm_password) {
        alert ("Password Do not match")
      } else {
        $.ajax({
          url: './server/auth.php',
          method: 'POST',
          data: {
              signup_voter: 1,
              location: location,
              nationality: nationality,
              DOB: DOB,
              firstname: firstname,
              lastname: lastname,
              email: email,
              password: password,
              confirm_password: confirm_password
          },
          success: function(response) {
              if (response == 'success') {
                  window.location.href = './voter-auth.php';
              } else {
                  alert(response)
              }
          },
          dataType: 'text'
      })
      }
    }

  })
  $("#signup-officer-btn").on('click', function() {
    var firstname = $("#ofirstname").val();
    var lastname = $("#olastname").val();
    var email = $("#oemail").val();
    var password = $("#opassword").val();
    var confirm_password = $("#oconpassword").val();
    if (email == "" || password == "") {
      alert ("You need to fill your email and password")
    } else {
      if (password != confirm_password) {
          alert ("Password Do not match")
      } else {
        $.ajax({
            url: './server/auth.php',
            method: 'POST',
            data: {
                signup_officer: 1,
                firstname: firstname,
                lastname: lastname,
                email: email,
                password: password,
                confirm_password: confirm_password
            },
            success: function(response) {
                if (response == 'success') {
                    window.location.href = './officer-auth.php';
                } else {
                    alert(response)
                }
            },
            dataType: 'text'
        })
      }
    }
  })
  $("#admin-login-btn").on('click', function(){
    var email = $("#email").val();
    var password = $("#password").val();
    
    if (email == "" || password == "") {
      alert('Please check your inputs');
    } else {
      $.ajax({
          url: './server/auth.php',
          method: 'POST',
          data: {
              login: 1,
              email: email,
              pathname: $(location).attr("pathname"),
              password: password
          },
          success: function(response) {
              if (response == 'success') {
                  window.location.href = '/election-list.php';
              }else {
                  alert(response)
              }
          },
          dataType: 'text'
      })
  }
  })
  $("#admin-signup-btn").on('click', function(){
    var firstname = $("#afirstname").val();
    var lastname = $("#alastname").val();
    var email = $("#aemail").val();
    var password = $("#apassword").val();
    var confirm_password = $("#aconpassword").val();
    if (email == "" || password == "") {
      alert ("You need to fill your email and password")
    } else {
      if (password != confirm_password) {
          alert ("Password Do not match")
      } else {
        $.ajax({
            url: './server/auth.php',
            method: 'POST',
            data: {
                signup_admin: 1,
                firstname: firstname,
                lastname: lastname,
                email: email,
                password: password,
                confirm_password: confirm_password
            },
            success: function(response) {
                if (response == 'success') {
                    window.location.href = './officer-auth.php';
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