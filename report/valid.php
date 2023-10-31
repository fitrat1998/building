<?php 
	include'../config.php';
	
	$ret = [];

	if(!empty($_POST['project_id'])){
		$project_id = trim($_POST['project_id']);;
	}
	else {
		$ret += ['xatolik'=>1,'xabar'=>'Empty project_id!!!'];
	}

	if(!empty($_POST['object_id'])){
		$object_id = trim($_POST['object_id']);;
	}
	else {
		$ret += ['xatolik'=>1,'xabar'=>'Empty object_id!!!'];
	}

	if(!empty($_POST['floor'])){
		$floor = trim($_POST['floor']);;
	}
	else {
		$ret += ['xatolik'=>1,'xabar'=>'Empty floor!!!'];
	}

	if(!empty($_POST['room'])){
		$room = trim($_POST['room']);;
	}
	else {
		$ret += ['xatolik'=>1,'xabar'=>'Empty room!!!'];
	}

	if(!empty($_POST['surface'])){
		$surface = trim($_POST['surface']);;
	}
	else {
		$ret += ['xatolik'=>1,'xabar'=>'Empty surface!!!'];
	}

	if(!empty($_POST['worker_id'])){
		$worker_id = trim($_POST['worker_id']);
	}
	else {
		$ret += ['xatolik'=>1,'xabar'=>'Empty worker_id!!!'];
	}

	
    $fee = "";
	
	if($_POST['object']){
		$object = trim($_POST['object']);
	}
	else {
		$object = "No extra objects";
	}

	if($_POST['status'] == "true"){
		$status = "Finished";
	}
	else {
		$status = "In process";
	}

	$old = mysqli_query($link,"SELECT * FROM objects WHERE id = '$object_id'");
	$res = mysqli_fetch_assoc($old);

	$salary = $res['fee'] * $surface;

	$date = time();

	$sql = mysqli_query($link,"INSERT INTO 
		        report_worker(worker_id,project_id,object_id,surface,floor,room,extra_object,salary,status,created_date,updated_date)
	            VALUES('$worker_id','$project_id','$object_id','$surface','$floor','$room','$object','$salary','$status','$date','')");

	if($sql){
		$ret += ['xatolik'=>0,'xabar'=>'Report has added successfully!!!'];
	}
	else{
		$ret += ['xatolik'=>1,'xabar'=>'Something went wrong!!!'];
	}

	echo json_encode($ret);
 ?>