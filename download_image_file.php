<?php

    $name = "CodeNinja";
    $url = "http://lorempixel.com/150/150/cats/".$name;

    $img = "./avatars/".$name.".jpg";
    file_put_contents($img, file_get_contents($url));

?>
