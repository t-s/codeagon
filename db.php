<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);
    $conn = mysqli_connect($server, $username, $password) or die("\nUnable to connect to MySQL.\n");
    $selected = mysqli_select_db($conn, $db) or die("\nCould not select db.\n");
    
?>
