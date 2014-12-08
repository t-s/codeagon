<?php include './start.html' ?>
<?php include './header.html' ?>
<?php 

    session_start();
    $username = $_SESSION['name'];

?>
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
        var ok_to_leave = false;
        var myEvent = window.attachEvent || window.addEventListener;
        var chkevent = window.attachEvent ? 'onbeforeunload' : 'beforeunload';
        var name = "<?php echo $_SESSION['name'];?>";
        myEvent(chkevent, function(e) {
		var confirmationMessage = 'Leaving the page will cause an automatic loss.';
                if (!(ok_to_leave)) {
                    $.ajax({
                        url: "make_other_winner.php",
                        type: "POST",
                        async: false,
                        data: "user=" + name + "&hash=<?php echo $match_hash;?>"
                    });
		    (e || window.event).returnValue = confirmationMessage;
		    return confirmationMessage;
                }
	});
function doWinPoll() {
            var time_out = setTimeout(doWinPoll,1000);
            var name = "<?php echo $_SESSION['name'];?>";
            $.ajax({
            url: "check_for_winner.php",
            type: "POST",
            async: false,
            data: "hash=<?php echo $match_hash;?>",
            success: function(text){
                if (text == name) {
                    $('#DateCountdown').TimeCircles().stop();
                    alert("Congratulations! You are victorious! Start a new match and keep your winning streak!");
                    ok_to_leave = true;
                    clearTimeout(time_out);
                    //window.location.replace('./index.php');
                } else if(text != '') {
                        $('#DateCountdown').TimeCircles().stop();
                        alert("You have been defeated! Good attempt though! Try a new match!");
                        ok_to_leave = true;
                        clearTimeout(time_out);
                        $.ajax({
                            url: "remove_match.php",
                            type: "POST",
                            async: false,
                            data: "hash=<?php echo $match_hash;?>"
                        });
                        //window.location.replace('./index.php');
                }
                
                console.log("AJAX request was successful");
            },
            error: function(text){
                console.log("AJAX request was a failure");
            }   
            });
            
}
doWinPoll();
$('#submit').on('click', function() {
    var code = encodeURIComponent($('#code').val());
    var id = $('#problem_id').text();
    $.ajax({
        url: "submit.php",
        type: "POST",
        async: false,
        data: "code=" + code + "&id=" + id,
        success: function(msg){
            $('#output').val(msg);
            if(msg == "You got it right!") {
                var name = "<?php echo $_SESSION['name'];?>";
                $.ajax({
                    url: "make_winner.php",
                    type: "POST",
                    async: false,
                    data: "user=" + name + "&hash=<?php echo $match_hash;?>",
                    success: function(){
                        console.log("AJAX request was successful");
                    },
                    error: function(msg){
                        console.log(msg);
                    }   
                });
                //alert("Congratulations! You won!");
                
            }
        },
        error: function(msg){
            //alert(msg);
        }   
    });
});
</script>
<br><br>
<textarea readonly rows=4 name="output" id="output" placeholder="Output...">
</textarea>
</div>
<div class="col-md-4">
<?php include './clock.php' ?>
<br>
<br>
<?php include './opponent.php' ?>
</div>
</div>
</div>
</div>
<?php include './footer.html' ?>
<?php include './end.html' ?>

