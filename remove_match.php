<?php

    $hash = $_POST['hash'];
    
    include './db.php';
 
    $query = "SELECT winner FROM tbl_matches WHERE hash='".$hash."';";
    $result = mysqli_query($conn, $query);
    $row = (mysqli_fetch_row($result));
    echo $row[0];
    if ($row[0] != "") {
        $query = "DELETE FROM tbl_matches WHERE hash='".$hash."';";
        mysqli_query($conn, $query);
    } 

?>
