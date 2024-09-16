<?php
    require('./server/config.php');
    if (!($_SESSION['userType'] == 'officer' || $_SESSION['userType'] == 'admin' )) {
        header('Location: index.php');
        exit();
    };
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/main.css">
    <title> Add Voter </title>
  </head>
  <body class="ff-inria">
  <?php
      include('./assets/components/header.php')
    ?>
    <main class="container">
        <h2 style="margin-top: 10vh;"> Add Voter </h2>
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
                  <button id="signup-voter-btn" type="button" class="button rounded shadow-sm btn-secondary "> Submit </button>
              </form>
    </main>
    <?php
      include('./assets/components/footer.php')
    ?>
    <script src="./assets/js/auth.js"> </script>
    </body>
  </html>