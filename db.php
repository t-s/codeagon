<?php

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);
    $conn = mysql_connect($server, $username, $password)
    or die("\nUnable to connect to MySQL.\n");
    $selected = mysql_select_db($db, $conn)
    or die("\nCould not select db.\n");

?>
