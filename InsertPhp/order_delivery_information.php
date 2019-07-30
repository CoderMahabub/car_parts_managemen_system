<?php
$db_host="localhost";
$db_name="car_parts_management_system";
$db_user="root";
$db_pass="";

$con = new MySQLi($db_host, $db_user, $db_pass, $db_name);
//print_r($_POST);

$order_id = $_POST['order_id'];
$order_date = $_POST['order_date'];
$order_delivery_date = $_POST['order_delivery_date'];
$order_receive_date = $_POST['order_receive_date'];

if ($order_id==""||$order_date==""||$order_delivery_date==""||$order_receive_date=="") {
	echo "Fill The Forms First";
}else{
	$sql = "INSERT INTO `order_delivery_information`(`order_id`, `order_date`, `order_delivery_date`, `order_receive_date`)
	VALUES('{$order_id}','{$order_date}','{$order_delivery_date}','{$order_receive_date}')";
	if ($con->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $con->error;
		}
$con ->close();

}
