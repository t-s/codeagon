<?php

   $servername = "localhost";
   $username = "root";
   $password = "root";

   $register_name = $_POST['user_name'];
   $register_password = md5($_POST['password']);

   $conn = mysql_connect($servername, $username, $password)
   or die("\nUnable to connect to MySQL.\n");

   $selected = mysql_select_db("codeagon", $conn)
   or die("\nCould not select db.\n");
   
   $query = "INSERT into tbl_users (username, password) VALUES ('".$register_name."','".$register_password."')";

    mysql_query($query, $conn);
    echo mysql_error($conn);

    $url = "http://lorempixel.com/150/150/cats/".$register_name;
    $img = "./avatars/".$register_name.".jpg";
    file_put_contents($img, file_get_contents($url));

    session_start();
    $_SESSION['name'] = $register_name;
    header("Location: ./account.php");
?>
