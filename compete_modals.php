<?php 
     session_start();
?>

<script>
    var ok_to_move = false;
    $(window).bind('beforeunload', function() {
        if (($('#python_modal_queue').hasClass('in')) && (ok_to_move == false)) {
        var name = <?php echo "'".$_SESSION['name']."'";?>;
        var msg = '';
        $.ajax({                                                                                                                                               
            url: "remove_from_queue.php",
            type: "POST",
            async: false,
            data: "username=" + name,
            success: function(){
                console.log("AJAX request was successful");
            },
            error: function(msg){
                console.log(msg);
            }   
        });
        }
        if (($('#ruby_modal_queue').hasClass('in')) && (ok_to_move == false)) {
        var name = <?php echo "'".$_SESSION['name']."'";?>;
        $.ajax({                                                                                                                                               
            url: "remove_from_queue.php",
            type: "POST",
            async: false,
            data: "username=" + name,
            success: function(){
                console.log("AJAX request was successful");
            },
            error: function(){
                console.log("AJAX request was a failure");
            }   
        });
        }
    });

    $(document).ready(function() {

    $('#python_modal_queue').on('shown.bs.modal', function(){
        var name = <?php echo "'".$_SESSION['name']."'";?>;
        $.ajax({
            url: "add_to_queue.php",
            type: "POST",
            data: "username=" + name + "&" + "lang=python",
            success: function(){
                console.log("AJAX request was successful");
            },
            error: function(){
                console.log("AJAX request was a failure");
            }   
        });
        var response = '';
        var response2 = '';
        function doPoll() {
            $.ajax({
            url: "check_queue.php",
            type: "POST",
            data: "username=" + name + "&" + "lang=python",
            success: function(text){
                response = text;
                console.log("AJAX request was successful");
            },
            error: function(text){
                response = text;
                console.log("AJAX request was a failure");
            }   
            });
            setTimeout(doPoll,500);
            if(response != '') {
                $('#op_name_python').html(response);
                $('#no_python_response').hide();
                $('#yes_python_response').show();
                var opponent = response;
                ok_to_move = true;
                $.ajax({
                    url: "remove_from_queue.php",
                    type: "POST",
                    async: false,
                    data: "username=" + name,
                    success: function() {
                        console.log("AJAX request was successful");
                    },
                    error: function() {
                        console.log("AJAX request was a failure");
                    }
                });   
                $.ajax({
                    url: "start_match.php",
                    type: "POST",
                    async: false,
                    data: "username=" + name + "&opponent=" + opponent + "&lang=python",
                    success: function(response2) {
                        alert(response2);
                        console.log("AJAX request was successful");
                    },
                    error: function(response2) {
                        alert(response2);
                        console.log("AJAX request was a failure");
                    }
                });   
                //window.location.replace('./compete.php');
            }  
        }
        doPoll();
    });
    $('#ruby_modal_queue').on('shown.bs.modal', function(){
        var name = <?php echo "'".$_SESSION['name']."'";?>;
        $.ajax({
            url: "add_to_queue.php",
            type: "POST",
            data: "username=" + name + "&" + "lang=ruby",
            success: function(){
                console.log("AJAX request was successful");
            },
            error:function(){
                console.log("AJAX request was a failure");
            }   
        });
        var response = '';
        var response2 = '';
        function doPoll() {
            $.ajax({
            url: "check_queue.php",
            type: "POST",
            data: "username=" + name + "&" + "lang=ruby",
            success: function(text){
                response = text;
                console.log("AJAX request was successful");
            },
            error: function(text){
                response = text;
                console.log("AJAX request was a failure");
            }   
            });
            setTimeout(doPoll,500);
            if(response != '') {
                $('#op_name_ruby').html(response);
                $('#no_ruby_response').hide();
                $('#yes_ruby_response').show();
                ok_to_move = true;
                var opponent = response;
                $.ajax({                                                                                                                                                           url: "remove_from_queue.php",
                    type: "POST",
                    async: false,
                    data: "username=" + name,
                    success: function() {
                        console.log("AJAX request was successful");
                    },
                    error: function() {
                        console.log("AJAX request was a failure");
                    }
                });
                $.ajax({
                    url: "start_match.php",
                    type: "POST",
                    async: false,
                    data: "username=" + name + "&opponent=" + opponent + "&lang=ruby",
                    success: function(response2) {
                        alert(response2);
                        console.log("AJAX request was successful");
                    },
                    error: function(response2) {
                        alert(response2);
                        console.log("AJAX request was a failure");
                    }
                });   
                //window.location.replace('./compete.php');
            }  
        }
        doPoll();
    });
});
</script>

<?php if ($_SESSION['name']) { ?>
<div class="modal fade" id="python_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img width=150 src="./imgs/python.png">
      </div>
      <div class="modal-body">
          <p>Click "Let's go!" to launch a programming problem round in Python.</p>
          <p>You'll be matched up against a similarly-ranked opponent using Python.</p>
          <p>If none are found quickly, you'll go up against an AI in a single-player round.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="python_go" type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#python_modal_queue">Let's go!</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ruby_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img width=80 src="./imgs/ruby.png">
      </div>
      <div class="modal-body">
          <p>Click "Let's go!" to launch a programming problem round in Ruby.</p>
          <p>You'll be matched up against a similarly-ranked opponent using Ruby.</p>
          <p>If none are found quickly, you'll go up against an AI in a single-player round.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="ruby_go" type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#ruby_modal_queue">Let's go!</button>
      </div>
    </div>
  </div>
</div>

<?php } else { ?>

<div class="modal fade" id="python_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Please sign in or register first.</h4>
      </div>
      <div class="modal-body">
          <p>We're sorry, but you need to sign in or register before you can compete.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ruby_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Please sign in or register first.</h4>
      </div>
      <div class="modal-body">
          <p>We're sorry, but you need to sign in or register before you can compete.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php } ?>

<div class="modal fade" id="python_modal_queue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <img width=150 src="./imgs/python.png">
      </div>
      <div class="modal-body">
          <p>Waiting for an opponent... &nbsp;&nbsp;<img src="./imgs/spin.gif"></p>
          <p>Clicking your browser's back or refresh buttons will remove you from the queue.</p>
          <p>If an opponent isn't found soon, you'll go up against an AI in a single player round.</p>
          <p id="yes_python_response" style="display: none;">Found <span id="op_name_python"></span>! Get ready!</p>
          <p id="no_python_response">Nobody yet.</p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ruby_modal_queue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <img width=80 src="./imgs/ruby.png">
      </div>
      <div class="modal-body">
          <p>Waiting for an opponent... &nbsp;&nbsp;<img src="./imgs/spin.gif"></p>
          <p>Clicking your browser's back or refresh buttons will remove you from the queue.</p>
          <p>If an opponent isn't found soon, you'll go up against an AI in a single player round.</p>
          <p id="yes_ruby_response" style="display: none;">Found <span id="op_name_ruby"></span>! Get ready!</p>
          <p id="no_ruby_response">Nobody yet.</p>
      </div>
    </div>
  </div>
</div>

