<?php

   $this_user = $_POST['username'];

   $servername = "localhost";
   $username = "root";
   $password = "root";
 
   $conn = mysql_connect($servername, $username, $password)
   or die("\nUnable to connect to MySQL.\n");
 
   $selected = mysql_select_db("codeagon", $conn)
   or die("\nCould not select db.\n");
 
   $query = "DELETE FROM tbl_queue WHERE username='".$this_user."';";
 
   mysql_query($query, $conn);

?>
