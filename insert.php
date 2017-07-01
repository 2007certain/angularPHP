<?php 
	// insert.php

	$connect = mysqli_connect("localhost", "root", "", "angular");
	$data = json_decode(file_get_contents("php://input"));

	if(count($data)>0){
		$name = mysqli_real_escape_string($connect, $data->name);
		$dateOfBirth = mysqli_real_escape_string($connect, $data->dateOfBirth);
		$gender = mysqli_real_escape_string($connect, $data->gender);
		$salary = mysqli_real_escape_string($connect, $data->salary);
		$btnName = $data->btnName;
		if($btnName == 'Add'){
			$query = "INSERT INTO employees(name, dateOfBirth, gender, salary) VALUES('$name', '$dateOfBirth', '$gender', '$salary')";
			if(mysqli_query($connect, $query)){
				echo "Data inserted...";
			}else{
				echo "ERROR!!!";
			}
		}
		if($btnName == 'Update'){
			$id = $data->id;
			$query = "UPDATE employees SET name = '$name', dateOfBirth = '$dateOfBirth', gender = '$gender', salary = '$salary' WHERE id = '$id'";
			if(mysqli_query($connect, $query)){
				echo 'Data Updated...!!!';
			}else{
				echo 'Error!!!';	
			}
		}

	}
?>