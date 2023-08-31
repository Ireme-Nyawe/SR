<?php
$user_id=$_SESSION['id'];
$get_comp=mysqli_query($connect,"SELECT * from user where user_id='$user_id'");
$comp=mysqli_fetch_array($get_comp);
$company=$comp['company'];
$_SESSION['company']=$company;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <link rel="stylesheet" href="bs/css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome\css\all.min.css">
    <script src="script/jquery.js"></script>
    <script src="script/same.js"></script>
</head>
<body>
  <div id="load">

  </div>
<div class="row bg-info">
<h2 class="text-white bg-info p-3 col-md-7" style="letter-spacing:10px; font-family:courier;"><b>SALES REPORT SYSTEM</b></h2>
<div class="col-md-4 m-4">
<span class="text-dark  col-md-6 my-3" style="letter-spacing:5px; font-family:arial;"><b> <i class="fa fa-user text-warning " style="font-size:x-large;"></i><?php echo strtoupper($company);?></b></span>
<button id="drop_down_button" class="border-0 bg-white"><i class="fa fa-arrow-down text-warning"></i></button>
  
</div>
</div>
<ul id="drop_down" style="" class="shadow">
    <li>
    <a href="logout.php" onclick="return confirm('Are you Sure You Want To Logout!?!')" class="col-sm-1"><i class="fa fa-sign-out text-dark"></i> Logout </a>
    </li>
    <li id="edit_profile"><i class="fa fa-edit text-dark"></i> Edit Profile</li>
  </ul>
  <div class="row shadow w-50" id="menus">

      <a id="stocki" href="items.php" class="col-md-3 btn btn-white text-uppercase my-1"><b><i class="fa fa-pie-chart text-warning"></i> stock</b></a>
      <a id="expensii" href="expenses.php" class="col-md-3 btn btn-white text-uppercase my-1"><b><i class="fa fa-minus-square text-warning"></i> expenses</b></a>
      <a id="sali" href="sales.php" class="col-md-3 btn btn-white text-uppercase my-1"><b><i class="fa fa-balance-scale text-warning"></i> sales</b></a>
      <a id="reporti" href="reporting.php" class="col-md-3 btn btn-white text-uppercase my-1"><b><i class="fa fa-book text-warning"></i> Report</b></a>
      <!-- <a href="logout.php" onclick="return confirm('Are you Sure You Want To Logout!?!')" class="col-sm-1"><button class="btn btn-white text-info col-sm-11 shadow mx-2 p-2 text-uppercase ">Logout</button></a> -->
      
    </div>
    <div id="edit" class="shadow bg-white col-md-6">
      
    </div>
<style>
#edit{
  position: fixed;
  top: 10%;
  left:25%;

}
#menus a:hover{
  
  background: rgb(0,200,250);
}
ul{
  margin: 2px;
  list-style: none;
  font-family: arial;
  font-size: small;
  color: white;
  font-weight: 800;
  margin-left: 50%;
  text-transform: small;
  /* font-style: italic; */
  background: white;
  color:cyan;
  padding: 25px;
  font-size: large;
  width: 300px;
  position: fixed;
  top: 7%;
  right: 2%;
  

}
ul li{
  width: 200px;
  margin: 2px;
  padding-left:20px;
  cursor: pointer;
  /* border-radius: 5px; */
}
ul li a{
  text-decoration: cyan;
  color: cyan;
}
ul li a:hover{
  color: cyan;
}
ul li:hover{
  background: black;
}
#load{
  width: 100px;
  height: 100px;
  position: fixed;
  top: 20%;
  left:42%;
  background: yellow;
  border-radius: 50%;
  animation: move linear 1s infinite;

}
@keyframes move {
    50%{
        background: linear-gradient(yellow,blue);
    }
    
 }
</style>

</body>
</html>