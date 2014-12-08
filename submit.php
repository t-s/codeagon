<?php

    $code = $_POST['code'];
    $id = $_POST['id'];
    $file_num = rand();
    $in_file = "./proc/".$file_num.".in";
    $out_file = "./proc/".$file_num.".out";
    file_put_contents($in_file, "print ".$code);
    system("pypy-sandbox --tmp=./ ".$in_file." > ".$out_file);

    $servername = "localhost";
    $username = "root";
    $password = "root";
 
    $conn = mysql_connect($servername, $username, $password)
    or die("\nUnable to connect to MySQL.\n");
 
    $selected = mysql_select_db("codeagon", $conn)
    or die("\nCould not select db.\n");
 
    $query = "SELECT answer FROM tbl_problems WHERE id=".$id.";";
    $result = mysql_query($query);
    $row = mysql_fetch_row($result); 

    $output = file_get_contents($out_file);

    if ($row[0] == $output) {
        echo "You got it right!"; 
    } else {
        echo $output;
    }

?>
