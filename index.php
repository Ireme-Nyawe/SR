<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report SYSTEM</title>
    <link rel="stylesheet" href="bs/css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome\css\all.min.css">
    <script src="script/jquery.js"></script>
    <script src="script/index.js"></script>
</head>
<body>
    <h2 class="text-white bg-info p-3" style="letter-spacing:10px; font-family:courier;"><b>SALES REPORT SYSTEM</b></h2>
      <div id="logini" style="display:none;">
    <div class="row">
    <div class="col-sm-3"></div>
    <form action=""  method="post" autocomplete="off" class="col-sm-6 shadow p-3 bg-white">
            <h3 class="text-info p-3" style=
            "
            letter-spacing:5px;
            "><b>Login Here...</b></h3>
            <?php
            if(isset($_POST['login'])){
                include("login.php");
            }
            ?>
            <label for="" class="">User Name  <i class="fa fa-user text-warning"></i></label>
            <input type="text" class="form-control w-75" name="usn">
            <br>
            <label for="" class="">Password <i class="fa fa-lock text-warning"></i></label>
            <input type="password" class="form-control w-75" name="ps">
            <button type="submit" name="login" class="btn btn-dark text-info shadow p-3 px-5 my-4" style="letter-spacing:5px;">Login</button>


        </form>
    </div>
    </div>
    <style>
        body{
            background-image: url("images/index_bg.jpg");
            background-size: cover;
        }
    </style>
    <?php
    include ("sameb.php");
    ?>
  
</body>
</html>