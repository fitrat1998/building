<?php 
	session_start();
	include '../config.php';

	$ret = [];

	$pr_id = $_POST['pr_id'];
	$ob_id = $_POST['ob_id'];
	$wk_id = $_POST['wk_id'];

	// if(!empty($_POST['project'])){
	// 	$project = $_POST['project'];
	// }
	// else {
	// 	$ret += ['xatolik'=> 1,'xabar'=>"Empty project!!!"];
	// }

	// if(!empty($_POST['object'])){
	// 	$object = $_POST['object'];
	// }
	// else {
	// 	$ret += ['xatolik'=> 1,'xabar'=>"Empty object!!!"];
	// }

	if(!empty($_POST['worker'])){
		$worker = $_POST['worker'];
	}
	else {
		$ret += ['xatolik'=> 1,'xabar'=>"Empty worker!!!"];
	}

	if(!empty($_POST['fee'])){
		$fee = $_POST['fee'];
	}
	else {
		$ret += ['xatolik'=> 1,'xabar'=>"Empty fee!!!"];
	}

	

	$id = $_SESSION['res_id'];
	$time = time();

	$sql = mysqli_query($link,"UPDATE fee SET
		                worker_id = '$wk_id',fee = '$fee' WHERE id = '$id'");

	if($sql){
		$ret += ['xatolik'=> 0,'xabar'=>'Worker updated successfully!!!'];
	}
	else {
		$ret += ['xatolik'=> 1,'xabar'=>'Something went wrong!!!'];
	}

	echo json_encode($ret);
?>