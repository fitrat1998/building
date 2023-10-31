<?php 
	include'../config.php';



	if(!empty($_POST['name'])){
		$name = trim($_POST['name']);;
	}
	else {
		echo "Empty name!!!";
	}

	if(!empty($_POST['address'])){
		$address = trim($_POST['address']);;
	}
	else {
		echo "Empty address!!!";
	}

	// if(!empty($_POST['floors'])){
	// 	$floors = trim($_POST['floors']);;
	// }
	// else {
	// 	echo "Empty floors!!!";
	// }

	// if(!empty($_POST['rooms'])){
	// 	$rooms = trim($_POST['rooms']);;
	// }
	// else {
	// 	echo "Empty rooms!!!";
	// }

	if(!empty($_POST['comment'])){
		$comment = trim($_POST['comment']);;
	}
	else {
		echo "Empty comment!!!";
	}

	$date = time();

	$sql = mysqli_query($link,"INSERT INTO 
		               projects(project_name,address,status,comment,created_date,updated_date)
	                   VALUES('$name','$address','New','$comment','$date','')");

	if($sql){
		echo "good";
	}
	else{
		echo "Something went wrong";
	}
 ?>