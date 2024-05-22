<?php 
    include_once('./controllers/admin.php');
    $login = new AdminController;
    if (isset($_POST['logout-btn'])) {
        // $checkLoggedOut = $login->logout();
        redirect("I got here", "about-us.php");
        if ($checkLoggedOut) {
            redirect("Logged Out Successfully", "login.php");
        }
    }

    if(isset($_POST['register-btn'])) {
        $fullname = validateInput($db->conn, $_POST['fullname']);
        $email = validateInput($db->conn, $_POST['email']);
        $password = validateInput($db->conn, $_POST['password']);
        $confirm_password = validateInput($db->conn, $_POST['confirm_password']);
        $register = new AdminController;
        $result_password  = $register->confirmPassword($password, $confirm_password);
        
        if (!$email || !$password) {
            redirect("Email and Password is required", "signup.php");
        }
        if ($result_password) {
            $result_user = $register->isAdminExists($email);
            if ($redirect_user) {
                redirect("Already Email Exists", "signup.php");
            } else {
                $register_user = $register->createAdmin($fullname, $email, $password);
                if ($register_user) {
                    redirect("Registered Successfully", "login.php");
                } else {
                    redirect("Somethin went wrong in the server", "signup.php");
                }
            }
        } else {
            redirect("Password and Confirm Password does not match", "signup.php");
        }
    
    }

  
    if (isset($_POST['login-btn'])) {
        $email = validateInput($db->conn, $_POST['email']);
        $password = validateInput($db->conn, $_POST['password']);

        if (!$email || !$password) {
            redirect("Email and Password is required", "login.php");
        }
        $checkLogin = $login->adminLogin($email, $password);

        if ($checkLogin) {
            redirect("Logged In Succefully", "recipes.php");
        }   else {
            redirect("Invalid Email or Password", "login.php");
        }
    }
?>