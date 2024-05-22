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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="./static/input.css">
    <link rel="stylesheet" href="./static/output.css">
    <title>Recipe Detail Page</title>
    
</head>
<body>
    <?php 
        include_once("./static/modules/header.php")
    ?>
    <main class="grid md:grid-cols-2 container mx-auto gap-3 max-w-[80%]">
        <div class="flex flex-col-reverse md:flex-row items-center gap-4">
            <div class="grid gap-3">
                <button> 
                    <img src="./static/images/desert.jpg" class="w-[100px]"/>
                </button>
                <button> 
                    <img src="./static/images/dinner.jpg" class="w-[100px]"/>
                </button>
            </div>
            <img 
                src="./static/images/sweet-potatoe.jpg" class="w-[400px]"
            />
        </div>
        <div class="space-y-6">
            <div>
                <h4> Recipe Name </h4>
                <span> Desert </span>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Inventore aperiam nisi reprehenderit impedit quasi laboriosam quos, 
                    consequuntur repellat eligendi harum sapiente voluptatibus fugiat! 
                    Illo magnam amet itaque. Qui, nostrum reiciendis!
                </p>
                <div>
                    <button class="rounded-full border px-4 py-2 bg-black text-white" > Edit </button>
                    <button class="rounded-full border px-4 py-2" > Delete </button>
                </div>
            </div>
            <div class="accordion accordion-flush" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Ingredients
                    </button>
                  </h2>
                  <div id="collapseOne" class=" visible show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body text-black">
                        <div> Hello</div>
                        <ul>
                            <li> Olive Oil</li>
                        </ul>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      step-by-step
                    </button>
                  </h2>
                  <div id="collapseTwo" class="visible" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                Boil for 30 mins
                            </li>
                        </ul>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </main>

    <?php 
      include_once("./static/modules/footer.php")
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>