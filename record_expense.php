<?php
include("connection.php");
$amount=$_POST['amount'];
$expense=$_POST['expense'];
$person=$_POST['person'];
$query="INSERT INTO `expenses` VALUES (NULL, '$expense', '$amount', DEFAULT, '$person');";
$record_expense=mysqli_query($connect,$query);
?>

<h3 class="alert alert-warning">Expense Recorded successfully <i class="fa fa-check-circle"></i></h3>
<?php
?>