<?php 
	include '../config.php';

	 $id = $_POST['project'];

	 $sql = mysqli_query($link,"SELECT * FROM objects WHERE project_id = '$id'");
	 
	 while ($rows = mysqli_fetch_assoc($sql)) {
	 	?>
	 		<option value="<?=$rows['id']?>"><?=$rows['obj_name']?></option>
	 	<?
	 }

	 


?>
	
