<?php 
session_start(); 

if(!isset($_SESSION['admin'])) {
  header("location: ../index.php");
} else{

include 'include/header.php';
include '../include/database.php';

$db = new database();


$limit = 4;

if (isset($_GET['page'])) {
  $page = $_GET['page'];

}else{

  $page = 1;
}
$ofset = ($page - 1) * $limit;

$qry = "SELECT * FROM tasks";
$run = $db->select($qry);

$qry1 = "SELECT * from tasks t left join groups g on t.group_id = g.group_id  LIMIT {$ofset},{$limit}";
$data = $db->select($qry1);

//total tasks
$qry2 = "SELECT count(id) AS total from tasks";
$totatsk = $db->select($qry2);
$tsk = $totatsk->fetch_array();
$num_rows=$tsk['total'];

//tasks pending
$qry3 = "SELECT count(id) AS total from tasks where status='pending'";
$totausr = $db->select($qry3);
$usrs = $totausr->fetch_array();
$nsr_rows=$usrs['total'];

//tasks completed
$qry4 = "SELECT count(id) AS total from tasks where status='Completed'";
$comp = $db->select($qry4);
$tcomp = $comp->fetch_array();
$complete_rows=$tcomp['total'];


?>
<div class="row text-center mx-8 p-2">
<div class="col-sm-4">
<div class="card text-white bg-danger mb-3">
<div class="card-header"> Order received </div>
<div class="card-body">
<h4 class="card-title"></i><?php echo $num_rows; ?></h4>
<a class="btn text-white" href="tasks.php">View </a>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="card text-white bg-success mb-3">
<div class="card-header">Completed </div>
<div class="card-body">
<h4 class="card-title"><?php echo $complete_rows; ?></h4>
<a class="btn text-white" href="comlete_task.php">View </a>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="card text-white bg-info mb-3">
<div class="card-header"> Pending </div>
<div class="card-body">
<h4 class="card-title"><?php echo $nsr_rows; ?></h4>
<a class="btn text-white" href="pending_task.php">View </a>
</div>
</div>
</div>
</div>
</div>
<div class="mx-6 mt-5 text-center">
<p class="bg-dark text-white p-2">List of tasks</p>
</div>
<table class="table table-borderless table-hover">
      <tr>
        <th class="table-success">Task Name</th>
        <th class="table-success">Assign date</th>
        <th class="table-success">Due date</th>
        <th class="table-success">Assigned group</th>
        <th class="table-success">Detail</th>
      </tr>
       <?php while ($usr = $data->fetch_array()): ?> 
       <tr>
        <th><?php echo $usr['task_name']; ?></th>
        <th><?php echo formateDate($usr['Assign_date']); ?></th>
        <th><?php echo $usr['due_date']; ?></th>
        <th><?php echo $usr['group_name']; ?></th>
        <th><a href="detail.php?id=<?php echo $usr['id'];?>"><i class="fas fa-eye" style="font-size:35px;color:green" ></i></a></th>
         <?php endwhile; ?>
      </tr>
      </table>

   <?php 
    $qry5 = "SELECT * FROM tasks";
    $run = $db->select($qry5);

    if($run){
       $totalRecord = $run->num_rows;
       $totalPage = ceil($totalRecord / $limit);


       echo '<ul class="pagination pagination-lg justify-content-center">';

       for ($i=1; $i <= $totalPage ; $i++) { 

        if($i == $page){
           $active = "active";
        }else{

          $active = "";
        }

         echo  '<li class="page-item '.$active.'"><a class="page-link" href="dashboard.php?page='.$i.'">'.$i.'</a></li>';
       }
     echo '</ul>';

     } 


    ?>
</div>


</div>
</div>
<?php } ?>
</body>
</html>
<?php

function formateDate($date){

  return date("j, n, Y");
}


?>