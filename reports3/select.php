
<?php 
	include '../config.php';

	 $id = $_POST['ids'];


	 $sql = mysqli_query($link,"SELECT object_id, section, floor,IF(status='Finished', 'Finished', 'In proccess'), created_date, updated_date, COUNT(section), SUM(surface) FROM extra_object WHERE flat='$id' GROUP BY section HAVING COUNT(surface) > 0");

	 ?>
	 	     <i class="fa fa-stairs"></i>
         <label>Extra object</label>
         <select name="select" class="js-example-basic-single bg-light form-control select" 
          style="background-color: #F8F8F8 !important;" onchange="d()" id="select">
          <option>choose section</option>
         <?php 
           while($row = mysqli_fetch_assoc($sql)){

           	// print_r($row);
           	?>
           		<option value="<?=$row['section']?>"><?=$row['section']?></option> 	
           	<?
        } 
         ?>
        </select>
	 <?
	 
	 

	 


?>
	
