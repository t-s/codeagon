<?php include './start.html' ?>
<?php include './header.html' ?>
<?php

    session_start();
    $logged_in = false;
    if ($_SESSION['name']) {
        $logged_in = true;
        $name = $_SESSION['name'];
    }
?>
<div class="container">
<div class="row">
<h1 style="color: white; margin-left: 12%;"><?php echo $name; ?></h1>
<br><br><img style="margin-left: 12%;" src=<?php echo "./avatars/".$name.".jpg" ?>>
<br><br><br>
<?php

    include './db.php';

    $query = "SELECT score FROM tbl_users WHERE BINARY username='".$name."'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $score = $row[0];

echo "<h4 style='margin-left:12%; color: white;'>Your score so far: &nbsp; <span style='color: #5cb85c; font-size: 150%;'>".$score."</span></h4>"; 
?>
</div>
</div>
<?php include './footer.html' ?>
