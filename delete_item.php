<?php
include("connection.php");
$id=$_POST['id'];
$delete_item=mysqli_query($connect,"DELETE from items where item_id='$id'");
if($delete_item){
    echo 'An Item Deleted Successfully <i class="fa fa-check-circle text-succes"></i>';
}

?>