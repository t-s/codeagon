<?php

    $this_username = $_POST['username'];
    $this_language = $_POST['lang'];

    include './db.php';

    $query = "SELECT * FROM tbl_queue WHERE NOT username='".$this_username."' AND language='".$this_language."';";

    $result = mysqli_query($conn, $query);

    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $opponent = mysqli_fetch_row($result)[0];
        echo $opponent;
    } else {
        echo "";
    }

?>
