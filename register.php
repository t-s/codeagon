<?php


    $register_name = $_POST['user_name'];
    $register_password = md5($_POST['password']);

    include './db.php'; 
 
    $query = "INSERT into tbl_users (username, password) VALUES ('".$register_name."','".$register_password."')";

    mysqli_query($conn, $query);

    $url = "http://lorempixel.com/150/150/cats/".$register_name;
    $img = "./avatars/".$register_name.".jpg";
    file_put_contents($img, file_get_contents($url));

    session_start();
    $_SESSION['name'] = $register_name;
    header("Location: ./account.php");

?>
