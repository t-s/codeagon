<?php
                                                                                                                                                     
    $hash = $_POST['hash'];                                                                                                                          
    $user = $_POST['user']; 

    $servername = "localhost";
    $username = "root";
    $password = "root";
 
    $conn = mysql_connect($servername, $username, $password)
    or die("\nUnable to connect to MySQL.\n");
 
    $selected = mysql_select_db("codeagon", $conn)
    or die("\nCould not select db.\n");
 
    $query = "UPDATE tbl_matches SET winner='".$user."' WHERE hash='".$hash."';";                                                                        $result = mysql_query($query);                                                                                                                   

    $query = "UPDATE tbl_users SET score=score+100 WHERE username='".$user."';"; 
    $result2 = mysql_query($query);
?>
