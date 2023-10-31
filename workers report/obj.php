<?php 
	include '../config.php';

	 echo $name = $_POST['tbody'];
      $total = 0;
      $sum = 0;
      $sql = mysqli_query($link,"SELECT object_name,workers,section,created_date, updated_date, SUM(surface) FROM extra_object 
       WHERE object_name = '$name' GROUP BY workers HAVING COUNT(surface) > 0");
      $sql1 = mysqli_query($link,"SELECT * FROM extra_object");
        while($row = mysqli_fetch_assoc($sql)){

            $wk_id1 = explode(",",$row1['workers']);
            array_pop($wk_id1);
            
            $wid = $wk_id1[0];
            $section2 = $row['section'];
            
      ?>
          <tr>
              <td><?=$row['object_name']?></td>
              <td>
                <?php
                    $wk_id = $row['workers'];
                    $sql2 = mysqli_query($link,"SELECT * FROM workers WHERE id = '$wk_id'");
                    $res2 = mysqli_fetch_assoc($sql2);
                    echo $res2['name'];
                ?>
              </td>
              <td><?=$row['SUM(surface)']?></td>
              <td>
                <?php
                    $wk_id2 = explode(",",$row['workers']);
                    array_pop($wk_id2);
                    foreach ($wk_id2 as $key) {
                        $sql2 = mysqli_query($link,"SELECT * FROM fee WHERE worker_id = '$key'");
                        $res2 = mysqli_fetch_assoc($sql2);
                        echo $res2['fee'];
                    }
                ?>
              </td>
              <td>
                <?php
                    if($row['created_date']) echo date("Y-m-d",$row['created_date']);
                    else echo date("Y-m-d",$row['updated_date']);
                ?>
              </td>
              <td>
                <?php

                    $wk_id3 = $row['workers'];
                    $sql2 = mysqli_query($link,"SELECT * FROM fee WHERE worker_id = '$wk_id3'");
                    $res2 = mysqli_fetch_assoc($sql2);
                    
                   echo $res2['fee'] * $row['SUM(surface)'];

                   // echo $total;
                ?>
              </td>
          </tr>
      <?}
    ?>

<?
	 
	
