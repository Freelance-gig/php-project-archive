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
        <main class="container d-flex flex-column flex-md-row align-items-center auth-container">
      <img class=".d-sm-none .d-md-block" src="./assets/imgs/voter-bg.png" style="height: 50vh; width: 40vw; object-fit: contain;"/>

      <section>
        <nav class="nav nav-tabs" role="tablist">
          <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Log in</button>
          <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup" type="button" role="tab" aria-controls="signup" aria-selected="true">Sign up</button>
        </nav>
        <div class="tab-content" style="height: 35vh; width: 30vw; overflow: scroll;">
          <div role="tabpanel" aria-labelledby="login-tab"  class="tab-pane active  fade show" id="login">
              <form class="d-grid gap-3">
                  <div class="d-grid gap-1">
                      <label class="form-label"> E-mail </label>
                      <input  id="login-email" placeholder="Email" type="email" required class="form-control" />
                  </div>
                  <div class="d-grid gap-1">
                      <label class="form-label"> Password </label >
                      <input id="login-password" placeholder="Enter Password" type="password" required  class="form-control"/>
                  </div>
                  <button id="login-btn" type="button" class="button rounded shadow-sm"> Log in </button>
              </form>
          </div>
          <div role="tabpanel"  aria-labelledby="signup-tab" class="tab-pane  fade" id="signup">
              <form class="d-grid gap-3 mb-3">
                  <div class="d-grid gap-1">
                      <label for="vlocation" class="form-label"> Where do you live ? </label>
                      <select id="vlocation" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="england"> England </option>
                        <option value="scotland"> Scotland </option>
                        <option value="wales"> Wales </option>
                        <option value="ireland"> Northern Ireland </option>
                        <option value="outside"> Outside Britian </option>
                      </select>
                  </div>
                  <div class="d-grid gap-1">
                      <label for="vnationality" class="form-label"> Nationality </label>
                      <select id="vnationality" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="irish"> Irish </option>
                        <option value="british"> British </option>
                      </select>
                  </div>
                  <div class="d-grid gap-1">
                      <label for="vdob" class="form-label"> Date of Birth </label>

                      <input id="vdob" class="form-control" type="date" />
                  </div>
                  <div class="d-grid gap-1">
                      <label for="vfirstname" class="form-label"> First Name </label>
                      <input id="vfirstname" placeholder="Enter First Name" type="text" required  class="form-control"/>
                  </div>
                  <div class="d-grid gap-1">
                      <label for="vlastname" class="form-label"> Last Name </label>
                      <input id="vlastname" placeholder="Enter Last Name" type="text" required  class="form-control"/>
                  </div>
                  <div class="d-grid gap-1">
                      <label for="vemail" class="form-label"> E-mail </label>
                      <input id="vemail" placeholder="name@example.com" type="email" required  class="form-control"/>
                  </div>
                  <div class="d-grid gap-1">
                      <label for="vpassword" class="form-label"> Password </label>
                      <input id="vpassword" placeholder="Enter Password" type="password" required  class="form-control"/>
                  </div>
                  <div class="d-grid gap-1">
                      <label for="vconpassword" class="form-label"> Confirm Password </label>
                      <input id="vconpassword" placeholder="Enter Password" type="password" required   class="form-control" />
                  </div>
                  <button id="signup-voter-btn" type="button" class="button rounded shadow-sm"> Sign up </button>
              </form>
          </div>
      </div>
      </section>
    </main>
    <?php
      include('./assets/components/footer.php')
    ?>
    <script src="./assets/js/auth.js"> </script>

    </body>
  </html>