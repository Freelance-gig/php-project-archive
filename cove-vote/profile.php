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
    <title> Profile Page </title>
  </head>
  <body class="ff-inria">
  <?php
      include('./assets/components/header.php')
    ?>
     <main class="container mx-auto">
        
        <!-- User Profile Page -  -->
            <section class="d-flex gap-3 my-5">
                <!-- <img class="rounded border border-3" src="./public/img/charles.jpg" style="width: 30%; height: 20%; object-fit: contain;" /> -->
                <div class="d-grid">
                  <?php 
                  echo '<h2>'. $_SESSION['firstname'] .'</h2>';
  
                  echo '<span>'. $_SESSION['userType']. '</span';
                  ?>
                </div>
            </section>

            <?php 
              if ($_SESSION['userType'] == 'admin') {
                echo '
                <!-- Admin Profile -->
                <section class="accordion my-5" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                          Total Number of Voters : <span class="voter_no"> <span>
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">No of Registerd Election</th>
                                  </tr>
                                </thead>
                                <tbody class="table_body">
                   
                                </tbody>
                              </table>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Total Number of Officers: <span class="officer_no"> <span>
                          </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                          <div class="accordion-body">
                              <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">First</th>
                                      <th scope="col">Last</th>
                                      <th scope="col">Handle</th>
                                    </tr>
                                  </thead>
                                  <tbody class="table_officer_body">
                                
                                  </tbody>
                                </table>
                          </div>
                        </div>
                      </div>
                </section>
                ';
              }

              if ($_SESSION['userType'] == 'officer') {
                echo '
                <!-- Officer Profile -->
                <section class="accordion my-5" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Total Number of Voters : <span class="voter_no"> <span>
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                  <div class="accordion-body">
                      <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">First Name</th>
                              <th scope="col">Last Name</th>
                              <th scope="col">No of Registerd Election</th>
                            </tr>
                          </thead>
                          <tbody class="table_body">
             
                          </tbody>
                        </table>
                  </div>
                </div>
              </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                          Total Number of Elections: <span class="election_no"> 1 <span>
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Polling Unit</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Uk Prime Minister</td>
                                    <td>England</td>
                                    <td>Polling Unit A</td>
                                  </tr>
                                                                </tbody>
                              </table>
                        </div>
                      </div>
                    </div>
                </section>
                ';
              }
              if ($_SESSION['userType'] == 'voter') {
                  echo ' 
                  <!-- Seeker Profile -->
                  <section class="accordion my-5" id="accordionPanelsStayOpenExample">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Total Number of Elections Registered For: 12
                          </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                          <div class="accordion-body">
                              <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">First</th>
                                      <th scope="col">Last</th>
                                      <th scope="col">Handle</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="row">1</th>
                                      <td>Mark</td>
                                      <td>Otto</td>
                                      <td>@mdo</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">2</th>
                                      <td>Jacob</td>
                                      <td>Thornton</td>
                                      <td>@fat</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">3</th>
                                      <td colspan="2">Larry the Bird</td>
                                      <td>@twitter</td>
                                    </tr>
                                  </tbody>
                                </table>
                          </div>
                        </div>
                      </div>
                  </section>
             ';
              }

            ?>
   
    
        </main>
    <?php
      include('./assets/components/footer.php')
    ?>
    <script src="./assets/js/voters.js"> </script>
    <script src="./assets/js/election.js"> </script>
    </body>
  </html>