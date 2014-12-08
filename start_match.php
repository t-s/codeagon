<?php


   $this_user = $_POST['username'];
   $this_opponent = $_POST['opponent'];
   $lang = $_POST['lang'];
 
   $servername = "localhost";
   $username = "root";
   $password = "root";
 
   $conn = mysql_connect($servername, $username, $password)
   or die("\nUnable to connect to MySQL.\n");
 
   $selected = mysql_select_db("codeagon", $conn)
   or die("\nCould not select db.\n");
 
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

   $query = "SELECT hash FROM tbl_matches WHERE hash='".$player_hash."';";
   $result = mysql_query($query, $conn);
   $count = mysql_num_rows($result);
   if ($count < 1) {
       $query = "SELECT * FROM tbl_problems ORDER BY RAND() LIMIT 1;";
       $result = mysql_query($query);
       $row = mysql_fetch_row($result);
       $problem_id = $row[0];
       $lock_query = "LOCK TABLES tbl_matches READ;";
       //mysql_query($lock_query);
       $time = date('Y-m-d G:i:s');
       $query = "INSERT into tbl_matches (problem_id, player1, player2, language, hash, timestamp) VALUES ('".$problem_id."','".$player1."','".$player2."','".$lang."', '".$player_hash."', '".$time."');";
       mysql_query($query, $conn);
       $lock_query = "UNLOCK TABLES;";
       //mysql_query($lock_query);
       echo mysql_error();
   }

?>
