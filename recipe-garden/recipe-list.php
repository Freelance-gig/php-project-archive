<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link rel="stylesheet" href="./static/input.css">
    <link rel="stylesheet" href="./static/output.css">

    <title>Recipe Garden | offering a venue for users to discover recipes</title>
</head>
<body class="inter-font">
    <?php 
        include_once("./static/modules/header.php")
    ?>
    <main class="container mx-auto grid justify-items-center md:grid-cols-3">
        <section class="md:col-span-1">
            <div>
                <fieldset>
                    <legend>Recipe Collections </legend>
                  
                    <div>
                      <input type="checkbox" id="launch" name="launch" checked />
                      <label for="launch">Launch</label>
                    </div>
                  
                    <div>
                      <input type="checkbox" id="dinner" name="dinner" />
                      <label for="dinner">Dinner</label>
                    </div>

                    <div>
                        <input type="checkbox" id="breakfast" name="breakfast" />
                        <label for="breakfast">BreakFast</label>
                    </div>
                    <div>
                        <input type="checkbox" id="desert" name="desert" />
                        <label for="desert">Desert</label>
                      </div>
                  </fieldset>
            </div>
        </section>
        <section class="md:col-span-2 flex flex-wrap gap-4"> 
            <!-- <div class="text-center space-y-2">
                <img alt="Dinner" src="./static/images/desert.jpg" class="w-[80%] h-[30vh] rounded-md"/>
                <span> Desert </span>
                <h3 class="text-center font-bold inter-noto"> Blueberry-Lemon Breakfast Cake </h3>
                <a href="./recipe-detail.html"><button class="rounded-full border px-4 py-2" > View Recipe </button></a>
            </div> -->
            <div class="text-center space-y-2">
                <img alt="Dinner" src="./static/images/desert.jpg" class="w-[80%] h-[30vh] rounded-md"/>
                <span> Desert </span>
                <h3 class="text-center font-bold inter-noto"> Whole Lemon Blender Cake </h3>
                <a href="./recipe-detail.html"><button class="rounded-full border px-4 py-2" > View Recipe </button></a>
                
            </div>
            <!-- <div class="text-center space-y-2">
                <img alt="Dinner" src="./static/images/desert.jpg" class="w-[80%] h-[30vh] rounded-md"/>
                <span> Desert </span>
                <h3 class="text-center font-bold inter-noto"> Cinnamon Toast Crunch Apple Dump Cake </h3>
                <a href="./recipe-detail.html"><button class="rounded-full border px-4 py-2" > View Recipe </button></a>
            </div>
            <div class="text-center space-y-2">
                <img alt="Dinner" src="./static/images/desert.jpg" class="w-[80%] h-[30vh] rounded-md"/>
                <span> Desert </span>
    
                <h3 class="text-center font-bold inter-noto"> Cinnamon Toast Crunch Apple Dump Cake </h3>
                <a href="./recipe-detail.html"><button class="rounded-full border px-4 py-2" > View Recipe </button></a>

            </div>   -->
        </section>
    </main>
    <?php 
      include_once("./static/modules/footer.php")
    ?>

</body>
</html>