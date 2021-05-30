<?php

session_start();

include 'include/headeruser.php';
include '../include/database.php';

$db = new database();
$qry = "SELECT * FROM user";
$users = $db->select($qry);

$task_Id = $_GET['id'];
$qry2 = "SELECT * FROM tasks where id = '$task_Id'";
$tsk = $db->select($qry2);
$stkupd = $tsk->fetch_array();

?>
<div class="container">
<div class="row">
 <h2><center><i class="fas fa-tasks"></i>      Task detail</center></h2>
 <div class="col-sm-12 blog-main bg-dark text-white p-2">

<form action="upd_tasks.php?id=<?php echo $task_Id; ?>" method="post">
  <div class="form-group">
    <label>Task Name</label>
    <input type="text" name="task_name" class="form-control"  placeholder="Type title" 
    value="<?php echo $stkupd['task_name'];?>" disabled>
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="3" disabled><?php echo $stkupd['description'];?></textarea>
  </div>
    <div class="form-group">
    <label>Assigned date</label>
    <input name="description" class="form-control" value="<?php echo $stkupd['Assign_date'];?>" disabled>
  </div>
    <div class="form-group">
    <label>Due date</label>
    <input name="description" class="form-control" value="<?php echo $stkupd['due_date'];?>" disabled>
  </div>
 <div class="form-group">
  <label>Status</label>
    <input type="text" name="status" class="form-control" value="<?php echo $stkupd['status'];?>" disabled>
  </div>
  <a href="users.php" class="btn btn-danger">BACK</a>
  </form>

  