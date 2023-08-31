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
    <link rel="stylesheet" href="fontawesome\css\mine.css">
    <script src="script/jquery.js"></script>
    <script src="script/sales.js"></script>
</head>
<body>
  <?php
  include 'same.php';
  ?>  
  <div class="row px-3">
<div class="w-50">
<div class="form bg-dark text-white p-2 ">
<h3 class="text-info">Record Sales Here..</h3>
<div id="sale_response"></div>
<div id="save_response"></div>
<label for="">Item</label>
<select name="" id="sale_item" class="form-control w-75">
  <option value="">--Items--</option>
  <?php
  $select_item=mysqli_query($connect,"SELECT * from items order by name asc");
  while($info=mysqli_fetch_array($select_item)){
    ?>
    <option value="<?php echo $info['item_id'];?>"><?php echo $info['name'];?></option>
    <?php
  }
  ?>
</select>
<div id="continuing_form">
  Continuing...
</div>
</div>
</div>
<div class="w-50">
  <div class="row">
    <a href="sales.php?today=today" class="col-sm-5 mx-4"><button class="btn btn-dark text-info col-sm-11 ">Today sales Report</button></a>
    <a href="sales.php?respective=respective" class="col-sm-5 mx-4"><button class="btn btn-dark text-info col-sm-11 ">Respective Sales Report</button></a>
  </div>
<?php
if(isset($_GET['respective'])){
    ?>
        <form action="" class="form">
            <h3 class="text-info p-1 w-75">Show Report Element..</h3>
            <label for="">Date</label>
            <input type="date" class="form-control w-50" id="date">
            <label class="">Date In Range</label>
            <div class="row border p-1">
              <div class="col-sm-6">
                <label for="">Start Date</label>
                <input type="date" class="form-control" id="date1">
              </div>
              <div class="col-sm-6">
                <label for="">End Date Date</label>
                <input type="date" class="form-control" id="date2">
              </div>
            </div>
            <buton class="btn btn-dark text-info my-2" id="view_report">View Report</buton>
        </form>
    <?php
}

?>
</div>

</div>
<hr>
<?php
if(isset($_GET['today'])){
  ?>
  <div id="report_t1" style="
  height:500px;
  overflow-y:sauto;
  ">
  <table class="table w-75 m-4 border">
    <tr>
      <th colspan="5">
        <span class="text-info">Sales Report Today</span><a href="today.report.php" target="_blank"><button class="btn-dark text-info mx-3">Generate PDF</button></a>
      </th>
    </tr>
    <tr>
      <th>No</th>
      <th>Items</th>
      <th>Amount</th>
      <th>Date</th>
      <th>Clients</th>
    </tr>
    <?php
    $total=0;
    $no=1;
    $get_date=mysqli_query($connect,"SELECT CURRENT_DATE as 'today'");
    $today=mysqli_fetch_array($get_date);
    $today_date=$today['today'];
    $select_sales=mysqli_query($connect,"SELECT item,count(item),sum(amount),date from sales where date='$today_date' group by item");
    if(mysqli_num_rows($select_sales)==0){
      ?>
      <tr>
        <td colspan="5" class="p-3"> No Data Found!</td>
      </tr>
      <?php
    }
    while($info=mysqli_fetch_array($select_sales)){
      $item=$info['item'];
    $get_item=mysqli_query($connect,"SELECT * from items where item_id='$item'");
                    $itemi=mysqli_fetch_array($get_item);
                    $name=$itemi['name'];
      $amount=$info['sum(amount)'];
      $total+=$amount;
      ?>
      <tr>
      <td><?php echo $no;;?></td>
      <td><?php echo $name;?></td>
      <td><?php echo $amount;?></td>
      <td><?php echo $info['date'];?></td>
      <td><?php echo $info['count(item)'];?></td>
      </tr>
      <?php
      $no++;
    }
    ?>
    <tr>
      <?php
      $cash=mysqli_query($connect,"SELECT sum(amount) from sales where date='$today_date' and payment='cash'");
      $cash_amount=mysqli_fetch_array($cash)['sum(amount)'];

      $momo=mysqli_query($connect,"SELECT sum(amount) from sales where date='$today_date' and payment='momo'");
      $momo_amount=mysqli_fetch_array($momo)['sum(amount)'];

      $credit=mysqli_query($connect,"SELECT sum(amount) from sales where date='$today_date' and payment='credit'");
      $credit_amount=mysqli_fetch_array($credit)['sum(amount)'];
      ?>
      <th colspan="5" class=""> ToTal Amount <span class="text-warning m-1" ><?php echo $total;?></span> Rwf CASH[<?php echo $cash_amount?>.0], MOMO[<?php echo $momo_amount?>.0], CREDIT[<?php echo $credit_amount;?>.0]</th>
    </tr>
  </table>
  </div>
  <?php
}
?>
<div id="report_t2"></div>
<?php
include 'sameb.php';
?>
</body>
</html>