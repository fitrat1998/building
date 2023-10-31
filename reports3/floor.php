<?php 
	include '../config.php';

	 $id = $_POST['idf'];


	 $sql = mysqli_query($link,"SELECT * FROM objects WHERE id='$id'");

	 ?>
	 	 <i class="fa fa-arrow-up-1-9"></i>
         <label> Floor</label> 
         <select name="floor" class="js-example-basic-single bg-light form-control floor" 
          style="background-color: #F8F8F8 !important;" onchange="b()" id="floor">
          <option>choose floor</option>
         <?php 
           while($row = mysqli_fetch_assoc($sql)){
           	for ($i=0; $i <= $row['floors'] ; $i++) { 
           		 ?>
               <option style="background-color: #F8F8F8 !important"; value="<?=$row['id']?>"><?=$i?></option>
             <? 
           	}
        } 
         ?>
        </select>
	 <?
	 
	 

	 


?>
	
