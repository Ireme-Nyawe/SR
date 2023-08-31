<?php
include("connection.php");

$item=$_POST['item'];
$quantity=$_POST['quantity'];
$amount=$_POST['amount'];
$query="INSERT into import values($item,$quantity,$amount,default)";
$query2="UPDATE items set quantity=(quantity + $quantity) where item_id='$item'";
$import=mysqli_query($connect,$query);
$stock=mysqli_query($connect,$query2);
?>

    <h3 class="alert alert-warning p-2 w-75">Item Quantity Imported Successfully <i class="fa fa-check-circle text-success"></i></h3>
    <?php

