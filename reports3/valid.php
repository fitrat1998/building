<?php 
	include'../config.php';

	if(!empty($_POST['project_id'])){
		$project_id = trim($_POST['project_id']);;
	}
	else {
		echo "Empty project_id!!!";
	}

	if(!empty($_POST['object_name'])){
		$object_name = trim($_POST['object_name']);;
	}
	else {
		echo "Empty object_name!!!";
	}

	if(!empty($_POST['floors'])){
		$floors = trim($_POST['floors']);;
	}
	else {
		echo "Empty floors!!!";
	}

	if(!empty($_POST['rooms'])){
		$rooms = trim($_POST['rooms']);;
	}
	else {
		echo "Empty rooms!!!";
	}

	if(!empty($_POST['surface'])){
		$surface = trim($_POST['surface']);;
	}
	else {
		echo "Empty surface!!!";
	}

	if(!empty($_POST['section'])){
		$row = trim($_POST['section']);;
	}
	else {
		echo "Empty section!!!";
	}

	$date = time();

	$sql = mysqli_query($link,"INSERT INTO 
		               objects(project_id,obj_name,floors,rooms,surface,section,created_date,updated_date,status)
	                   VALUES('$project_id','$object_name','$floors','$rooms','$surface','$row','$date','','new')");

	if($sql){
		echo "good";
	}
	else{
		echo "Something went wrong";
	}
 ?>