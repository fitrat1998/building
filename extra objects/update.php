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

	$id = $_SESSION['sec_id'];
	$time = time();

	$sql = mysqli_query($link,"UPDATE sections SET section_name = '$name'
    WHERE id = '$id'");

	if($sql){
		$ret += ['xatolik'=> 0,'xabar'=>'Worker updated successfully!!!'];
	}
	else {
		$ret += ['xatolik'=> 1,'xabar'=>'Something went wrong!!!'];
	}

	echo json_encode($ret);
?>