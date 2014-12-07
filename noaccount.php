<?php include './start.html' ?>
<?php include './header.html' ?>  
<?php
 $servername = "localhost";
   $username = "root";
   $password = "root";
 
   $login_name = $_POST['username'];
   $login_password = md5($_POST['password']);
 
   $conn = mysql_connect($servername, $username, $password)
   or die("\nUnable to connect to MySQL.\n");
 
   $selected = mysql_select_db("codeagon", $conn)
   or die("\nCould not select db.\n");
 
   $query = "SELECT username, score FROM tbl_users;";
   $result = mysql_query($query, $conn);
   while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
       $scores[] = $row;
   }
   usort($scores, function($a, $b) {
       return $a[1] <= $b[1];
   });
?>
<style>
      .table {
          color: white;
          background-color: black;
          opacity: 1;
          width: 60%;
          margin: 0 auto;
      }
      .table th {
          font-size: 200%;
          color: #5cb85c;
      }
      .table tr td {
          text-align: left;
      }
  </style>
  </head>

    <div class="container">

      <div class="starter-template" style="color: white;">
        <h5 class="lead">Wrong username or password. Please try again. Or register if you have not already.</h5>
        <?php include './signup.html' ?>
      </div>

    </div><!-- /.container -->

  <?php include './footer.html' ?>

  </body>
</html>
