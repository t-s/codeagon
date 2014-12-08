<?php

    $servername = "localhost";
    $username = "root";
    $password = "root";
 
    $conn = mysql_connect($servername, $username, $password)                                                                                         
    or die("\nUnable to connect to MySQL.\n");
 
    $selected = mysql_select_db("codeagon", $conn)
    or die("\nCould not select db.\n");
 
    $query = "SELECT * FROM tbl_problems WHERE id=".$pr_id.";";
    $result = mysql_query($query);
    $row = mysql_fetch_row($result);
   
    echo "<h5 align=center style='font-family: Source Code Pro; margin-top: -20px; color: white;'>".$row[1]."</h5>";
    echo "<p style='display:none;' id='problem_id'>".$row[0]."</p>";

?>
