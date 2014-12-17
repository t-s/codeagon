<?php


   $this_user = $_POST['username'];
   $this_opponent = $_POST['opponent'];
   $lang = $_POST['lang'];
 
   $alpha = strcasecmp($this_user,$this_opponent);
   $player1 = "";
   $player2 = "";
   $player_str = "";
   if ($alpha < 0) {
       $player1 = $this_user;
       $player2 = $this_opponent;  
   } else {
       $player1 = $this_opponent;
       $player2 = $this_user;
   }  

   $player_str = $player1.$player2;
   $player_hash = md5($player_str);

   include './db.php';

   $query = "SELECT hash FROM tbl_matches WHERE hash='".$player_hash."';";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);

   if ($count < 1) {
       $query = "SELECT * FROM tbl_problems ORDER BY RAND() LIMIT 1;";
       $result = mysqli_query($query);
       $row = mysqli_fetch_row($result);
       $problem_id = $row[0];
       $lock_query = "LOCK TABLES tbl_matches READ;";
       //mysql_query($lock_query);
       $time = date('Y-m-d G:i:s');
       $query = "INSERT into tbl_matches (problem_id, player1, player2, language, hash, timestamp) VALUES ('".$problem_id."','".$player1."','".$player2."','".$lang."', '".$player_hash."', '".$time."');";
       mysqli_query($conn, $query);
       $lock_query = "UNLOCK TABLES;";
       //mysql_query($lock_query);
   }

?>
