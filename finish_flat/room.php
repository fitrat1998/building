<?php 
	include '../config.php';

	 $name = $_POST['name'];


	 $sql = mysqli_query($link,"SELECT * FROM objects WHERE obj_name = '$name' AND floors = 0");

	 ?>
	 	 <i class="fa fa-house"></i> 
         <label> Flat</label> 
         <select name="room" class="js-example-basic-single bg-light form-control" 
          style="background-color: #F8F8F8 !important;" id="room" onchange="change()">
          <option>Choose flat</option>
         <?php 
           while($row = mysqli_fetch_assoc($sql)){
           		 ?>
               <option style="background-color: #F8F8F8 !important"; value="<?=$row['rooms']?>"><?=$row['rooms'];?></option>
             <? 
           } 
         ?>
        </select>
	 <?

?>
	
