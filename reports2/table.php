<?php
session_start();
include "../config.php";
include '../date.php';

$ide = $_POST["object_name"];
// echo $ide;

$start_date = $_POST["start"];

$finish_date = $_POST["finish"];

$section_name_list = [];

$return_values = [];

$sql2 = mysqli_query($link, "SELECT * FROM sections WHERE parent = 'floor'");

$temp_arr = [];

while ($row = mysqli_fetch_assoc($sql2)) {
    array_push($temp_arr, $row['id']);
    array_push($section_name_list, [
        $row['section_name'],
    ]);
}

$temp_arr2 = [];

$start_time = isset($_POST['start']) ? $_POST['start'] : null;
$end_time = isset($_POST['finish']) ? $_POST['finish'] : null;

// Tugallanish vaqt berilmagan bolsa, barcha malumotlarni olish
if (empty($end_time) && empty($start_time)) {
    $query = "SELECT * FROM `extra_object` WHERE object_name='$ide' AND flat = '0'";
} else {
    if (!empty($end_time) && empty($start_time)) {
        $query = "SELECT * FROM `extra_object` WHERE object_name='$ide'  AND flat = '0' AND created_date <='$end_time'";
    }

    elseif (empty($end_time) && !empty($start_time)) {
        $query = "SELECT * FROM `extra_object` WHERE object_name='$ide'  AND flat = '0' AND created_date >='$start_time'";
    }
    
    elseif(!empty($end_time) && !empty($start_time)){
        $query = "SELECT * FROM `extra_object` WHERE object_name='$ide'  AND flat = '0' AND created_date BETWEEN '$start_time' AND '$end_time'";
    }
}

$result = mysqli_query($link,$query);

if (mysqli_num_rows($result) > 0) {
    // Malumotlarni olish
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($temp_arr2, $row);
    }
} else {
    echo "Hech qanday natija topilmadi";
}



foreach ($temp_arr2 as $key => $value) {
    $row = explode(",", $value['surface']);

    $newRow = [];

    $index = 0;

    array_pop($row);
    array_push($return_values, $row);
}

echo json_encode($return_values);

