<?php 
	// Delete.php
	$connect = mysqli_connect("localhost", "root", "", "angular");
	$data = json_decode(file_get_contents("php://input"));

	if(count($data)>0){
		$id = $data->id;
		$query = "DELETE FROM employees WHERE id = '$id'";
		if(mysqli_query($connect, $query)){
			echo 'Data Deleted...!!!';
		}else{
			echo 'Error!!!';
		}
	}
?>