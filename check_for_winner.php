<?php

    $hash = $_POST['hash'];
    
    $servername = "localhost";
    $username = "root";
    $password = "root";
 
    $conn = mysql_connect($servername, $username, $password)
    or die("\nUnable to connect to MySQL.\n");
 
    $selected = mysql_select_db("codeagon", $conn)
    or die("\nCould not select db.\n");
 
    $query = "SELECT winner FROM tbl_matches WHERE hash='".$hash."';";
    $result = mysql_query($query);
    $row = (mysql_fetch_row($result));
    echo $row[0];

?>
