<?php
include("connection.php");
$date=$_POST['date'];
$date1=$_POST['date1'];
$date2=$_POST['date2'];
$table=$_POST['table'];
?>
<table class="table w-75 m-4 border">
    <tr>
      <th colspan="5">
        <span class="text-info">Operations Report On Import, Expenses & Sales</span><a href="general.pdf.php?date=<?php echo $date;?>&&date1=<?php echo $date1;?>&&date2=<?php echo $date2;?>" target="_blank"><button class="btn-dark text-info mx-3">Generate PDF</button></a>
      </th>

      <tr>
            <th>No</th>
            <th>Items</th>
            <th>Quantity</th>
            <th>Amount</th>
            <th>Date</th>
          </tr>
      
          <th colspan="5">
              .................IMPORT
            </th>
          </tr>
          
          <?php
          $total_import=0;
          $select_import=mysqli_query($connect,"SELECT * from import,items where item=item_id and date='$date' or date between '$date1' and '$date2' order by date,name asc");
          if(mysqli_num_rows($select_import)==0){
              ?>
              <tr>
                  <td colspan="5" class="p-3 ">No Data Found!</td>
              </tr>
              <?php
          }
          $no=1;
          while($info=mysqli_fetch_array($select_import)){
            
            $amount3=$info['amount'];
            $total_import+=$amount3;
            ?>
            <tr>
            <td><?php echo $no;?> .</td>
            <td><?php echo $info['name'];?></td>
            <td><?php echo $info['qty'];?></td>
            <td><?php echo $amount3;?></td>
            <td><?php echo $info['date'];?></td>
            </tr>
            <?php
            $no++;
          }
          ?>
    <tr>
      <th>No</th>
      <th>Expenses</th>
      <th>Amount</th>
      <th>Person</th>
      <th>Date</th>
    </tr>

    <th colspan="5">
        .................EXPENSES
      </th>
    </tr>
    
    <?php
    $total_expenses=0;
    $select_expenses=mysqli_query($connect,"SELECT * from expenses where date='$date' or date between '$date1' and '$date2' order by date,expense asc");
    if(mysqli_num_rows($select_expenses)==0){
        ?>
        <tr>
            <td colspan="5" class="p-3 ">No Data Found!</td>
        </tr>
        <?php
    }
    $no=1;
    while($info=mysqli_fetch_array($select_expenses)){

      $amount2=$info['amount'];
      $total_expenses+=$amount2;
      ?>
      <tr>
      <td><?php echo $no;?> .</td>
      <td><?php echo $info['expense']?></td>
      <td><?php echo $amount2;?></td>
      <td><?php echo $info['person'];?></td>
      <td><?php echo $info['date'];?></td>
      </tr>
      <?php
      $no++;
    }
    ?>


    <tr>
      <th>No</th>
      <th>Items</th>
      <th>Clients</th>
      <th>Amount</th>
      <th>Date</th>
    </tr>
    <tr>
      <th colspan="5">
        .................SALES
      </th>
    </tr>
    
    <?php
    $total_sales=0;
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
      $amount1=$info['sum(amount)'];
      $total_sales+=$amount1;
      ?>
      <tr>
      <td><?php echo $no;?> .</td>
      <td><?php echo $name;?></td>
      <td><?php echo $info['count(item)'];?></td>
      <td><?php echo $amount1;?></td>
      <td><?php echo $info['date'];?></td>
      </tr>
      <?php
      $no++;
    }
    ?>
<tr>
      <th colspan="5" class="text-center">TOTAL;   IMPORT[<span class="text-warning m-1" ><?php echo $total_import;?></span> Rwf ] EXPENSES[<span class="text-warning m-1" ><?php echo $total_expenses;?></span> Rwf ] SALES[<span class="text-warning m-1" ><?php echo $total_sales;?></span> Rwf ]</th>
    </tr>
  </table>

<?php
?>