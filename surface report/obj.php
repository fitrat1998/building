<?php 
                                  while ($row = mysqli_fetch_assoc($sql)) {?>
                                       <tr>
                                          $row['obj_name']
                                          $row['section']
                                          $row['SUM(extra_object.surface)']
                                          <td>
                                          <?php 
                                            $row = $row['section'];
                                            $sql2 = mysqli_query($link,"SELECT * FROM extra_object WHERE 
                                                section='$row'");
                                             while ($row2 = mysqli_fetch_assoc($sql2)) {
                                                $wk = explode(",", $row2['workers']);
                                                foreach ($wk as $item) {
                                                     $sql3 = mysqli_query($link,"SELECT * FROM workers WHERE id = '$item' ");
                                                     $res3 = mysqli_fetch_assoc($sql3);
                                                     echo "{$res3['name']}"." ";
                                                  }
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
                                            $section2 = $row['section'];
                                            $sql3 = mysqli_query($link,"SELECT workers,object_id FROM extra_object WHERE 
                                                section='$section2'");
                                             while ($row3 = mysqli_fetch_assoc($sql3)) {
                                                $wk_id1 = $row3['workers'];
                                                $obj_id1 = $row3['object_id'];
                                                $sql_sur = mysqli_query($link,"SELECT * FROM extra_object WHERE
                                                       workers = '$wk_id1' AND section = '$section2'");
                                                $res_sur = mysqli_fetch_assoc($sql_sur);

                                                // print_r($res_sur);

                                                echo $res_sur['surface']." ";
                                            }
                                          ?>
                                          </td>
                                          <td>
                                          <?php 
                                            $section3 = $row['section'];
                                            $sql4 = mysqli_query($link,"SELECT workers FROM extra_object WHERE 
                                                section='$section3'");
                                             while ($row4 = mysqli_fetch_assoc($sql4)) {
                                                foreach ($row4 as $value) {
                                                   $fee_id = $value;
                                                    $sql5 = mysqli_query($link,"SELECT * FROM fee WHERE 
                                                        worker_id = '$fee_id' ");
                                                     $res5 = mysqli_fetch_assoc($sql5);
                                                     echo "{$res5['fee']}"." ";
                                                  }
                                            }
                                          ?>
                                          </td>
                                          <td>
                                          <?php 
                                            $section4 = $row['section'];
                                            $sql6 = mysqli_query($link,"SELECT * FROM extra_object WHERE 
                                                section='$section4'");
                                            $sum = 0;
                                            $i = 0;
                                             while ($row6 = mysqli_fetch_assoc($sql6)) {
                                                 $wk_id = $row6['workers'];
                                                 $sql7 = mysqli_query($link,"SELECT * FROM fee WHERE worker_id = '$wk_id'");
                                                 $res7 = mysqli_fetch_assoc($sql7);

                                                 $sql8 = mysqli_query($link,"SELECT * FROM extra_object WHERE workers = '$wk_id' AND section = '$section4'");
                                                 $res8 = mysqli_fetch_assoc($sql8);


                                                  // echo $res8['surface']." ";
                                                  // echo $res7['fee']." ";

                                                 $sum +=  $res7['fee'] * $res8['surface'];
                                                  // echo $sum." <br>";
                                            }
                                             echo $sum;
                                          ?>
                                          </td>
                                      </tr>
                                  <?}
                                ?>