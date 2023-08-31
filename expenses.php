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
    <script src="script/expenses.js"></script>
</head>
<body>
  <?php
  include 'same.php';
  ?>  
  <div class="row px-3">
<div class="w-50">
<div class="form bg-dark text-white p-2 ">
<h3 class="text-info">Record Expense Here..</h3>
<div id="expense_response"></div>
<label for=""> Expense View</label>
<input type="text" placeholder="expense; View" class="form-control w-75" id="expense">
<label for="">Amount</label>
<input type="text" class="form-control w-75" id="amount">
<label for="">Person</label>
<input type="text" class="form-control w-75" id="person">
<button class="btn btn-info my-3 px-4" id="save_expense">Save</button>
</div>
</div>
<div class="w-50">
  <div class="row">
    <a href="expenses.php?today=today" class="col-sm-5 mx-4"><button class="btn btn-dark text-info col-sm-11 ">Today Expenses Report</button></a>
    <a href="expenses.php?respective=respective" class="col-sm-5 mx-4"><button class="btn btn-dark text-info col-sm-11 ">Respective Expenses Report</button></a>
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
        <span class="text-info">Expenses Report Today</span><a href="today.expenses.php" target="_blank"><button class="btn-dark text-info mx-3">Generate PDF</button></a>
      </th>
    </tr>
    <tr>
      <th>No</th>
      <th>Description</th>
      <th>Amount</th>
      <th>Date</th>
      <th>Person</th>
    </tr>
    <?php
    $total=0;
    $get_date=mysqli_query($connect,"SELECT CURRENT_DATE as 'today'");
    $today=mysqli_fetch_array($get_date);
    $today_date=$today['today'];
    $select_expenses=mysqli_query($connect,"SELECT * from expenses where date='$today_date' order by date");
    if(mysqli_num_rows($select_expenses)==0){
      ?>
      <tr>
        <td colspan="5" class="p-3"> No Data Found!</td>
      </tr>
      <?php
    }
    $no=1;
    while($info=mysqli_fetch_array($select_expenses)){
      $amount=$info['amount'];
      ?>
      <tr>
      <td><?php echo $no;?></td>
      <td><?php echo $info['expense'];?></td>
      <td><?php echo $amount;?></td>
      <td><?php echo $info['date'];?></td>
      <td><?php echo $info['person'];?></td>
      </tr>
      <?php
      $no++;
      $total+=$amount;
    }
    ?>
    <tr>
      <th colspan="5" class=""> ToTal Amount <span class="text-warning m-1" ><?php echo $total;?></span> Rwf</th>
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