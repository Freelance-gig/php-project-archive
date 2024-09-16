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
    <title> Election List Page </title>
  </head>
  <body class="ff-inria">
    <?php
      include('./assets/components/header.php')
    ?>
    <main class="container flow">
        <section class="grid mt-3 ">
            <div>
                <div class="search-container">
                        <input class="search-input" placeholder="Search for your upcoming elections" />
                        <i style="cursor: pointer;" onclick="window.location.href='./election-list.html'" class="fa fa-search fa-2xl" aria-hidden="true"></i>
                        <select  style="cursor: pointer;" name="location" id="location">
                            <option value="london">London </option>
                            <option value="switzerland"> Switzer land </option>
                        </select>
                </div>
                <div class="flex polling-unit-tab mt-2">
                    <span> Polling Unit 1</span>
                    <span> Polling Unit 2 </span>
                    <span> Polling Unit 2 </span>
                </div>
            </div>
        </section>
       
        <section>
        <?php
          if ($_SESSION['userType'] == 'officer' || $_SESSION['userType'] == 'admin' ) {
            echo (' <a href="./add-election.php"><button> Add Election </button></a>');
          }
        ?>
        </section>
        <div class="election-wrapper">
      
        </div>
    </main>
    <?php
      include('./assets/components/footer.php')
    ?>
    <script src="./assets/js/election.js"> </script>
    </body>
  </html>