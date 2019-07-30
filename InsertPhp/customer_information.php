<?php
$db_host="localhost";
$db_name="car_parts_management_system";
$db_user="root";
$db_pass="";

$con = new MySQLi($db_host, $db_user, $db_pass, $db_name);
//print_r($_POST);

$customer_id = $_POST['customer_id'];
$customer_name = $_POST['customer_name'];
$customer_address = $_POST['customer_address'];
$contact_number = $_POST['contact_number'];

if ($customer_id==""||$customer_name==""||$customer_address==""||$contact_number=="") {
	echo "Fill The Forms First";
}else{
	$sql = "INSERT INTO `customer_information`(`customer_id`, `customer_name`, `customer_address`, `contact_number`)
	VALUES('{$customer_id}','{$customer_name}','{$customer_address}','{$contact_number}')";
	if ($con->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $con->error;
		}
$con ->close();

}

