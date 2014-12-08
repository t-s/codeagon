<?php

    $code = $_POST['code'];
    $file_num = rand();
    $in_file = "./proc/".$file_num.".in";
    $out_file = "./proc/".$file_num.".out";
    file_put_contents($in_file, "print ".$code);
    system("pypy-sandbox --tmp=./ ".$in_file." > ".$out_file);
    echo file_get_contents($out_file);

?>
