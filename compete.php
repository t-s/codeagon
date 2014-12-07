<?php include './start.html' ?>
<?php include './header.html' ?>
<?php 

    session_start();
    $username = $_SESSION['name'];

?>
<br><br><br>
<?php include './problem.php' ?>
<div class="container">
<div class="starter-template" style="color: white;">
<div class="row">
<div style="" class="col-md-8">
<textarea rows=20 style="width:80%; margin-left: 10%; height: 65%; background-color: black; color: white; font-family: 'Source Code Pro'; opacity: 0.5;" name="message" placeholder="def x_function">
</textarea><br>
<button class="btn btn-success" type="button" style="margin-left:10%; width: 80%;">Submit!</button>
</div>
<div class="col-md-4">
<?php include './clock.php' ?>
<?php include './opponent.php' ?>
</div>
</div>
</div>
</div>
<?php include './footer.html' ?>
<?php include './end.html' ?>
