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
    <title> Election Details Page</title>
  </head>
  <body class="ff-inria">
  <?php
      include('./assets/components/header.php')
    ?>
    <main class="container">
      <section>
        <h2> Prime Minister Election </h2>
        <span> Polling Unit 1 </span>
        <div class="flex">
        <img src="./assets/imgs/vote-icon.png" /> <span> Total Registered Voter </span>   <span> 30</span>
        </div>
        <?php 
          if ($_SESSION['userType'] == 'officer' || $_SESSION['userType'] == 'admin' ) {
            echo (' <a href="./add-voter.php"><button> Add Voter </button></a>');
          }
          ?>
      </section>
      <section class="accordion my-5" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
            Votes for each candidate
          </button>
        </h2>

        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
          <div class="accordion-body">
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col" colspan="2">Candidate</th>
                      <th scope="col"> Political Party</th>
                      <th scope="col">Votes</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>Labour Group </td>
                      <td>23</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>Conservative Group</td>
                      <td>4</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Larry </td>
                      <td>Bird </td>
                      <td>Liberal Democrats Group</td>
                      <td>2</td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Larry </td>
                      <td>Bird </td>
                      <td>Independent Group</td>
                      <td>2</td>
                    </tr>
                  </tbody>
                </table>
          </div>
        </div>
      </div>
      </section>
    </main>
    <?php
      include('./assets/components/footer.php')
    ?>
    </body>
  </html>