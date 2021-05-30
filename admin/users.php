
<?php 

session_start();
 

if(!isset($_SESSION['user'])) {
  header("location: ../index.php");
} else{

include 'include/headeruser.php';
include '../include/database.php';

$db = new database();

$usrid = $_SESSION['user'];

//tasks assigned
$qry1 = "SELECT * from tasks inner join user on tasks.group_id = user.group_id where email= '$usrid' ";
$data = $db->select($qry1);

$qry2 = "SELECT * FROM tasks";
$run = $db->select($qry2);

//tasks assigned to logedin user
$qry3 = "SELECT count(id) AS total from tasks inner join user on tasks.group_id = user.group_id WHERE 
         email = '$usrid'";  
$totatsk = $db->select($qry3);
$tsk = $totatsk->fetch_array();
$num_rows=$tsk['total'];

//Pending tasks of logedin user
$qry4 = "SELECT count(id) AS total from tasks inner join user on tasks.group_id = user.group_id  
         where status='Pending' 
         AND email = '$usrid' ";
$totausr = $db->select($qry4);
$usrs = $totausr->fetch_array();
$nsr_rows=$usrs['total'];

//tasks completed by assigned user
$qry5 = "SELECT count(id) AS total from tasks inner join user on tasks.group_id = user.group_id 
         where status='Completed' 
         AND email = '$usrid' ";
$comp = $db->select($qry5);
$tcomp = $comp->fetch_array();
$complete_rows=$tcomp['total'];

?>
<div class="row text-center mx-5">
<div class="col-sm-4">
<div class="card text-white bg-danger mb-3">
<div class="card-header"> Assigned to me </div>
<div class="card-body">
<h4 class="card-title"><?php echo $num_rows; ?></h4>
<a class="btn text-white" href="AssgnTme.php">View </a>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="card text-white bg-success mb-3" style="max-width:18rem;">
<div class="card-header">Completed</div>
<div class="card-body">
<h4 class="card-title"><?php echo $complete_rows; ?></h4>
<a class="btn text-white" href="workdonebme.php">View </a>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="card text-white bg-info mb-3">
<div class="card-header"> Pendings </div>
<div class="card-body">
<h4 class="card-title"><?php echo $nsr_rows; ?></h4>
<a class="btn text-white" href="myPendings.php">View </a>
</div>
</div>
</div>
</div>



<div class="mx-9 mt-7 text-center">
<p class="bg-dark text-white p-2"> My tasks</p>
</div>
<table class="table table-borderless table-hover">
      <tr>
        <th class="table-success">Task name</th>
        <th class="table-success">Assign date</th>
        <th class="table-success">Due date</th>
        <th class="table-success">Status</th>
        <th class="table-success">Action</th>
      </tr>
      <?php if ($data){
      while ($row = $data->fetch_array()): ?>
       <tr>
        <th><?php echo $row['task_name']; ?></th>
        <th><?php echo $row['Assign_date']; ?></th>
        <th><?php echo $row['due_date']; ?></th>
        <th><?php echo $row['status']; ?></th>
        <th><a href="upd_tasks_user.php?id=<?php echo $row['id'];?>"><i class="fa fa-edit" style="font-size:30px;color:red"></i></a>
        <a href="detailtasks_user.php?id=<?php echo $row['id'];?>"><i class="fas fa-eye" style="font-size:35px;color:green" ></i></a></th>
       <?php
       endwhile;
       } else { ?> 
      </tr>
      </table>
      <?php
        echo "<h4><font color=red>&nbsp;&nbsp;&nbsp;&nbsp; Task not assigned </font></h4>";
    }?>
        </div>


<?php } ?>
</body>
</html>