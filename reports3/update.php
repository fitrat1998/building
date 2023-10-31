<?php 
	session_start();
	include '../config.php';

	$ret = [];

	if(!empty($_POST['project'])){
		$project = $_POST['project'];
		$sql = mysqli_query($link,"SELECT * FROM projects WHERE project_name = '$project'");
		$res = mysqli_fetch_assoc($sql);
		$project_id = $res['id'];
	}
	else {
		$ret += ['xatolik'=>1,'xabar'=>'Empty project name!!!'];
	}

	if(!empty($_POST['object'])){
		$object = $_POST['object'];
		$sql2 = mysqli_query($link,"SELECT * FROM objects WHERE obj_name = '$object'");
		$res2 = mysqli_fetch_assoc($sql2);
		$object_id = $res2['id'];
	}
	else {
		$ret += ['xatolik'=>1,'xabar'=>'Empty object name!!!'];
	}

	if(!empty($_POST['worker'])){
		$worker = $_POST['worker'];
		$sql3 = mysqli_query($link,"SELECT * FROM workers WHERE name = '$worker'");
		$res3 = mysqli_fetch_assoc($sql3);
		$worker_id = $res3['id'];
	}
	else {
		$ret += ['xatolik'=>1,'xabar'=>'Empty worker name!!!'];
	}

	if(!empty($_POST['floor'])){
		$floor = $_POST['floor'];
	}
	else {
		$ret += ['xatolik'=>1,'xabar'=>'Empty floor!!!'];
	}

	if(!empty($_POST['room'])){
		$room = $_POST['room'];
	}
	else {
		$ret += ['xatolik'=>1,'xabar'=>'Empty room!!!'];
	}

	if(!empty($_POST['surface'])){
		$surface = $_POST['surface'];
	}
	else {
		$ret += ['xatolik'=>1,'xabar'=>'Empty surface!!!'];
	}

	if(!empty($_POST['salary'])){
		$salary = $_POST['salary'];
	}
	else {
		$ret += ['xatolik'=>1,'xabar'=>'Empty salary!!!'];
	}

	$time = time();
	$id = $_POST['id'];

	$sql = mysqli_query($link,"UPDATE report_worker SET 
	worker_id = '$worker_id',project_id = '$project_id',object_id ='$object_id',floor ='$floor',room ='$room',surface ='$surface',salary = '$salary',updated_date ='$time'
    WHERE id = '$id'");

	if($sql){
		$ret += ['xatolik'=>0,'xabar'=>'Updated successfully!!!'];
	}
	else {
		$ret += ['xatolik'=>1,'xabar'=>'Something went wrong!!!'];
	}

	echo json_encode($ret);
?>