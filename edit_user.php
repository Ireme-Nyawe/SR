<?php
session_start();
$user_id=$_SESSION['id'];
include 'connection.php';
if(isset($_POST['name'])){
    $bss=$_POST['bss'];

    $edit=mysqli_query($connect,"UPDATE user set company='$bss' where user_id='$user_id'");
    ?>
    <h3 class="alert-dark p-2"> Well User Information Edited, </h3>
    <?php
    ?>
    
    <?php
}
elseif(isset($_POST['credentials'])){
    $usn=$_POST['usn'];
    $ps1=$_POST['ps1'];
    $ps2=$_POST['ps2'];
    if(strlen($ps1)<6){
        ?>
        <h3 class="alert-dark p-2"> Password Must Be More Than Six(6) Character!</h3>
        <?php
    }
    elseif($ps1!=$ps2){
        ?>
        <h3 class="alert-dark p-2"> Passwords Do Not Match!</h3>
        <?php
    }
    else{
       $edit=mysqli_query($connect,"UPDATE user set username='$usn',password='$ps1' where user_id='$user_id'");
        ?>
        <h3 class="alert-dark p-2"> Well User Information Edited, </h3>
        <?php

    }
}
?>
