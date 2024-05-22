<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Garden | offering a venue for users to discover recipes</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="./static/input.css"/>
    <link rel="stylesheet" href="./static/output.css"/>
</head>
<body class="inter-font">
    <?php
        include_once("./static/modules/header.php")
    ?>
    <section>
        <img alt="food banner" src="./static/images/food-banner.png" class="h-[70vh] w-full" />
    </section>
     <section class="w-[80%] container mx-auto my-10">
        <div class="grid justify-center my-3">
            <h2 class="inter-noto text-xl"> Collection List </h2>
            <div class="flex gap-1">
                <span class="material-symbols-outlined">
                    line_start
                </span>
                <span class="material-symbols-outlined">
                    diamond
                </span>
                <span class="material-symbols-outlined">
                    line_end
                </span>
            </div>
        </div>
        <div class="grid sm:grid-cols-4 gap-3 justify-center" id="collections">
		 <a href="./recipe-list.php?category=dinner">
                <div class="text-center space-y-2">
                    <img alt="Dinner" src="./static/images/dinner.jpg" class="w-[80%] h-[30vh] rounded-md"/>
                    <h3 class="font-bold inter-noto"> Dinner </h3>
                    <div><span>3</span> Recipes </div>
                </div>
            </a>
            <a href="./recipe-list.php?category=launch">
                <div class="space-y-2">
                    <img alt="Dinner" src="./static/images/launch.jpg" class="w-[80%] h-[30vh] rounded-md"/>
                    <h3 class="text-center font-bold inter-noto"> Launch </h3>
                    <div class="text-center"><span>4</span> Recipes </div>
                </div>
            </a>
            <a href="./recipe-list.php?category=breakfast">
                <div class="text-center space-y-2">
                    <img alt="Dinner" src="./static/images/breakfast.jpg" class="w-[80%] h-[30vh] rounded-md"/>
                    <h3 class="text-center font-bold inter-noto"> BreakFast </h3>
                    <div><span>3</span> Recipes </div>
                </div>
            </a>
            <a href="./recipe-list.php?category=desert">
                <div class="text-center space-y-2">
                    <img alt="Dinner" src="./static/images/desert.jpg" class="w-[80%] h-[30vh] rounded-md"/>
                    <h3 class="text-center font-bold inter-noto"> Desert </h3>
                    <div><span>10</span> Recipes </div>
                </div>
            </a>
        </div>
        <section class="w-[90%] container my-10 mx-auto">
            <div class="grid justify-center my-2 items-center">
                <h2 class="inter-noto "> Top Recipe </h2>
                <div class="flex gap-1">
                    <span class="material-symbols-outlined">
                        line_start
                    </span>
                    <span class="material-symbols-outlined">
                        diamond
                    </span>
                    <span class="material-symbols-outlined">
                        line_end
                    </span>
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-4 items-center justify-center">
                <div class="col-span-1 space-y-4">
                    <h3 class="text-3xl"> Sweet Potato</h3>
                    <ul>
                        <li class="flex items-center gap-2"> <span class="material-symbols-outlined">explosion </span> Potato with Unleavened Bread</li>
                        <li class="flex items-center gap-2"> <span class="material-symbols-outlined">explosion </span>  Healthy and Quick </li>
                        <li class="flex items-center gap-2"> <span class="material-symbols-outlined">explosion </span>  Colourful FlatBread </li>
                        <li class="flex items-center gap-2"> <span class="material-symbols-outlined">explosion </span>  Can Enjoy along side Dished</li>
                    </ul>
                    <a href="./recipe-detail.html"><button class="rounded-full border px-4 py-2" > View Recipe </button></a>
                </div>
                <img alt="top recipe" src="./static/images/sweet-potatoe.jpg" class="h-[80vh] rounded-2xl w-full md:col-span-2" />
            </div>
        </section>
        <section id="about-us" class="container max-w-[85%] gap-10 mx-auto grid justify-between ">
            <div class="bg-slate-600 rounded-2xl text-yellow-50 p-8">
                <h3 style="text-align: center; font-size: 3rem;">  About us </h3>
                <p>
            RecipeGarden is a web application designed for food enthusiasts, where users can browse recipes, filter by categories or type, and explore a wide range of recipes, it is particularly for users who want to learn or discover more about the variety of food recipes. 
The application caters to both recipe seekers and cooks/chefs, the cook/chefs can register a profile, upload their recipes with detailed instructions on how to prepare and add images or videos to share their knowledge and passion for food, meanwhile, the recipe seekers can browse recipes without having to register a profile, filter by categories and leave a review. in addition, an administrative user was created to manage the entire web application, including recipe review and management. 
            </p>
            </div>
        </section>
        <section id="contact-us" style="margin-block: 2rem;" class="container max-w-[85%] gap-10 mx-auto grid justify-between md:grid-cols-3">
            <div class="bg-slate-600 rounded-2xl text-yellow-50 col-span-1 p-8">
                <h3> Contact us </h3>
                <p>
                    <span class="block">Tel: +234 808 114 2881 </span>
                    <span class="block">Email:  i.adeosun@rgu.ac.uk </span>
                </p>
            </div>
            <form class="md:col-span-2 w-full space-y-5">
                <h3> Drop a Request </h3>
                <div class="flex items-center gap-2">
                    <span> Name (Required) </span>
                    <input class="rounded-full border" />
                </div>
                <div class="flex items-center gap-2">
                    <span> Email (Required) </span>
                    <input class="rounded-full border" />
                </div>
                <div class="flex items-center gap-2">
                    <span> Request (Required) </span>
                    <textarea class="rounded-full border"></textarea>
                </div>
            </form>
        </section>
    </section>
    <?php
      include_once("./static/modules/footer.php")
    ?>
    <script src="./static/script.js"></script>
    <script src="server-side/api/v1/scripts/get-collection.js"></script>
</body>
</html>
