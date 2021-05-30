<?php

class database{

	public $host = "localhost";
	public $user = "root";
	public $pass = "";
	public $db   = "tms";

	public $link;
	public $error;

	public function __construct(){

		$this->connection();

	}

	protected function connection(){

	$this->link = new mysqli($this->host, $this->user, $this->pass, $this->db);

	if (!$this->link) {

		$this->error = "Connection Error" .$this->connect_error;
	}
		
	}

	public function select($qry){

		$result = $this->link->query($qry);

		if($result->num_rows > 0){

			return $result;

		} else{

			return false;
		}

	}	

	public function insert($qry){

		$insert = $this->link->query($qry);

		if($insert){

			header('location: dashboard.php');

		} else{

			echo "Didn't insertd";
		}
	}

	public function update($qry){

		$update = $this->link->query($qry);

		if ($update) {

			header('location: tasks.php?msg=Task updated.....');
			
		} else{

			echo "Didn't updated";
		}


	}

	public function updatebyuser($qry){

		$updatedbuser = $this->link->query($qry);

		if ($updatedbuser) {

			header('location: users.php?msg=Task updated.....');
			
		} else{

			echo "Didn't updated";
		}


	}

		public function delete($qry){

		$deleted = $this->link->query($qry);

		if ($deleted) {

			header('location: tasks.php?msg=Task deleted.....');
			
		} else{

			echo "faailed to delete";
		}


	}


	public function deleteUser($qry){

		$deleted = $this->link->query($qry);

		if ($deleted) {

			header('location: all_users.php?msg= User deleted successfully.....');
			
		} else{

			echo "faailed to delete";
		}


	}


public function passChange($qry){

		$updatePass = $this->link->query($qry);

	   return $updatePass;

	}


}





?>