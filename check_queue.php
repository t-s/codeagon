<?php
$this_username = $_POST['username'];
$this_language = $_POST['lang'];

$servername = "localhost";
$username = "root";
$password = "root";

$conn = mysql_connect($servername, $username, $password)
or die("\nUnable to connect to MySQL.\n");

$selected = mysql_select_db("codeagon", $conn)
or die("\nCould not select db.\n");

$query = "SELECT * FROM tbl_queue WHERE NOT username='".$this_username."' AND language='".$this_language."';";

$result = mysql_query($query, $conn);

$count = mysql_num_rows($result);

$opponent = mysql_result($result, 0);

if ($count > 0) {
    echo $opponent;
} else {
    echo "";
}
?>
