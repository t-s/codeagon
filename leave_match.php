 <?php
 
   $this_user = $_POST['username'];
 
   include './db.php';
 
   $query = "UPDATE tbl_queue SET finished = '1'  WHERE username='".$this_user."';";
 
   mysql_query($conn, $query);
 
?>
