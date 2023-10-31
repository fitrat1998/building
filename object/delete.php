<?php 
	include '../config.php';
	$id = $_POST['id'];

	$sql = mysqli_query($link,"DELETE FROM objects WHERE id = '$id'");

	if($sql){
		echo"good";
	}
	else {
		echo "Something went wrong!!!";
	}
?>