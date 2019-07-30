<?php
$db_host="localhost";
$db_name="car_parts_management_system";
$db_user="root";
$db_pass="";

$con = new MySQLi($db_host, $db_user, $db_pass, $db_name);
//print_r($_POST);

$parts_code = $_POST['parts_code'];
$parts_purpose = $_POST['parts_purpose'];
$current_parts_quantity = $_POST['current_parts_quantity'];
$parts_unit_price = $_POST['parts_unit_price'];
$location_code = $_POST['location_code'];
$parts_name = $_POST['parts_name'];

if ($parts_code==""||$parts_purpose==""||$current_parts_quantity==""||$parts_unit_price==""||$location_code==""||$parts_name=="") {
	echo "Fill The Forms First";
}else{
	$sql = "INSERT INTO `parts_information`(`parts_code`, `parts_purpose`, `current_parts_quantity`, `parts_unit_price` , `location_code`, `parts_name` )
	VALUES('{$parts_code}','{$parts_purpose}','{$current_parts_quantity}','{$parts_unit_price}','{$location_code}','{$parts_name}')";
	if ($con->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $con->error;
		}
$con ->close();

}
