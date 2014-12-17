<?php

    $login_name = $_POST['username'];
    $login_password = md5($_POST['password']);

    include './db.php';  
 
    $query = "SELECT * FROM tbl_users WHERE BINARY username='".$login_name."' AND password='".$login_password."';";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['name'] = $login_name;
        header("Location: ./account.php");
    } else {
        header("Location: ./noaccount.php");
    }

?>
