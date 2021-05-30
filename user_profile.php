<?php

include 'include/headeruser.php';
include '../include/database.php';
?>

<div class="container">
<div class="row">

  <h2><center>My profile</center></h2>
 <div class="col-sm-12 blog-main bg-dark text-white p-2">



  <?php 

  $db = new database();

  if (isset($_POST['submit'])){

   $uname    = $_POST['userName'];
   $uemail   = $_POST['userEmail'];
   $upass    = $_POST['upass'];
   $umob     = $_POST['umobile'];

   if ($uname =="" || $uemail =="" || $upass=="" || $umob=="") {
       echo "<center> Please fill all fields </center>";
   } else {

   $qry = "INSERT INTO user (user_name, email, password, mobile_no) 
   VALUES ('$uname','$uemail','$upass','$umob')";
   $data = $db->insert($qry);
 }
 }
  ?>

  <form action="add_users.php" method="post">
  <div class="form-group">
    <label>User Name</label>
    <input type="text" name="userName" class="form-control"  placeholder="Name" required>
  </div>
    <div class="form-group">
    <label>Email</label>
    <input type="Email" name="userEmail" class="form-control"  placeholder="Email" required>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="Password" name="upass" class="form-control"  placeholder="Password" required>
  </div>
    <div class="form-group">
    <label>Mobile No</label>
    <input type="text" name="umobile" class="form-control"  placeholder="Mobile No" required>
  </div>
  <button type="submit" name="submit" class="btn btn-success">Submit</button>
  <a href="dashboard.php" class="btn btn-danger">Cancel</a>
  </form>

      
