<?php 
    session_start();
    if (isset($_SESSION['id'])) {
      header('Location: index.php');
      exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./static/input.css">
    <link rel="stylesheet" href="./static/output.css">
    <title> Register as A Recipe Owner </title>
</head>
<body>
    <section class="bg-[#ececec] py-[20px]">
        <div class="container mx-auto flex justify-center items-center h-[100vh]">
            <div class="row w-[90%] md:w-[900px] h-[700px] bg-white shadow-md rounded-md">
                <div class="
                col-md-6
                bg-[url('./images/login.jpg')]
                bg-center
                bg-no-repeat
                bg-cover
                rounded
                ">
                
                </div>
                <div class="col-md-6 flex   flex-col items-center relative">
                    <a href="./index.php" class="flex justify-center gap-3">
                        <span class="material-symbols-outlined">
                        keyboard_backspace
                        </span>    
                        <button class="self-start">
                            Back home
                        </button>
                    </a>

                    <div class="flex  w-full justify-center items-center relative">
                        <div class="w-full">
                            <h2 class="font-extrabold text-center mb-[3rem]"> Create an Account </h2>
                            <div> You Already have an account. Click <a href="./signin.php"> Here </a> to sign in </div>
                            
                            <div class="flex flex-col relative py-[1rem]">
                    
                                <!-- <label class="absolute peer-focus:top[-10px] peer-focus:font-[13px] top-[10px] left-[10px] pointer-events-none duration-75" for="email"> Email </label> -->
                                <input type="email" class="h-[45px] w-full
                                bg-transparent  border-b-2 
                                border-[rgba(0,0,0,0.2)] outline-none
                                text-[#40414a]
                                peer
                                " id="email" 
                                placeholder="Email"
                                autocomplete="off" required/>
                                <p class="mt-2 invisible peer-invalid:visible  text-pink-600 text-sm">
                                    Please provide a valid email address.
                                </p>

                              
                            </div>
                            <div class="flex flex-col relative py-[1rem]">
                    
                                <!-- <label class="absolute peer-focus:top[-10px] peer-focus:font-[13px] top-[10px] left-[10px] pointer-events-none duration-75" for="firstname"> First Name </label> -->
                                <input type="text"
                                placeholder="First Name"
                                class="h-[45px] w-full
                                bg-transparent  border-b-2 
                                border-[rgba(0,0,0,0.2)] outline-none
                                text-[#40414a]
                                peer
                                " id="firstname" autocomplete="off" required/>
                                <p class="mt-2 invisible peer-invalid:visible  text-pink-600 text-sm">
                                    Please provide a Name
                                </p>

                            
                            </div>
                            <div class="flex flex-col relative py-[1rem]">
                    
                                <!-- <label class="absolute peer-focus:top[-10px] peer-focus:font-[13px] top-[10px] left-[10px] pointer-events-none duration-75" for="lastname"> Last Name </label> -->
                                <input type="text" class="h-[45px] w-full
                                bg-transparent  border-b-2 
                                border-[rgba(0,0,0,0.2)] outline-none
                                text-[#40414a]
                                peer
                                "
                                placeholder="Enter Last Name"
                                id="lastname" autocomplete="off" required/>
                                <p class="mt-2 invisible peer-invalid:visible  text-pink-600 text-sm">
                                    Please provide a Name
                                </p>

                            
                            </div>
                            <label for="user_role">Choose a User Role</label>

                            <select name="user_role" id="user_role">
                                <option value="">--Please choose an option--</option>
                                <option value="admin">Admin</option>
                                <option value="cook">Cook</option>
                            </select>

                            <div class="flex flex-col relative py-[1rem]">
                    
                                <label class="absolute peer-focus:top[-10px] peer-focus:font-[13px] top-[10px] left-[10px] pointer-events-none duration-75" for="password"> Password </label>
                                <input type="password" class="h-[45px] w-full
                                bg-transparent  border-b-2 
                                border-[rgba(0,0,0,0.2)] outline-none
                                text-[#40414a]
                                peer
                                " id="password" autocomplete="off" required/>
                                <p class="mt-2 invisible peer-invalid:visible  text-pink-600 text-sm">
                                    Please provide a password.
                                </p>
                            </div>
                            <div class="flex flex-col relative py-[1rem]">
                    
                                <label class="absolute peer-focus:top[-10px] peer-focus:font-[13px] top-[10px] left-[10px] pointer-events-none duration-75" for="con_password"> Confirm Password </label>
                                <input type="password" class="h-[45px] w-full
                                bg-transparent  border-b-2 
                                border-[rgba(0,0,0,0.2)] outline-none
                                text-[#40414a]
                                peer
                                " id="con_password" autocomplete="off" required/>
                                <p class="mt-2 invisible peer-invalid:visible  text-pink-600 text-sm">
                                    Please confirm password.
                                </p>
                            </div>
                            <button id="register-btn" class="rounded-full border px-4 py-2" > Register </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="./server-side/api/v1/scripts/register.js"> </script>

</body>
</html>