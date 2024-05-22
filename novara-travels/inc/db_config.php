<?php
    session_start();
    $db_server_name =  'localhost';
    $db_username = 'nosa';
    $db_password = 'password';
    $db_name = 'novaradb';

    $con = mysqli_connect($db_server_name, $db_username, $db_password, $db_name);

    if(!$con) {
        die("Cannot connect to Database".mysqli_connect_error());
    };


    // Sanitize inputs to prevent Web attacks
    function filteration($data) {
        foreach($data as $key => $value) {
            $data[$key] = trim($value);
            $data[$key] = stripcslashes($value);
            $data[$key] = htmlspecialchars($value);
            $data[$key] = strip_tags($value);
        }
        return $data;
    }

    function select($sql, $values, $datatypes) {
        $con = $GLOBALS['con'];
        if( $stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if(mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_get_result($stmt);
                // echo $res;
                mysqli_stmt_close($stmt);
                return $res;
            } else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed ");
            }
        } else {
            die('Query cannot be prepared - Select');
        }
    }
