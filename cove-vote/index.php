<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/main.css">
    <title>Home Page</title>
  </head>
  <body class="ff-inria">
    <?php
      include('./assets/components/header.php')
    ?>
    <main class="flow">
      <section class="image-section">
        <div class="image-slider">
            <img src="./assets/imgs/projects.png" class="active" />
            <img src="./assets/imgs/bg-1.jpg"/>
            <img src="./assets/imgs/bg-2.jpg"/>

        </div>
        <div style="display:flex;justify-content:center;gap: 3rem; margin-top: 35vh;">
          <i class=" navicon left fa-solid fa-circle-chevron-left"></i>
          <i class=" navicon right fa-solid fa-circle-chevron-right"></i>
        </div>
        <div class="container election-search flow">
        <div class=" gap-1">
            <label for="location" class="form-label"> Election Location </label>
            <select id="location" class="form-select w-content" aria-label="Default select example" required>
              <option selected>Open this select menu</option>
              <option value="england"> England </option>
              <option value="scotland"> Scotland </option>
              <option value="wales"> Wales </option>
              <option value="ireland"> Northern Ireland </option>
              <option value="outside"> Outside Britian </option>
            </select>
          </div>
          <div class=" gap-1">
            <label for="polling_unit" class="form-label"> Election Polling Unit </label>
            <select  id="polling_unit" class="form-select w-content" aria-label="Default select example" required>
              <option selected>Open this select menu</option>
              <option value="polling_unit_A"> Polling Unit A</option>
              <option value="polling_unit_b"> Polling Unit B </option>
              <option value="polling_unit_c"> Polling Unit C </option>
            </select>
          </div>
          <div>
          <button id="form-search-button"> Search </button>
        </div>
        </div>
      </section>
      <section class="container">
        <h2 class="main-title"> Upcoming Elections </h2>
        <div class="election-wrapper">
        </div>

      </section>
      <section class="container">
        <button> <a href="./voters-list.php">  Check Voters list </a> </button>
        <button> <a href="./election-list.php">  Check Upcoming Election list </a> </button>

      </section>
      <section class="container flow" id="about-us">
      <div>
        <h2> About Us </h2>
        <p> Cove Vote is an innovative and user-friendly online voting platform designed specifically for school projects, elections, and other collaborative decision-making activities. Our mission is to make the voting process simple, transparent, and efficient for students, teachers, and administrators alike.
        </p>
      </div>
      <div>
        <div> 
            <h3> Our Mission </h3>
            <p> At Cove Vote, our mission is to empower students and educators by providing a reliable and accessible platform for conducting votes. We believe that every voice matters and that a fair and democratic process can enhance the learning experience and foster a sense of community and engagement within the school. </p>
        </div>
      </div>
      </section>
      <section id="contact-us" class="container flow">
        <div>
          <h2> Contact Us </h2>
          <p> We’d love to hear from you! Whether you have questions, feedback, or need assistance, the Cove Vote team is here to help</p>
        </div>
        <form>
        <div class="d-grid gap-1">
                    <label class="form-label"> E-mail </label>
                    <input  id="email" placeholder="Enter Email" type="email" required class="form-control" />
            </div>
            <button  type="button" class="button rounded shadow-sm"> Submit </button>

        </form>
      </section>
    </main>
    <?php
      include('./assets/components/footer.php')
    ?>
    <script src="./assets/js/election.js"> </script>
  </body>
</html>