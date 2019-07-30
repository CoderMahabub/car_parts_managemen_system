<?php
$db_host="localhost";
$db_name="car_parts_management_system";
$db_user="root";
$db_pass="";

$con = new MySQLi($db_host, $db_user, $db_pass, $db_name);
//print_r($_POST);

$location_code = $_POST['location_code'];
$location_direction = $_POST['location_direction'];
$shelf_location = $_POST['shelf_location'];
$shelf_no = $_POST['shelf_no'];

if ($location_code==""||$location_direction==""||$shelf_location==""||$shelf_no=="") {
	echo "Fill The Forms First";
}else{
	$sql = "INSERT INTO `location_information`(`location_code`, `location_direction`, `shelf_location`, `shelf_no`)
	VALUES('{$location_code}','{$location_direction}','{$shelf_location}','{$shelf_no}')";
	if ($con->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $con->error;
		}
$con ->close();

}

