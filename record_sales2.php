<?php
include("connection.php");
$item=$_POST['item'];
$amount=$_POST['amount'];
$pmode=$_POST['pmode'];

   $query2="INSERT INTO sales VALUES (NULL, '$item', '-1', '$amount', '$pmode', default)";
   $record_sale=mysqli_query($connect,$query2);
   if($record_sale)
{
    ?>
    <h3 class="alert alert-warning p-2 text-center">Sales Recorded Successfully <i class="fa fa-check-circle"></i></h3>
    <?php
}



?>