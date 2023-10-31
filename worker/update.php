<?php 
	session_start();
	include '../config.php';

	$ret = [];

	if(!empty($_POST['name'])){
		$name = $_POST['name'];
	}
	else {
		$ret += ['xatolik'=> 1,'xabar'=>"Empty name!!!"];
	}

	if(!empty($_POST['phone'])){
		$phone = $_POST['phone'];
	}
	else {
		$ret += ['xatolik'=> 1,'xabar'=>"Empty phone!!!"];
	}

	

	$id = $_SESSION['pr_id'];
	$time = time();

	$sql = mysqli_query($link,"UPDATE workers SET name = '$name',phone = '$phone'
    WHERE id = '$id'");

	if($sql){
		$ret += ['xatolik'=> 0,'xabar'=>'Worker updated successfully!!!'];
	}
	else {
		$ret += ['xatolik'=> 1,'xabar'=>'Something went wrong!!!'];
	}

	echo json_encode($ret);
?>