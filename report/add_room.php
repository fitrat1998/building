<?php 
	include '../config.php';

	$ret = [];

	if (!empty($_POST['name'])) {
		$name = trim($_POST['name']);
	}
	else {
		$ret +=['xatolik'=>1,'xabar'=>'Empty room!!!'];
	}


	$sql = mysqli_query($link,"INSERT INTO workers(name,phone,created_date,updated_date,telegram_id)
	 VALUES('$name','',NOW(),'','')");

	if($sql){
		$ret += ['xatolik'=>0,'xabar'=>'New worker has added successfully!!!'];
	}
	else {
		$ret += ['xatolik'=>1,'xabar'=>'Something went wrong!!!'];
	}

	echo json_encode($ret);
?>