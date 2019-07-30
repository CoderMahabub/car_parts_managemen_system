<?php
$db_host="localhost";
$db_name="car_parts_management_system";
$db_user="root";
$db_pass="";

$con = new MySQLi($db_host, $db_user, $db_pass, $db_name);
//print_r($_POST);

$parts_code = $_POST['parts_code'];
$parts_price = $_POST['parts_price'];
$install_date = $_POST['install_date'];
$car_model = $_POST['car_model'];

if ($parts_code==""||$parts_price==""||$install_date==""||$car_model=="") {
	echo "Fill The Forms First";
}else{
	$sql = "INSERT INTO `car_parts_installation_information`(`parts_code`, `parts_price`, `install_date`, `car_model`)
	VALUES('{$parts_code}','{$parts_price}','{$install_date}','{$car_model}')";
	if ($con->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $con->error;
		}
$con ->close();

}

