<?php include './start.html' ?>
<?php include './header.html' ?>  
<?php include './db.php' ?>
<?php
   $query = "SELECT username, score FROM tbl_users;";
   $result = mysqli_query($conn,$query);
   while ($row = mysqli_fetch_array($result)) {
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
        <h1 style='font-family: "Open Sans";'>Leaderboard</h1>
        <br>
        <table class="table">
        <tr><th>Username</th><th>Rating</th></tr>
        <?php foreach($scores as $row) { ?>
            <tr><td><?php echo "<img style='margin-right: 20px;' width=20 src='./avatars/".$row[0].".jpg'>"; echo $row[0];?> </td><td><?php echo $row[1]; ?></td></tr>
        <?php } ?>
        </table>
      </div>

    </div><!-- /.container -->

  <?php include './footer.html' ?>

  </body>
</html>
