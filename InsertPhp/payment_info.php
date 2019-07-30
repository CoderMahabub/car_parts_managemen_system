<?php
$db_host="localhost";
$db_name="car_parts_management_system";
$db_user="root";
$db_pass="";

$con = new MySQLi($db_host, $db_user, $db_pass, $db_name);
//print_r($_POST);

$invoice_no = $_POST['invoice_no'];
$parts_code = $_POST['parts_code'];
$customer_id = $_POST['customer_id'];
$order_id = $_POST['order_id'];
$unit_price = $_POST['unit_price'];
$total_price = $_POST['total_price'];
$paid_amount = $_POST['paid_amount'];
$due_amount = $_POST['due_amount'];

if ($invoice_no==""||$parts_code==""||$customer_id==""||$order_id==""||$unit_price==""||$total_price==""||$paid_amount==""||$due_amount=="") {
	echo "Fill The Forms First";
}else{
	$sql = "INSERT INTO `payment_information`(`invoice_no`, `parts_code`, `customer_id`, `order_id`, `unit_price`, `total_price`, `paid_amount`, `due_amount`)
	VALUES('{$invoice_no}','{$parts_code}','{$customer_id}','{$order_id}','{$unit_price}','{$total_price}','{$paid_amount}','{$due_amount}')";
	if ($con->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $con->error;
		}
$con ->close();

}
