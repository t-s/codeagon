<?php include './start.html' ?>
<?php include './header.html' ?>
<?php 

    session_start();
    $username = $_SESSION['name'];

?>
<script>
	//$(window).bind('beforeunload', function() {
	//	return  'Are you sure you want to leave the page?';
	//});
        var myEvent = window.attachEvent || window.addEventListener;
        var chkevent = window.attachEvent ? 'onbeforeunload' : 'beforeunload';
        myEvent(chkevent, function(e) {
		var confirmationMessage = 'Leaving the page will cause an automatic loss.';
		(e || window.event).returnValue = confirmationMessage;
		return confirmationMessage;
	});
</script>
<style>

textarea {
    width: 80%;
    margin-left: 10%;
    background-color: black;
    color: white;
    font-family: 'Source Code Pro';
    opacity: 0.5;
}

</style>
<br><br><br>
<?php include './language.php'?>
<?php include './problem.php' ?>
<div class="container">
<div class="starter-template" style="color: white;">
<div class="row">
<div style="" class="col-md-8">
<textarea rows=20 style="height: 65%" name="code" id="code" placeholder="Your code here...">
</textarea>
<br>
<button class="btn btn-success" id="submit" type="button" style="margin-left:10%; width: 80%;">Submit <?php echo $lang; ?>!</button>
<script>
$('#submit').on('click', function() {
    var code = encodeURIComponent($('#code').val());
    $.ajax({
        url: "submit.php",
        type: "POST",
        async: false,
        data: "code=" + code,
        success: function(msg){
            $('#output').val(msg);
        },
        error: function(msg){
            alert(msg);
        }   
    });
});
</script>
<br><br>
<textarea rows=4 name="output" id="output" placeholder="Output...">
</textarea>
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

