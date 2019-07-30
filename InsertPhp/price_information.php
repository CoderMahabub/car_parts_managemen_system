<?php
$db_host="localhost";
$db_name="car_parts_management_system";
$db_user="root";
$db_pass="";

$con = new MySQLi($db_host, $db_user, $db_pass, $db_name);
//print_r($_POST);

$parts_code = $_POST['parts_code'];
$unit_price = $_POST['unit_price'];
$total_price = $_POST['total_price'];

if ($parts_code==""||$unit_price==""||$total_price=="") {
	echo "Fill The Forms First";
}else{
	$sql = "INSERT INTO `price_information`(`parts_code`, `unit_price`, `total_price`)
	VALUES('{$parts_code}','{$unit_price}','{$total_price}')";
	if ($con->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $con->error;
		}
$con ->close();

}


