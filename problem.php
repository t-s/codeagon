<?php

    include './db.php';
 
    $query = "SELECT * FROM tbl_problems WHERE id=".$pr_id.";";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
   
    echo "<h5 align=center style='font-family: Source Code Pro; margin-top: -20px; color: white;'>".$row[1]."</h5>";
    echo "<h6 align=center style='font-family: Source Code Pro; margin-top: -10px; color: white;'>Code is automatically printed, do not use print statements.</h6>";
    echo "<p style='display:none;' id='problem_id'>".$row[0]."</p>";

?>
