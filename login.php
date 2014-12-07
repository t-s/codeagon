<?php

   $servername = "localhost";
   $username = "root";
   $password = "root";

   $login_name = $_POST['username'];
   $login_password = md5($_POST['password']);

   $conn = mysql_connect($servername, $username, $password)
   or die("\nUnable to connect to MySQL.\n");

   $selected = mysql_select_db("codeagon", $conn)
   or die("\nCould not select db.\n");
   
   $query = "SELECT * FROM tbl_users WHERE username='".$login_name."' AND password='".$login_password."';";

    $result = mysql_query($query, $conn);
    if (mysql_num_rows($result) > 0) {
        session_start();
        $_SESSION['name'] = $login_name;
        header("Location: ./account.php");
    } else {
        header("Location: ./noaccount.php");
    }

?>
