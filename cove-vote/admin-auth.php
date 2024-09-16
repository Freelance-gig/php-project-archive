<?php
    require('./server/config.php');
    if (isset($_SESSION['loggedIn'])) {
        header('Location: index.php');
    };
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/main.css">
    <title> Auth Page </title>
  </head>
  <body class="ff-inria">
  <?php
      include('./assets/components/header.php')
    ?>
   <main class="container mx auto">
   <nav class="nav nav-tabs" role="tablist">
          <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Log in</button>
          <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup" type="button" role="tab" aria-controls="signup" aria-selected="true">Sign up</button>
    </nav>
   <div class="tab-content" style="height: 35vh; width: 30vw; overflow: scroll;">
          <div role="tabpanel" aria-labelledby="login-tab"  class="tab-pane active  fade show" id="login">
            <form class="d-grid gap-3">
                <div class="d-grid gap-1">
                    <label class="form-label"> E-mail </label>
                    <input  id="email" placeholder="Enter Email" type="email" required class="form-control" />
                </div>
                <div class="d-grid gap-1">
                    <label class="form-label"> Password </label >
                    <input id="password" placeholder="Enter Password" type="password" required  class="form-control"/>
                </div>
                <button id="admin-login-btn" type="button" class="button rounded shadow-sm"> Log in </button>
            </form>
          </div>
          <div role="tabpanel"  aria-labelledby="signup-tab" class="tab-pane  fade" id="signup">
              <form class="d-grid gap-3 mb-3">
                  <div class="d-grid gap-1">
                      <label for="afirstname" class="form-label"> First Name </label>
                      <input id="afirstname" placeholder="Enter First Name" type="email" required  class="form-control"/>
                  </div>
                  <div class="d-grid gap-1">
                      <label for="alastname" class="form-label"> Last Name </label>
                      <input id="alastname" placeholder="Enter Last Name" type="email" required  class="form-control"/>
                  </div>
                  <div class="d-grid gap-1">
                      <label for="aemail" class="form-label"> E-mail </label>
                      <input id="aemail" placeholder="name@example.com" type="email" required  class="form-control"/>
                  </div>
                  <div class="d-grid gap-1">
                      <label for="apassword" class="form-label"> Password </label>
                      <input id="apassword" placeholder="Enter Password" type="password" required  class="form-control"/>
                  </div>
                  <div class="d-grid gap-1">
                      <label for="aconpassword" class="form-label"> Confirm Password </label>
                      <input id="aconpassword" placeholder="Enter Password" type="password" required   class="form-control" />
                  </div>
                  <button id="admin-signup-btn" type="button" class="button rounded shadow-sm"> Sign up </button>

              </form>
          </div>
   </div>
   </main>
   <?php
      include('./assets/components/footer.php')
    ?>
     <script src="./assets/js/auth.js"> </script>
    </body>
  </html>