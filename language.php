<?php

    $servername = "localhost";
    $username = "root";
    $password = "root";
 
    $conn = mysql_connect($servername, $username, $password)
    or die("\nUnable to connect to MySQL.\n");
 
    $selected = mysql_select_db("codeagon", $conn)
    or die("\nCould not select db.\n");
 
    $this_name = $_SESSION['name'];
    $query = "SELECT language FROM tbl_matches WHERE player1='".$this_name."' OR player2='".$this_name."' LIMIT 1;";
    $result = mysql_query($query);
    $row = (mysql_fetch_row($result));
    $lang = ucfirst($row[0]);

?>
