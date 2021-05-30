<?php
session_start();

include 'include/header.php';
include '../include/database.php';
?>

<div class="container">
<div class="row">

  <h2><center>Create New Group</center></h2>
 <div class="col-sm-12 blog-main bg-dark text-white p-2">





  <?php 

  $db = new database();

  $qry = "SELECT * FROM groups";
  $run = $db->select($qry);


  if (isset($_POST['submit'])){

   $gpname    = $_POST['gName'];

  if($gpname ==""){
       echo "<center> please fill all required fields  </center>";
   }else{
      $qry = "INSERT INTO groups (group_name) VALUES ('$gpname')";
      $data = $db->insert($qry);
 }
 }
  ?>

  <form action="add_group.php" method="post">
  <div class="form-group">
    <label>Group Name *</label>
    <input type="text" name="gName" class="form-control"  placeholder="Enter group name" >
  </div>
  <button type="submit" name="submit" class="btn btn-success">Submit</button>
  <a href="dashboard.php" class="btn btn-danger">Cancel</a>
  </form>

      
