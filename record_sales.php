<?php
include("connection.php");
$itemu=$_POST['item'];
$amount=$_POST['amount'];
$pmode=$_POST['pmode'];
$qty=$_POST['qty'];

$check_qty=mysqli_query($connect,"SELECT * from items where item_id='$itemu'");
$item=mysqli_fetch_array($check_qty);
$prev_qty=$item['quantity'];
if($prev_qty < $qty){
    ?>
    <h3 class="alert alert-warning p-2 text-center">No Suficient Stock, Only <span class="text-success"><b><?php echo $prev_qty?></b></span> <b>Pcs</b> Available! </h3>
    <?php
}
else{
   $query1="UPDATE items set quantity =(quantity-$qty) where item_id='$itemu'";
   $stock_update=mysqli_query($connect,$query1);
   $query2="INSERT INTO sales VALUES (NULL, '$itemu', '$qty', '$amount', '$pmode', default)";
   $record_sale=mysqli_query($connect,$query2);
   if($stock_update)
{
    ?>
    <h3 class="alert alert-warning p-2 text-center">Sales Recorded Successfully <i class="fa fa-check-circle"></i></h3>
    <?php
}
}


?>