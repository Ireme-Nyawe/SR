<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script/jquery.js"></script>
    <script src="script/sales.js"></script>
    <title>Document</title>
</head>
<body>
<?php
include("connection.php");

$item=$_POST['item'];
$select_item=mysqli_query($connect,"SELECT * from items where item_id='$item'");
$info=mysqli_fetch_array($select_item);
$qty=$info['quantity'];
$price=$info['price'];
if($qty==0){
    ?>
    <h3 class="alert alert-warning">There is no Quantity <i class="times-rectangle text-danger"></i></h3>
    <?php
}
elseif($qty== -1){
    ?>
    <label for="">Amount</label>
   <input type="text" class="form-control w-75" id="amount" value="<?php echo $price;?>">
    <label for="">Mode Of Paymet</label>
    <select name="" id="pmode" class="form-control w-75">
        <option value="cash">Cash Payment</option>
        <option value="momo">Momo Payment</option>
        <option value="credit">Credit</option>
    </select>
    <br>
    <button class="btn-info p-2 px-5 m-1 border-0" id="save_sale1" value><b>Save</b></button>
    <?php
}
else{
    ?>
   <div class="row w-75">
   <div class="col">
   <label for="">Quantity</label>
   <input type="text" class="form-control" id="qty2" value="1">
   </div>
   <div class="col">
   <label for="">Amount</label>
   <input type="text" class="form-control" id="amount2" value="<?php echo $price;?>">
   <input type="hidden" class="form-control" id="amounti" value="<?php echo $price;?>">
   </div>
   </div>
    <label for="">Mode Of Paymet</label>
    <select name="" id="pmodi" class="form-control w-75">
        <option value="cash">Cash Payment</option>
        <option value="momo">Momo Payment</option>
        <option value="credit">Credit</option>
    </select>
   </span><br>
   <button class="btn-info p-2 px-5 m-1 border-0" id="save_sale2" value><b>Save</b></button>
    <?php
}
?>
</body>
</html>