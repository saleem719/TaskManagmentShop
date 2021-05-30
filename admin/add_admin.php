<?php

session_start();

include 'include/header.php';
include '../include/database.php';
?>

<div class="container">
<div class="row">

  <h2><center>Add New Admin</center></h2>
 <div class="col-sm-12 blog-main bg-dark text-white p-2">



  <?php 
  $db = new database();


  $adminId = $_SESSION['adminID'];
  $aEmail  = $_SESSION['adminEmail'];

  if (isset($_POST['submit'])){

   $adname    = $_POST['aName'];
   $ademail   = $_POST['aEmail'];
   $adpass    = $_POST['apass'];

   $qry1 = "SELECT * from admin where email = '$ademail'";
   $chkadmin = $db->select($qry1);
   if ($chkadmin){
          echo "<center> This email address is already being used </center>";
       } 
    elseif ($adname =="" || $ademail =="" || $adpass==""){
       echo "<center> Please fill all required fields  </center>";
   }

   else{
      $qry = "INSERT INTO admin (name, email, Password) 
      VALUES ('$adname','$ademail','$adpass')";
   $data = $db->insert($qry);
   if ($data){
       header('location: add_admin.php');
   }
   else{
         echo "Didn't inserted";
   }
 }
 }
  ?>

  <form action="add_admin.php" method="post">
  <div class="form-group">
    <label>Name *</label>
    <input type="text" name="aName" class="form-control"  placeholder="Name" >
  </div>
    <div class="form-group">
    <label>Email *</label>
    <input type="Email" name="aEmail" class="form-control"  placeholder="Email" >
  </div>
  <div class="form-group">
    <label>Password *</label>
    <input type="Password" name="apass" class="form-control"  placeholder="Password" >
  </div>
  <button type="submit" name="submit" class="btn btn-success">Submit</button>
  <a href="dashboard.php" class="btn btn-danger">Cancel</a>
  </form>

      
