<?php
$usn=$_POST['usn'];
$ps=$_POST['ps'];
$check=mysqli_query($connect,"SELECT * from user where username='$usn'");
if($usn=="ireme_nyawe"){
    $check=mysqli_query($connect,"SELECT * from user where username='$usn' and password='$ps'");
    if(mysqli_num_rows($check)!=0){
        $user_id=mysqli_fetch_array($check);
        $user_id=$user_id['user_id'];
        $_SESSION['id']=$user_id;
        $_SESSION['user']=$usn;
        header("location:user.php");
    }
    else{
        ?>
        <h3 class="alert alert-warning"><b>Invalid Credentials.</b></h3>
        <?php
    }
}
else{
    if(mysqli_num_rows($check)==0){
        ?>
        <h3 class="alert alert-warning">User Not Registered! Contact System Admin.</h3>
        <?php
    }
    else{
        $check=mysqli_query($connect,"SELECT * from user where username='$usn' and password='$ps'");
        if(mysqli_num_rows($check)==0){
           
            ?>
    
        <h3 class="alert alert-warning">Incorrect User Password!</h3>
        <?php
    }
    else{
        $getinfo=mysqli_query($connect,"SELECT * from user where username='$usn' and password='$ps'");
        $user_info=mysqli_fetch_array($getinfo);
        $user_id=$user_info['user_id'];
        $company=$user_info['company'];
        $_SESSION['id']=$user_id;
        $_SESSION['company']=$company;
        $_SESSION['user']=$usn;
        header("location:items.php");
    }
    }
}

?>