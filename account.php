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
</div>
</div>
<?php include './footer.html' ?>
