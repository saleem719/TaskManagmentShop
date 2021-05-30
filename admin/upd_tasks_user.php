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

if (isset($_POST['update'])){

   $taskstatus  = $_POST['tstatus'];

   $qry3 = " UPDATE tasks SET status='$taskstatus' WHERE id='$task_Id'";

   $data = $db->updatebyuser($qry3);
 }

?>
<div class="container">
<div class="row">

  <h2><center>Update Task</center></h2>
 <div class="col-sm-12 blog-main bg-dark text-white p-2">
<form action="upd_tasks_user.php?id=<?php echo $task_Id; ?>" method="post">
  <div class="form-group">
    <label>Task Name</label>
    <input type="text" name="task_name" class="form-control"  placeholder="Type title" 
    value="<?php echo $stkupd['task_name'];?>" disabled>
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="3" disabled><?php echo $stkupd['description'];?></textarea>
  </div>
  <label>Assigned date</label>
    <input type="text" name="task_name" class="form-control"  placeholder="Type title" 
    value="<?php echo $stkupd['Assign_date'];?>" disabled>
  <div class="form-group">
  <br>
   <select name="tstatus" class="form-control">
  <option value="<?php echo $stkupd['status'];?>"><?php echo $stkupd['status'];?></option>
  <option value="Pending">Pending</option>
  <option value="Completed">Completed</option>
  </select>
  </div> 
  <button type="submit" name="update" class="btn btn-success">Update</button>
  <a href="users.php" class="btn btn-danger">Cancel</a>
  </form>

      
