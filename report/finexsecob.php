<?php 
	include '../config.php';

	 $ret = [];

     if (!empty($_POST['fid'])) {
	 	$id = trim($_POST['fid']);
	 }
	 else{
	 	$ret += ['xatolik'=>1,'xabar'=>'Choose object please!!!'];
	 }


	 if ($_POST['object'] != "Choose section") {
	 	$row = trim($_POST['object']);
	 }
	 else{
	 	$ret += ['xatolik'=>1,'xabar'=>'Choose section'];
	 }

	 
	 $old = mysqli_query($link,"SELECT finished_section FROM objects WHERE id = '$id'");
	 $res = mysqli_fetch_assoc($old);

	 $extra = $res['finished_section'].$row.",";

	 $sql = mysqli_query($link,"UPDATE objects SET finished_section = '$extra' WHERE id = '$id'");

	 if($sql){
	 	$ret += ['xatolik'=>0, 'xabar'=>'Section finished successfully!!!'];
	 }
	 else {
	 	$ret += ['xatolik'=>1,'xabar'=>'Something went wrong!!!'];
	 }

	 echo json_encode($ret);
?>