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
    <title> Add Election </title>
  </head>
  <body class="ff-inria">
  <?php
      include('./assets/components/header.php')
    ?>
    <main class="container">
        <h2 style="margin-top: 10vh;"> Add Election </h2>
        <form class="d-grid gap-3 mb-3">
          <div class="d-grid gap-1">
            <label for="name" class="form-label"> Election Name </label>
            <input id="name" class="form-control" type="text" required />
          </div>
          <div class="d-grid gap-1">
            <label for="description" class="form-label"> Election Description </label>
            <input id="description" class="form-control" type="text" required />
          </div>
          <div class="d-grid gap-1">
            <label for="candidates" class="form-label"> Candidates </label>
            <textarea id="candidates" placeholder="candidate A, candidate B" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
          </div>
          <div class="d-grid gap-1">
            <label for="location" class="form-label"> Election Location </label>
            <select id="location" class="form-select" aria-label="Default select example" required>
              <option selected>Open this select menu</option>
              <option value="england"> England </option>
              <option value="scotland"> Scotland </option>
              <option value="wales"> Wales </option>
              <option value="ireland"> Northern Ireland </option>
              <option value="outside"> Outside Britian </option>
            </select>
          </div>
          <div class="d-grid gap-1">
            <label for="polling_unit" class="form-label"> Election Polling Unit </label>
            <select  id="polling_unit" class="form-select" aria-label="Default select example" required>
              <option selected>Open this select menu</option>
              <option value="polling_unit_A"> Polling Unit A</option>
              <option value="polling_unit_b"> Polling Unit B </option>
              <option value="polling_unit_c"> Polling Unit C </option>
            </select>
          </div>
          <button id="add-election-btn" type="button" class="button rounded shadow-sm btn-secondary"> Submit </button>

        </form>
    </main>
    <?php
      include('./assets/components/footer.php')
    ?>
    <script src="./assets/js/election.js"> </script>
    </body>
  </html>