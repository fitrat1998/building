<?php 
    include '../config.php';

    $num = $_POST['num'];

    $sql = mysqli_query($link,"SELECT * FROM extra_object WHERE flat = '$num'");
    $res = mysqli_fetch_assoc($sql);

    $temp_surface = explode(",",$res['surface']);
    array_pop($temp_surface);

    $temp_worker = explode(",",$res['workers']);
    array_pop($temp_worker);

    $temp_worker_temp = [];

    foreach ($temp_worker as $key => $value) {
        array_push($temp_worker_temp,[$value,mysqli_fetch_assoc(mysqli_query($link,"SELECT `name` FROM `workers` WHERE id='$value'"))['name']]);
    }

    if(mysqli_num_rows($sql) > 0){
    ?>
          <div class="row" id="test">
            <?php 
                $id = 0;
                $sid = 0;
                $sql2 = mysqli_query($link,"SELECT * FROM sections WHERE parent = 'flat'");
                while($row = mysqli_fetch_assoc($sql2)){
            ?>
           <div class="col-lg-2" data-id="id-<?=$row['id']?>">
                <i class="fa fa-bath"></i>
                <label >Section - <b class="text-success"><?=$row['section_name']?></b></label>
                <input type="text" name="section[]"  class="form-control object" placeholder="<?=$temp_surface[$id]?>" value="<?=$temp_surface[$id]?>">
                
            </div>     
            <div class="col-lg-2">
               <i class="mdi mdi-worker"></i>
               <label>Worker - <b class="text-danger"><?=$temp_worker_temp[$id][1]?>
                <input type="hidden" class="border-0 text-danger" name="oldworker[]" placeholder="<?=$temp_worker_temp[$id][1]?>" value="<?=$temp_worker_temp[$id][1]?>" data-id='<?=$id?>'>
                </b>
               </label>
               <select name="worker[]" class="js-example-basic-multiple form-control" multiple="multiple" style="background-color: #F8F8F8 !important;width:180px !important; " >
                    <option value="<?=$temp_worker_temp[$id][0]?>" selected><?=$temp_worker_temp[$id][1]?></option>
                    <?php 
                      $sql3 = mysqli_query($link,"SELECT * FROM workers");
                      while($rows = mysqli_fetch_assoc($sql3)){
                         ?>
                            <option class="form-control" value="<?=$rows['id']?>"><?=$rows['name']?></option>
                         <?
                      }
                    ?>
               </select>
            </div>
            <?php 
                $id ++;
            ?>
            <? } ?>
          </div>
         <script type="text/javascript">
            $(document).ready(function() {
              $(".js-example-basic-multiple").select2();
              $(".js-example-basic-multiple").css("background-color","gray");
            });
        </script>
    <?
    }
    else {
        ?>
        <div class="row" id="test">
          <?php 
             $sql2 = mysqli_query($link,"SELECT * FROM sections WHERE parent='flat'");
             while ($row2 = mysqli_fetch_assoc($sql2)) {
                 ?>
                <div class="col-lg-2 ">
                    <i class="fa fa-bath "></i>
                    <label><?=$row2['section_name']?></label>
                    <input type="text" name="section[]" class="form-control object" placeholder="<?=$row2['section_name']?> section" >
                </div>     
                <div class="col-lg-2">
                    <i class="mdi mdi-worker"></i>
                   <label>Workers</label>
                   <select name="worker[]" class="js-example-basic-multiple form-control" multiple="multiple" style="background-color: #F8F8F8 !important;width:180px !important; " >
                        <?php 
                          $sql3 = mysqli_query($link,"SELECT * FROM workers");
                          while($rows = mysqli_fetch_assoc($sql3)){
                             ?>
                                <option class="form-control" value="<?=$rows['id']?>"><?=$rows['name']?></option>
                             <?
                          }
                        ?>
                   </select>
                </div>
            <? } ?>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".js-example-basic-multiple").select2();
                $(".js-example-basic-multiple").css("background-color","gray");
            });
        </script>
        <?
    }
  