<?php 
	session_start();

	$ret = [];		

	if($_POST['id'] == 1){
		$ret += ['xatolik'=> 0,'xabar'=>'Global date unset Successfully!!!'];
		// $ret += ['xatolik'=> 0,'xabar'=>'shuysas'];
		unset($_SESSION['globaldate']);

	}else {
		$ret += ['xatolik'=> 1,'xabar'=>'Nashuysas'];

	}

	echo json_encode($ret);

?>