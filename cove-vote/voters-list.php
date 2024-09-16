<?php
    require('./server/config.php');
    if (!isset($_SESSION['loggedIn'])) {
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
    <title> Voters List Page </title>
  </head>
  <body class="ff-inria">
  <?php
      include('./assets/components/header.php')
  ?>
    <main class="container flow">
    <h2> List of Voters </h2>
    <div class="search-container">
      <input id="search" placeholder="Search for Voters" />

      <i style="cursor: pointer;" id="search-button" class="fa fa-search fa-2xl" aria-hidden="true"></i>
    </div>
    <div class="table-wrapper">

    <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col"> FirstName </th>
                      <th scope="col"> Last Name </th>
                      <th scope="col"> No of Registered Elections</th>
                    </tr>
                  </thead>
                  <tbody class="table_body">
                   
                  </tbody>
                </table>
    </div>

    </main>
    <?php
      include('./assets/components/footer.php')
    ?>
    <script src="./assets/js/voters.js"></script>
    </body>
  </html>