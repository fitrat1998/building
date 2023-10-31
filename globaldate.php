<?php 
	session_start();

	$ret = [];

	if(!$_SESSION['globaldate']){
		if($_POST['date']){
			$_SESSION['globaldate'] = $_POST['date'];
			$ret += ['xatolik'=> 0,'xabar'=>'Global Date Set up Successfully!!!'];
		}
		else {
			$ret += ['xatolik'=> 1,'xabar'=>'Please enter valid date!!!'];
		}
	}
	else {
		$ret += ['xatolik'=> 1,'xabar'=>'Global date already set up'];
	}

	echo json_encode($ret);
?>