<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:index.php");
}
include("connection.php");
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
    <script src="script/item.js"></script>
</head>
<body>
  <?php
  include 'same.php';
  ?>  
  <div class="row px-3">
<div class="w-50">
<table class="table table-dark">
    <tr>
    <div class="row">
        <th colspan="5">
            The Items Served. &nbsp;&nbsp;&nbsp;&nbsp; 
            <?php
            $limit=10;
       $check_number=mysqli_query($connect,"SELECT * from items");
       $numb=mysqli_num_rows($check_number);
       $num=ceil($numb/$limit);
       ?>
       <span class="text-info">Pages</span>
       <?php
       for($i=1;$i<=$num;$i++){
        ?>
        <a class="btn text-warning border border-2 border-warning p-1 py-0" href="items.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
       }
        ?>
    </div>
        </th>

    </tr>
    <tr>
        <th>No</th>
        <th>Items</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Operation</th>
    </tr>
    <?php
    $page=0;
    $start=0;
    if(isset($_GET['page'])){
        $page=$_GET['page'];
        $start=($page-1) * $limit;
    }
    $select=mysqli_query($connect,"SELECT * from items order by name asc limit $start,$limit");
    if(mysqli_num_rows($select)==0){
        ?>
        <tr>
            <th colspan="5">The Is No Data Found!</th>
        </tr>
        <?php
    }
    $n=1;
    while($info=mysqli_fetch_array($select)){
        $qty=$info['quantity'];
        ?>
        <tr>
            <th class=""><span class="text-info"><?php echo $n; ?></span>.</th>
            <td><?php echo $info['name']; ?></td>
            <?php
            if($qty==-1){
                ?>
                <td><b>N/A</b></td>
                <?php
            }
            else{
                ?>
                <td><?php echo $qty;?></td>
                <?php
            }
            ?>
            <td><?php echo $info['price']; ?> <b>Rwf</b></td>
            <td>
                <a href="items.php?delete=<?php echo $info['item_id'];?>"><button class="btn btn-info border-0 px-2 py-0 mx-2"><i class="fa fa-trash"></i></button></a>
                <a href="items.php?update=<?php echo $info['item_id'];?>"><button class="btn btn-info border-0 px-2 py-0 mx-2"><i class="fa fa-edit"></i></button></a>
            </td>
        </tr>
        <?php
        $n++;
    }
    ?>
    
    <tr>
        <th colspan="5">
        <form action="" method="post">
           <button name="add_item"class="col-md-5 btn-info border-0 p-2 mx-4 text"> <i class="fa-fa-plus"></i>Record New Item</button>
           <button name="import_item"class="col-md-5 btn-info border-0 p-2 mx-4 text"> <i class="fa-fa-plus"></i>Import An Item</button>
           </form>
        </th>
    </tr>
</table>
</div>
    <div class="w-50">
<?php
if(isset($_POST['add_item'])){
    ?>
      
        <h3 class="text-info bg-dark p-1 w-75">Add An Item Here..</h3>
        <div class="" id="add_response"></div>
        <label for="">Item Name</label>
        <input type="text" class="form-control w-50" id="item_name">
        <label for="">Unit Price</label>
        <input type="text" class="form-control w-50" id="item_price">
        <label for="">Define Quantity Type</label>
        <div class="row border w-50 p-2">
            <span class="col">Difined <input type="radio" name="quantity" value="0" class="quantity_type"></span>
            <span class="col">Not Difined <input type="radio" name="quantity" value="-1" class="quantity_type"></span>
        </div>
        <input value="submit" type="submit"class="btn btn-dark text-info my-2" id="add_item">

    <?php
}
else if(isset($_POST['import_item'])){
    ?>
      
        <h3 class="text-info bg-dark p-1 w-75">Import An Item Quantity Here..</h3>
        <div class="" id="import_response"></div>
        <label for="">Item To Import</label>
        <select name="" id="import_item" class="form-control w-50">
  <option value="">--Items--</option>
  <?php
  $select_item=mysqli_query($connect,"SELECT * from items where quantity!=-1 order by name asc");
  while($info=mysqli_fetch_array($select_item)){
    ?>
    <option value="<?php echo $info['item_id'];?>"><?php echo $info['name'];?></option>
    <?php
  }
  ?>
</select>

        <label for="">Quantity To Import</label>
        <input type="text" class="form-control w-50" id="import_quantity" value="1">
        <label for="">Amount Spent</label>
        <input type="text" class="form-control w-50" id="import_amount">
        <input value="Import Now" type="submit"class="btn btn-dark text-info my-2" id="import_now">

    <?php
}
else if(isset($_GET['update'])){
    $item_id=$_GET['update'];
    $check_item=mysqli_query($connect,"SELECT * from items where item_id='$item_id'");
    $item=mysqli_fetch_array($check_item);
    ?>
            <h3 class="text-info bg-dark p-1 w-75">Update An Item Here..</h3>
            <div id="update_response"></div>
            <label for="">Item Name</label>
            <input type="hidden" class="form-control w-50" value="<?php echo $item_id;?>" id="item_id">
            <input type="text" class="form-control w-50" value="<?php echo $item['name'];?>" id="update_name">
            <label for="">Price</label>
            <input type="text" class="form-control w-50" value="<?php echo $item['price'];?>" id="update_price">
            <input type="submit"class="btn btn-dark text-info my-2" id="update_item" value="Submit">
    <?php
}
elseif(isset($_GET['delete'])){
    $id=$_GET['delete'];
    ?>
    <div id="delete" class="my-5">
        <h3 class="alert alert-warning col-sm-11 text-center" id="delete_response"> <b>Are You Sure About Deleting An Item ?</b></h3>

            <a href="items.php"><button class="col-sm-4 mx-5 btn-info p-2 border"><b>Cancel</b></button></a>
            <input type="hidden" value="<?php echo $id;?>" id="delete_id">
            <button class="col-sm-4 mx-5 btn-info p-2 border" id="delete_item"><b>Delete</b></button>
    </div>
    <?php
}
?>

</div>
</div>
<?php
include 'sameb.php';
?>
</body>
</html>