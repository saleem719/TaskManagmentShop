<?php
session_start();
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

$qry1 = "SELECT * FROM tasks";
$run = $db->select($qry1);

$qry = "SELECT * from tasks t left join groups g on t.group_id = g.group_id  LIMIT {$ofset},{$limit}";
$data = $db->select($qry);
?>
<div class="text-right"> 
<a href="add_tasks.php" class="btn btn-success">Add New Task</a> <br>
</div>
<h2><i class="fas fa-tasks"></i>Tasks</h2>
<table class="table table-borderless table-hover">

      <tr>
        <th class="table-success">S.No</th>
        <th class="table-success">Task Name</th>
        <th class="table-success">Assigned group</th>
        <th class="table-success">Assign date</th>
         <th class="table-success">Due date</th>
        <th class="table-success">Status</th>
        <th class="table-success">Action</th>

      </tr>
       <?php while ($usr = $data->fetch_array()): ?> 
       <tr>
        <th><?php echo $usr['id']; ?></th>
        <th><?php echo $usr['task_name']; ?></th>
        <th><?php echo $usr['group_name']; ?></th>
        <th><?php echo formateDate($usr['Assign_date']); ?></th>
        <th><?php echo $usr['due_date']; ?></th>
        <th><?php echo $usr['status']; ?></th>
        <th><a href="upd_tasks.php?id=<?php echo $usr['id'];?>"><i class="fa fa-edit" style="font-size:35px;color:red"></i></a>
        <a href="detail.php?id=<?php echo $usr['id'];?>"><i class="fas fa-eye" style="font-size:35px;color:green" ></i></a>
        <a href="delete.php?delete_id=<?php echo $usr['id'];?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fas fa-trash-alt" style="font-size:35px" ></i></a>
       <?php endwhile; ?>
      </th>
      </tr>
     
      </thead>
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
           $active ='active';
        }else{

          $active ='';
        }
         
         echo  '<li class="page-item '.$active.'"><a class="page-link" href="tasks.php?page='.$i.'">'.$i.'</a></li>';
       }
     
     echo '</ul>';

     } 

    ?>
      <a href="dashboard.php" class="btn btn-danger">BACK</a>
        </div>
        
<script type="text/javascript">>
      function loaded()
{
    document.getElementById("delete-<?php echo $delete_id; ?>").addEventListener(
        "submit",
        function(event)
        {
            if(confirm("Are you sure you want to delete?"))
            {
                event.preventDefault();
            }
            
            return false;
        },
        false
     );
}
window.addEventListener("load", loaded, false);

</script>


<?php

function formateDate($date){

  return date("j, n, Y");
}


?>
</body>
</html>