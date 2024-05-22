<?php 
    require("../../server.php");
    if (!isset($_SESSION['isAuthenticated'])) {
        header('Location: ../../login.php');
        exit();
    }
    if (isset($_POST['add_recipelist'])) {
        $user_id = isset($_SESSION["id"]) ? $_SESSION["id"]: '';
        $list_name = $conn->real_escape_string($_POST['list_name']);
        $result = $conn->query("INSERT INTO recipelist (list_name, user_id) VALUES ('$list_name', '$user_id')");

        exit('success');
    }
?>