<?php 
	include'../config.php';

	$ret = [];

	if(!empty($_POST['name'])){
		$name = trim($_POST['name']);;
	}
	else {
		$ret = ['xatolik'=> 1,'xabar'=>'Empty name!!!'];
	}

	if(!empty($_POST['phone'])){
		$phone = trim($_POST['phone']);;
	}
	else {
		$ret = ['xatolik'=> 1,'xabar'=>'Empty phone!!!'];
	}

	

	$date = time();

	$sql = mysqli_query($link,"INSERT INTO 
		               workers(name,phone,created_date,updated_date,telegram_id)
	                   VALUES('$name','$phone','$date','','')");

	if($sql){
		$ret = ['xatolik'=> 0,'xabar'=>'New worker added successfully!!!'];
	}
	else{
		$ret = ['xatolik'=> 1,'xabar'=>'Something went wrong!!!'];
	}

	echo json_encode($ret);
 ?>