<?php
include("connection.php");
$date=$_POST['date'];
$date1=$_POST['date1'];
$date2=$_POST['date2'];
?>
<table class="table w-75 m-4 border">
    <tr>
      <th colspan="5">
        <span class="text-info">Respective Sales Report</span><a href="respective.pdf.php?date=<?php echo $date;?>&&date1=<?php echo $date1;?>&&date2=<?php echo $date2;?>" target="_blank"><button class="btn-dark text-info mx-3">Generate PDF</button></a>
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
    $select_sales=mysqli_query($connect,"SELECT item,count(item),sum(amount),date from sales where date='$date' or date between '$date1' and '$date2' group by item");
    if(mysqli_num_rows($select_sales)==0){
        ?>
        <tr>
            <td colspan="5" class="p-3 ">No Data Found!</td>
        </tr>
        <?php
    }
    $no=1;
    while($info=mysqli_fetch_array($select_sales)){
      $item=$info['item'];
    $get_item=mysqli_query($connect,"SELECT * from items where item_id='$item'");
                    $itemi=mysqli_fetch_array($get_item);
                    $name=$itemi['name'];
      $amount=$info['sum(amount)'];
      $total+=$amount;
      ?>
      <tr>
      <td><?php echo $no;?></td>
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
      $cash=mysqli_query($connect,"SELECT sum(amount) from sales where date='$date' or date between '$date1' and '$date2' and payment='cash'");
      $cash_amount=mysqli_fetch_array($cash)['sum(amount)'];

      $momo=mysqli_query($connect,"SELECT sum(amount) from sales where date='$date' or date between '$date1' and '$date2' and payment='momo'");
      $momo_amount=mysqli_fetch_array($momo)['sum(amount)'];

      $credit=mysqli_query($connect,"SELECT sum(amount) from sales where payment='credit' and date='$date' or date between '$date1' and '$date2' and payment='credit'");
      $credit_amount=mysqli_fetch_array($credit)['sum(amount)'];
      ?>
       <th colspan="5" class=""> ToTal Amount <span class="text-warning m-1" ><?php 
        // $SS=mysqli_query($connect,"SELECT sum(amount) from sales where date='$date' or date between '$date1' and '$date2'"); 
       echo $total;?></span> Rwf CASH[<?php echo $cash_amount?>.0], MOMO[<?php echo $momo_amount?>.0], CREDIT[<?php echo $credit_amount;?>.0]</th>
    </tr>
    </tr>
  </table>
<?php
?>