<?php
                                                                                                                                                     
    $hash = $_POST['hash'];                                                                                                                          
    $bad_user = $_POST['user']; 

    $servername = "localhost";
    $username = "root";
    $password = "root";
 
    $conn = mysql_connect($servername, $username, $password)
    or die("\nUnable to connect to MySQL.\n");
 
    $selected = mysql_select_db("codeagon", $conn)
    or die("\nCould not select db.\n");

    $query = "SELECT player1, player2 FROM tbl_matches WHERE hash='".$hash."';";
    $result = mysql_query($query);
    $row = (mysql_fetch_row($result));
    if ($row[1] == $bad_user) {
        $good_user = $row[0];
    } else {
        $good_user = $row[1];
    }
 
    $query = "UPDATE tbl_matches SET winner='".$good_user."' WHERE hash='".$hash."';";                                                                        $result = mysql_query($query);                                                                                                                   

    $query = "UPDATE tbl_users SET score=score+100 WHERE username='".$good_user."';"; 
    $result = mysql_query($query);
?>
