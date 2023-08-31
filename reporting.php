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
    <script src="script/report.js"></script>
</head>
<body>
  <?php
  include 'same.php';
  ?>  
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="form col-sm-6 bg-dark text-info p-3">
        <h3 class="text-info p-1 w-75">Show Report Element..</h3>
        <div class="row border p-1">
          <div class="col-sm-6">
            <label for=""><b>Report Option</b></label>
            <select name="" id="report_option" class="form-control" disabled>
                <option value="">--Options-- Below--</option>
                <option value="sales">Sales Report</option>
                <option value="import">Import/ Stock-In Report</option>
                <option value="export">Export/ Stock-Out Report</option>
            </select>
          </div>
          <div class="col-sm-6">
            <label for=""><b>Date</b></label>
            <input type="date" class="form-control" id="date">
          </div>
          
        </div>
        <div class="row border p-1">
                <label class=""><b>Date In Range</b></label>
              <div class="col-sm-6">
                <label for="">Start Date</label>
                <input type="date" class="form-control" id="date1">
              </div>
              <div class="col-sm-6">
                <label for="">End Date Date</label>
                <input type="date" class="form-control" id="date2">
              </div>
              
            </div>
            <buton class="btn btn-info text-dark p-2 my-2" id="reporting"><b>View Report</b></buton>
    </div>
  </div>
  <hr>
  <div id="report_t" class="px-5">
    <h2 class="text-warning"><b>Better Report, Better Data Analysis, More Achievements.</b></h2>
  </div>
<?php
include 'sameb.php';
?>
</body>
</html>