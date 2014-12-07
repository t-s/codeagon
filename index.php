<?php include './start.html' ?>   
<?php include './header.html' ?>

<div class="container">
<div class="starter-template" style="color: white;">
<h1 style="margin-top: -5%;"><img width=400 src="./imgs/logotransparent.png"></h1>
<p style="margin-top: -5%;" class="lead">Step into the Codeagon! Improve your coding through competition.  Compete in time trials against other players, first to submit code that gives the correct answer wins! 
Multiple game modes, player rankings, and tournaments allow you satisfy your thirst for blood while learning how to code!</p>

<?php if (!($_SESSION['name'])) { ?>
<?php include './signup.html' ?>
<?php } else { ?>
<?php echo "<br><p class='lead'>Click compete to begin facing off against fellow coders!</p>"; }?>

</div>
</div>

<?php include './footer.html' ?>
<?php include './end.html' ?>
