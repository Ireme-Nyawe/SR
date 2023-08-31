<?php
include("connection.php");
$date=$_POST['date'];
$date1=$_POST['date1'];
$date2=$_POST['date2'];
?>
<table class="table w-75 m-4 border">
    <tr>
      <th colspan="5">
        <span class="text-info">Respective Expenses Report</span><a href="expense.respective.php?date=<?php echo $date;?>&&date1=<?php echo $date1;?>&&date2=<?php echo $date2;?>" target="_blank"><button class="btn-dark text-info mx-3">Generate PDF</button></a>
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
    $select_expenses=mysqli_query($connect,"SELECT * from expenses where date='$date' or date between '$date1' and '$date2' order by date");
    if(mysqli_num_rows($select_expenses)==0){
      ?>
      <tr>
        <td colspan="5" class="p-3">No Data Found!</td>
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
<?php
?>