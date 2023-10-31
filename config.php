<?php 

$link = mysqli_connect("localhost","root","","build");

// $link = mysqli_connect("sql110.infinityfree.com","if0_34580814","9Cu4jNvyREG","if0_34580814_buldings");
// $link = mysqli_connect("localhost","u1782683_robo","nL7fG0fG6bhT7qQ4","u1782683_robo");


// $query = mysqli_query($link,"SELECT * FROM `table_name`");
// while($row = mysqli_fetch_assoc($query));

if(!$link){
	echo "Error connection";
}

?>