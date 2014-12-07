<?php


   $this_user = $_POST['username'];
   $lang = $_POST['lang'];
 
   $servername = "localhost";
   $username = "root";
   $password = "root";
 
   $conn = mysql_connect($servername, $username, $password)
   or die("\nUnable to connect to MySQL.\n");
 
   $selected = mysql_select_db("codeagon", $conn)
   or die("\nCould not select db.\n");
 
   $query = "INSERT into tbl_queue (username, language) VALUES ('".$this_user."','".$lang."')";
 
    mysql_query($query, $conn);
    echo mysql_error($conn);

?>
