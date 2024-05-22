<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Name</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"</head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<body>
    <!-- BODY HEADER -->
    <header id="nav-head" style="background-color: #F1EAFF">
        <?php 
                include('./shared/nav.php')
            ?>
    </header>
    
    <!-- BODY MAIN SECTION -->
    <main class="mt-5">
        <!-- LIST OF RECIPE -->
        <?php 
        if (isset($_SESSION['isAuthenticated'])) {
        
        echo ' 
        <div id="login-form-wrap" style="margin-top: 100px;">
            <h2> Add Recipe Collection </h2>
            <form id="login-form d-flex">
                <p>
                    <input type="text" id="list_name" name="list_name" placeholder="Enter Recipe Collection" required><i class="validation"><span></span><span></span></i>
                </p>
                <p>
                    <input type="button" id="add-recipelist-btn" value="Add Recipe Collection" style="background-color: #910A67; color: #fff;">
                </p>
            </form>
        </div>';
        }

        ?>
            <div id="recipelist-container">
    
            </div>
        </div>
        <!-- FREQUENTLY ASKED QUESTIONS -->
        <div id='faq'>
            <h1 style="text-align: center;">Frequently Asked Questions</h1>
            <div class="faq-item">
                <div class="question" onclick="toggleAnswer('faq1')">
                    <h6>How can I find delivery restaurant around me?<span class="dropdown-icon">&#9660;</span></h6>
                    <div class="answer" id="faq1">Answer</div>
                </div>
            </div>
                
            <div class="faq-item">
                <div class="question" onclick="toggleAnswer('faq2')">
                    <h6>Can I order food with app?<span class="dropdown-icon">&#9660;</span></h6>
                    <div class="answer" id="faq2">Answer</div>
                </div>
            </div>
        </div>  

    </main>

      <!-- FOOTER -->
      <?php 
            include('./shared/footer.php')
        ?>
        <!-- JAVA SCRIPT LINK -->
        <?php 
            include('./shared/footer_links.php')
        ?>
        <script src="./backend/scripts/add-recipelist.js"> </script>
        <script src="./backend/scripts/view-recipelist.js"> </script>

</body>
</html>
