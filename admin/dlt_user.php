<?php
session_start();
include 'include/header.php';
include '../include/database.php';

$db = new database();


//deleting tasks
 if (isset($_GET['delete_id'])) {
     $delete_id = $_GET['delete_id'];

     $qry = "DELETE FROM user WHERE user_id = '$delete_id' ";
     $run = $db->deleteUser($qry);
}

?>