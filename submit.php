<?php

    $code = $_POST['code'];
    $id = $_POST['id'];
    $file_num = rand();
    $in_file = "./proc/".$file_num.".in";
    $out_file = "./proc/".$file_num.".out";
    file_put_contents($in_file, "print ".$code);
    system("pypy-sandbox --tmp=./ ".$in_file." > ".$out_file);

    include './db.php';
 
    $query = "SELECT answer FROM tbl_problems WHERE id=".$id.";";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result); 

    $output = file_get_contents($out_file);

    if ((trim((string)$row[0])) === trim(((string)$output))) {
        echo "You got it right!"; 
    } else {
        echo $output;
    }

?>
