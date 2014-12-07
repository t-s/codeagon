<?php

    $servername = "localhost";
    $username = "root";
    $password = "root";
 
    $conn = mysql_connect($servername, $username, $password)
    or die("\nUnable to connect to MySQL.\n");
 
    $selected = mysql_select_db("codeagon", $conn)
    or die("\nCould not select db.\n");

    $this_name = $_SESSION['name'];
    $query = "SELECT player1, player2 FROM tbl_matches WHERE player1='".$this_name."' OR player2='".$this_name."';";
    $result = mysql_query($query);
    $row = (mysql_fetch_row($result));
    if ($row[0] == $this_name) {
        $opponent = $row[1];
    } else {
        $opponent = $row[0];
    }
    echo "Your opponent: ".$opponent;
    echo "<br>";
    echo "<img src='./avatars/".$opponent.".jpg'>";
?>
