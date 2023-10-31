<?php 
	include'../config.php';

	$ret = [];

	if(!empty($_POST['project_id']) && $_POST['project_id'] != "Choose project"){
		$project_id = trim($_POST['project_id']);;
	}
	else {
		$ret = ['xatolik'=> 1,'xabar'=>'Empty project_id!!!'];
	}

	if(!empty($_POST['object_id']) && $_POST['object_id'] != "Choose project" ){
		$object_id = trim($_POST['object_id']);;
	}
	else {
		$ret = ['xatolik'=> 1,'xabar'=>'Empty object_id!!!'];
	}

	if(!empty($_POST['worker_id']) && $_POST['worker_id'] != "Choose worker"){
		$worker = trim($_POST['worker_id']);;
	}
	else {
		$ret = ['xatolik'=> 1,'xabar'=>'Empty worker!!!'];
	}

	if(!empty($_POST['fee'])){
		$fee = trim($_POST['fee']);;
	}
	else {
		$ret = ['xatolik'=> 1,'xabar'=>'Empty fee!!!'];
	}

	

	$date = time();

	$sql = mysqli_query($link,"INSERT INTO 
		               fee(project_id,object_id,worker_id,fee,created_date,updated_date)
	                   VALUES('0','0','$worker','$fee','$date','')");

	if($sql){
		$ret = ['xatolik'=> 0,'xabar'=>'New worker added successfully!!!'];
	}
	else{
		$ret = ['xatolik'=> 1,'xabar'=>'Something went wrong!!!'];
	}

	echo json_encode($ret);
 ?>