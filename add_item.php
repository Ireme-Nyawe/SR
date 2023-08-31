<?php
include 'connection.php';

$name=$_POST['name'];
$price=$_POST['price'];
$qty=$_POST['quantity'];
$query="INSERT into items values(null,'$name','$qty','$price')";
$add_item=mysqli_query($connect,$query);
if($add_item){
    ?>
<h3 class="alert alert-warning p-2 w-75" > An Item Added Successful <i class="fa fa-check-circle text-success"></i></h3>
    <?php
}
else{
    ?>
<h3 class="alert alert-warning p-2" > Failed Check Back.</h3>
    <?php
}
?>