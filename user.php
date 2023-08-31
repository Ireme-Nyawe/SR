<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="bs/css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome\css\all.min.css">
    <script src="script/jquery.js"></script>
    <script src="script/users.js"></script>
</head>
<body>
<div class="p-3" id="edit_org">
<?php
// $user=$_POST['user'];
include 'connection.php';
$user=1;
$select=mysqli_query($connect,"SELECT * from user where user_id='$user'");
$info=mysqli_fetch_array($select);
$usn=$info['username'];
$ps=$info['password'];
$bss=$info['company'];

?>
<h3 class="text-center"><button class="bg-white border-0" ><i id="hide_edit" class="fa fa-times-circle h2 text-center"></i></button></h3>
<h3 class="text-info"><i class=" fa fa-user text-warning"></i> User Profile</h3>
<hr>

<div class="row">
   <div class="col-md-3">Company</div>
   <div class="col text-info"><?php echo strtoupper($bss); ?></div>
</div>
<div class="row">
   <div class="col-md-3">UserName</div>
   <div class="col text-info"><?php echo $usn; ?></div>
</div>
<div class="row">
   <div class="col-md-3">PassWord</div>
   <div class="col text-info"><?php echo $ps; ?></div>
</div>
<div class="row">
<div class="col-md-3"></div>
<button id="change_credentials" class="btn btn-info p-2 col-md-3 mx-1 my-3">Credentials <i class="fa fa-edit"></i></button>
<button id="change_business" class="btn btn-info p-2 col-md-3 mx-1 my-3">Company<i class="fa fa-edit"></i></button>
<div id="crd" style="display:none;">
<h3 class="text-warning"><b>Change Your Credentials Here --</b></h3>
<div class="edit_response"></div>
   <label for="">New UserName</label>
<input type="text" class="form-control w-75" id="new_usn">
<label for="">New Password</label>
<input type="password" class="form-control w-75" id="new_ps1">
<label for="">Confirm Password</label>
<input type="password" class="form-control w-75" id="new_ps2">
<button class="btn-info p-2 px-4 m-1 border-0" id="save_edit1">save</button>
</div>
<div id="bss" style="display:none;">
<h3 class="text-warning"><b>Change Your Business Here --</b></h3>
<div class="edit_response"></div>
   <label for="">New Business Name</label>
<input type="text" class="form-control w-75" id="new_bss">
<button class="btn-info p-2 px-4 m-1 border-0" id="save_edit2">save</button>
</div>
</div>
</div>



</body>
</html>