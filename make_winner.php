<?php

    $hash = $_POST['hash'];
    $user = $_POST['user']; 

    include './db.php';
 
    $query = "UPDATE tbl_matches SET winner='".$user."' WHERE hash='".$hash."';";
    $result = mysqli_query($conn, $query);
                                                 
    $query = "UPDATE tbl_users SET score=score+100 WHERE username='".$user."';";
    $result2 = mysqli_query($conn, $query);

?>
