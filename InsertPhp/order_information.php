<?php
$db_host="localhost";
$db_name="car_parts_management_system";
$db_user="root";
$db_pass="";

$con = new MySQLi($db_host, $db_user, $db_pass, $db_name);
//print_r($_POST);

$order_id = $_POST['order_id'];
$customer_id = $_POST['customer_id'];
$location_code = $_POST['location_code'];
$parts_code = $_POST['parts_code'];
$order_date = $_POST['order_date'];
$order_delivery_date = $_POST['order_delivery_date'];
$order_unit_price = $_POST['order_unit_price'];
$order_total_price = $_POST['order_total_price'];

if ($order_id==""||$customer_id==""||$location_code==""||$parts_code==""||$order_date==""||$order_delivery_date==""||$order_unit_price==""||$order_total_price=="") {
	echo "Fill The Forms First";
}else{
	$sql = "INSERT INTO `order_information`(`order_id`, `customer_id`, `location_code`, `parts_code` , `order_date`, `order_delivery_date` , `order_unit_price`, `order_total_price`)
	VALUES('{$order_id}','{$customer_id}','{$location_code}','{$parts_code}','{$order_date}','{$order_delivery_date}','{$order_unit_price}','{$order_total_price}')";
	if ($con->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $con->error;
		}
$con ->close();

}
