<?php

    $this_name = $_SESSION['name'];

    include './db.php';

    $query = "SELECT player1, player2 FROM tbl_matches WHERE player1='".$this_name."' OR player2='".$this_name."';";
    $result = mysqli_query($conn, $query);
    $row = (mysqli_fetch_row($result));
    
    if ($row[0] == $this_name) {
        $opponent = $row[1];
    } else {
        $opponent = $row[0];
    }
    
    echo "Your opponent: ".$opponent;
    echo "<br>";
    echo "<img src='./avatars/".$opponent.".jpg'>";

?>
