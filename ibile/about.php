<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">
    <title>About Ibile </title>
</head>
<body>
        <!-- Header section--> 
    <header class="container">
        <?php 
            include('./assets/components/navbar.php')
        ?>
    </header>
    <main>
        <section>
            <p> OUR GOALS</p>
            <h2> The common spirit characterizes us </2>
            <p> We have a goal; to bring together culture and tradition through food - a common spirit. Each dish tells a story, <br/> 
                carrying with it the history, values and customs of the people who created it. Our goal is to curate a wide range of recipes as possible.
            </p>
        </section>
        <section>
            <div> 
                <img />
                <h3> Open to new ways </h3>
                <p> New ways brign new  Food </p>
            </div>
        </section>
    </main>
    <?php 
        include('./assets/components/footer.php');
    ?>
</body>
</html>