<?php
session_start();

include 'include/header.php';
include '../include/database.php';

$db = new database();
$qry = "SELECT * FROM user";
$usr = $db->select($qry);

?>

<div class="container">
<div class="row">
 <h2><center><i class="fas fa-tasks"></i>      Add New Task</center></h2>
 <div class="col-sm-12 blog-main bg-dark text-white p-2">
 

  <?php 

  $qry = "SELECT * FROM groups";
  $run = $db->select($qry);

  if (isset($_POST['submit'])){

   $tname    = $_POST['task_name'];
   $tdetail  = $_POST['description'];
   $assignto = $_POST['gid'];
   $Status   = $_POST['tstatus'];
   $ddate   = $_POST['dueDate'];

   if ($tname =="" || $tdetail =="" || $assignto=="" || $Status=="" || $ddate=="") {
       echo "<center> Please fill all fields to processed</center>";
   } else {

   $qry = "INSERT INTO tasks (task_name,description,group_id,status,due_date) 
   VALUES ('$tname','$tdetail','$assignto','$Status','$ddate')";
   $data = $db->insert($qry);
 }
 }
  ?>

  <form action="add_tasks.php" method="post">
  <div class="form-group">
    <label>Task Name</label>
    <input type="text" name="task_name" class="form-control"  placeholder="Type title" required>
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="3" id="inputText"></textarea>
  </div>
    <div class="form-group">
     <label>Assign group</label>
  <select name="gid" class="form-control" id="searchddl">
  <option selected disabled>Select group</option>
  <?php while ($rows = $run->fetch_array()):?>
  <option value="<?php echo $rows['group_id'];?>"><?php echo $rows['group_name'];?></option>
  <?php endwhile; ?>
  </select> 
<br></div>
<div class="form-group">
   <label>Task Status: </label>
   <select name="tstatus" class="form-control">
  <option value="Pending">Pending</option>
  <option value="Completed">Completed</option>
  </select>
  </div>
  <div class="form-group">
    <label>Due date</label>
    <input type="date" name="dueDate" class="form-control"  required>
  </div>
  <button type="submit" name="submit" class="btn btn-success">Submit</button>
  <a href="dashboard.php" class="btn btn-danger">Cancel</a>
  </form>
      
<script>
$("#searchddl").chosen();

  
tinymce.init({
      selector: 'textarea#inputText',
      height: '300',
   });
</script>