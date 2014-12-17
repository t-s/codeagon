<?php

    include './db.php';

    $this_name = $_SESSION['name'];
    $query = "SELECT language, problem_id, hash FROM tbl_matches WHERE player1='".$this_name."' OR player2='".$this_name."' LIMIT 1;";
    $result = mysqli_query($conn, $query);
    $row = (mysqli_fetch_row($result));
    $lang = ucfirst($row[0]);
    $pr_id = $row[1];
    $match_hash = $row[2];

?>
