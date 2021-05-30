<?php
session_start();
include 'include/header.php';
include '../include/database.php';

$db = new database();
$qry = "SELECT * FROM groups";
$users = $db->select($qry);

$task_Id = $_GET['id'];
$qry2 = "SELECT * FROM tasks where id = '$task_Id'";
$tsk = $db->select($qry2);
$stkupd = $tsk->fetch_array();

if (isset($_POST['update'])){

   $taskname    = $_POST['task_name'];
   $taskdetail  = $_POST['description'];
   $assignedusr = $_POST['group'];
   $taskstatus  = $_POST['tstatus'];

   $qry = " UPDATE tasks SET task_name='$taskname', description='$taskdetail', group_id='$assignedusr', 
            status='$taskstatus' WHERE id ='$task_Id'";

   $data = $db->update($qry);
 }

?>
<div class="container">
<div class="row">

  <h2><center>Update Task</center></h2>
 <div class="col-sm-12 blog-main bg-dark text-white p-2">
<form action="upd_tasks.php?id=<?php echo $task_Id; ?>" method="post">
  <div class="form-group">
    <label>Task Name</label>
    <input type="text" name="task_name" class="form-control"  placeholder="Type title" 
    value="<?php echo $stkupd['task_name'];?>">
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="3"><?php echo $stkupd['description'];?></textarea>
  </div>
  <div class="form-group">
    <label>Assigned group:</label>
  <select name="group" class="form-control" id="searchddl">
    <?php while ($usr = $users->fetch_array()):?>
  <option value="<?php echo $usr['group_id'];?>" <?php echo $usr['group_id'] == $stkupd['group_id'] ? 'selected' : ''  ?> ><?php echo $usr['group_name']; ?></option>
<?php endwhile; ?>
  </select> 
</div>
   <label>Status:</label>
   <select name="tstatus" class="form-control">
  <option value="<?php echo $stkupd['status'];?>"><?php echo $stkupd['status'];?></option>
  <option value="Pending">Pending</option>
  <option value="Completed">Completed</option>
  </select>
  </div> 
  <button type="submit" name="update" class="btn btn-success">Update</button>
  <a href="dashboard.php" class="btn btn-danger">Cancel</a>
  </form>

      
<script>
$("#searchddl").chosen();
</script>