<?php 
	session_start();
	include '../config.php';

	if(!empty($_POST['name'])){
		$name = $_POST['name'];
	}
	else {
		echo "Empty name!!!";
	}

	if(!empty($_POST['address'])){
		$address = $_POST['address'];
	}
	else {
		echo "Empty address!!!";
	}

	if(!empty($_POST['comment'])){
		$comment = $_POST['comment'];
	}
	else {
		echo "Empty comment!!!";
	}

	$id = $_SESSION['pr_id'];
	$time = time();

	$sql = mysqli_query($link,"UPDATE projects SET 
	project_name = '$name',address ='$address',comment ='$comment',updated_date ='$time'
    WHERE id = '$id'");

	if($sql){
		echo "good";
	}
	else {
		echo "Something went wrong!!!";
	}
?>