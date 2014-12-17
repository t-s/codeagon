<?php
   
    $hash = $_POST['hash'];
    $bad_user = $_POST['user']; 

    include './db.php';

    $query = "SELECT player1, player2 FROM tbl_matches WHERE hash='".$hash."';";
    $result = mysqli_query($conn, $query);
    $row = (mysqli_fetch_row($result));
    if ($row[1] == $bad_user) {
        $good_user = $row[0];
    } else {
        $good_user = $row[1];
    }
 
    $query = "UPDATE tbl_matches SET winner='".$good_user."' WHERE hash='".$hash."';";                                                                        
    $result = mysqli_query($conn, $query);                                                                                                                   

    $query = "UPDATE tbl_users SET score=score+100 WHERE username='".$good_user."';"; 
    $result = mysqli_query($conn, $query);

?>
