<!DOCTYPE html>
<html>

<style>

table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

table td, table th {
    border: 1px solid #ddd;
    padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}

</style>
<head>
	

</head>
<body>

<div class="flex-container">




<h1 align=center> Payment Information Search</h1>
<form method="post" action="price_information_search_view.php">
<table align=center>
       <tr>
           <td>Search By Invoice Number :</td>
           <td><input type="text" name="invoice_no" value=""></td>
       </tr>
	    <td></td>
           <td><input type="submit" name="register_btn" value="Search" value=""></td>
       </tr>
</table>
</form>
<?php
    $con= new mysqli("localhost","root","","car_parts_management_system");
    $name = $_POST['invoice_no'];
    //$query = "SELECT * FROM employees
   // WHERE first_name LIKE '%{$name}%' OR last_name LIKE '%{$name}%'";

    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

$result = mysqli_query($con, "SELECT * FROM payment_information
    WHERE invoice_no LIKE '%{$name}%'");
	if ($result->num_rows > 0) {
    echo "<table align=center>
	<tr>
		<th>Invoice Number</th>
		<th>Parts Code</th>
		<th>Customer Id</th>
		<th>Order ID</th>
		<th>Unit Price</th>
		<th>Total PRice</th>
		<th>Paid Amount</th>
		<th>Due Amount</th>
	</tr>";
    // output data of each row

while ($row = mysqli_fetch_array($result))
{
        echo "<tr>
				<td>" . $row["invoice_no"]. "</td>
				<td>" . $row["parts_code"]. "</td>
				<td>" . $row["customer_id"]."</td>
				<td>" . $row["order_id"]."</td>
				<td>" . $row["unit_price"]."</td>
				<td>".$row["total_price"]."</td>
				<td>".$row["paid_amount"]."</td>
				<td>".$row["due_amount"]."</td>
			</tr>";
}
 echo "</table>";
}
else {

    echo "No result Found";
}
    mysqli_close($con);
    ?>