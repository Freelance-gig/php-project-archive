<?php 
  include('serverfiles/app.php');

  class AdminController {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function createAdmin($fullname, $email, $password) {
        $query = "INSERT INTO admins (fullname, email, password) VALUES ('$fullname', '$email', '$password')";
        $result = $this->conn->query($query);
        return $result;
    }

    public function isAdminExists($email) {
        $checkUserQuery = "SELECT email FROM admins WHERE email='$email' LIMIT 1";
        $result = $this->conn->query($checkUserQuery);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function confirmPassword($password, $confirm_password) {
        {
            if ($password === $confirm_password) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function adminLogin($email, $password) {
        echo $password;
        $checkLogin = "SELECT * FROM admins WHERE email='$email' AND `password`='$password' LIMIT 1";
        $result = $this->conn->query($checkLogin);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $this->adminAuthentication($data);
            return true;
        } else {
            return false;
        }
    }

    public function adminAuthentication($data) {
        $_SESSION['authenticated'] = true;
        $_SESSION['auth_user'] = [
            'user_id' => $data['admin_id'],
            'fullname' => $data['fullname'],
            'user_role' => 'admin'
        ]; 
    }

    public function isLoggedIn () {
        if(isset($_SESSION['authenticated']) === TRUE) {
            redirect('You are already Logged IN', 'index.php');
        } else {
            return false;
        }
    }

    public function logout () {
        if (isset($_SESSION['authenticated']) === TRUE) {
            unset($_SESSION['authenticated']);
            unset($_SESSION['auth_user']);
            return true;
        } else {
            return false;
        }

    }
  }
?>