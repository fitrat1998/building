<?php 
	session_start();
	include '../config.php';


	// print_r($_POST);
	// exit;

	$ret = [];

	$id = $_POST['id'];

	$object_name = $_POST['object_name'];

	if(!empty($_POST['section'])){

		$sections = "";

		foreach($_POST['section'] as $v){
			$sections.= $v.",";
		}

	}
	else {
	   $sections = $_POST['section_ex'];
	}

	if(!empty($_POST['worker'])){

		$workers = "";

		foreach($_POST['worker'] as $v){
			$workers.= $v.",";
		}

	}
	else {
	   $workers = $_POST['worker_ex'];
	}

	$floor = trim($_POST['floor']);

	$surface = trim($_POST['surface']);



	

	$id = $_SESSION['sec_id'];
	$time = time();

	$sql = mysqli_query($link,"UPDATE extra_object SET object_name = '$object_name',floor = '$floor',
	 section = '$sections',surface = '$surface',workers = '$workers',updated_date = '$time'
    WHERE id = '$id'");

	if($sql){
		$ret += ['xatolik'=> 0,'xabar'=>'Worker updated successfully!!!'];
	}
	else {
		$ret += ['xatolik'=> 1,'xabar'=>'Something went wrong!!!'];
	}

	echo json_encode($ret);
?>