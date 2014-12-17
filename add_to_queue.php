<?php

   include './db.php';

   $this_user = $_POST['username'];
   $lang = $_POST['lang'];

   $query = "INSERT into tbl_queue (username, language) VALUES ('".$this_user."','".$lang."')";
 
   mysqli_query($conn, $query);

?>
