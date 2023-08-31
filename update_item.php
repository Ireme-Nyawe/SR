<?php
include("connection.php");
if(!$_POST['name']){
    ?>
    <h3 class="alet alert-warning p-2 w-75">Failed To Load Some Necessary Data!</h3>
    <?php
}
else{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $query="UPDATE items set name='$name',price='$price' where item_id='$id'";
    $update_item=mysqli_query($connect,$query);
    if($update_item){
        ?>
        <h3 class="alert alert-warning p-2 w-75">Data updated Successful <i class="fa fa-check-circle text-success"></i></h3>
        <?php
    }
    else{
        ?>
        <h3 class="alert alert-warning p-2 w-75">Failed To Load Some Necessary Data!</h3>
    <?php
    }
}
?>