<?php
session_start();
include 'include/header.php';
include '../include/database.php';

$db = new database();

$limit = 3;

if (isset($_GET['page'])) {
  $page = $_GET['page'];

}else{

  $page = 1;
}
$ofset = ($page - 1) * $limit;


$qry = "SELECT * FROM user limit {$ofset},{$limit}";
$run = $db->select($qry);
?>
<div class="text-right"> 
<a href="add_users.php" class="btn btn-success">Add User</a>
</div>
<p class=" mx-6 mt-3 text-center bg-dark text-white p-2">List of users</p>
<table class="table table-borderless table-hover">
      <tr>
        <th class="table-success">User Name</th>
        <th class="table-success">Email</th>
        <th class="table-success">Mobile No</th>

      </tr>
      <?php while ($row = $run->fetch_array()): ?> 
       <tr>
        <th><?php echo $row['user_name']; ?></th>
        <th><?php echo $row['email']; ?></th>
        <th><?php echo $row['mobile_no']; ?></th>
        
         <?php endwhile; ?>
      </tr>
      </table>
        </div>
   <?php 
    $qry5 = "SELECT * FROM user";
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

         echo  '<li class="page-item '.$active.'"><a class="page-link" href="all_users.php?page='.$i.'">'.$i.'</a></li>';
       }
     echo '</ul>';

     } 


    ?>

</body>
</html>