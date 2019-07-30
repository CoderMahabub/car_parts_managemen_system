 <?php
      $username = "root";
      $password = "";
      $host = "localhost";

      $connector = mysqli_connect($host,$username,$password)
          or die("Unable to connect");
        echo "";
      $selected = mysqli_select_db($connector,"car_parts_management_system")
        or die("Unable to connect");

      //execute the SQL query and return records
      $result = mysqli_query($connector,"SELECT * FROM payment_information ORDER BY invoice_no");
      ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


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
.p {
    background: #f5f3f3;
    z-index: 9999;
    height: 380px;
    width: 400px;
    position: absolute;
    margin-top: -114px;
    border: 10px solid grey;
    padding: 10px;
    border-radius: 30px;
    margin-left: 315px;
}
</style>
  </head>

  <body>
    <div class="container">
		<div class="bg-faded p-4 my-4">
			<!-- <div class="col-sm-12 col-sm-offset-3 col-md-10 col-md-offset-2 main Myback"> -->
        <div class="panel panel-primary Myback">
            <div class="panel-heading panel-head"><h2><center>Payment Information</center></h2></div>
			</br>
			</br>
            <div class="panel-body">
                <div class="top-buffer"></div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Invoice Number</th>
                            <th>Parts Code</th>
                            <th>Customer Id</th>
                            <th>Order ID</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            <th>Paid Amount</th>
                            <th>Due Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>
		<?php
          while( $row = mysqli_fetch_array( $result ) ){
            echo
            "<tr>
              <td>{$row['invoice_no']}</td>
              <td>{$row['parts_code']}</td>
              <td>{$row['customer_id']}</td>
              <td>{$row['order_id']}</td>
              <td>{$row['unit_price']}</td>
              <td>{$row['total_price']}</td>
              <td>{$row['paid_amount']}</td>
              <td>{$row['due_amount']}</td>
			  
			 
            </tr>\n";
			// UPDATE CODE STARTS FROM HERE
				if(isset($_GET[$row['sl']])){
					echo"<form action='' method='POST'><div class='p' id='close'>";// CLASS P IS USED TO DECORATION AND ID CLOSE IS USED TO CLOSE THE POPUP PAGE
					echo"Update Information Form</br></br>";
					echo "Invoice Number: <input type='text'  name='invoice_no' value=".$row['invoice_no'].">";
					echo "</br></br>";
					echo "Parts Code : <input type='text'  name='parts_code' value=".$row['parts_code'].">";
					echo "</br></br>";
					echo "Customer Id: <input type='text' name='customer_id' value=".$row['customer_id'].">";
					echo "</br></br>";
					echo "Order ID: <input type='text' name='order_id' value=".$row['order_id'].">";
					echo "</br></br>";
					echo "Unit Price: <input type='text' name='unit_price' value=".$row['unit_price'].">";
					echo "</br></br>";
					echo "Total Price: <input type='text' name='total_price' value=".$row['total_price'].">";
					echo "</br></br>";
					echo "Paid Amount: <input type='text' name='paid_amount' value=".$row['paid_amount'].">";
					echo "</br></br>";
					echo "Due Amount: <input type='text' name='due_amount' value=".$row['due_amount'].">";
					echo "</br></br>";
					echo "</br></br>";
					

					echo"<input type='submit' name = 'submit' value='Update'>";
					echo"<input type='submit' name = 'cancle' value='Cancle'>";
					echo "</div></form>";

					if(isset($_POST['submit'])){
						$invoice_no = $_POST["invoice_no"];
						$parts_code = $_POST["parts_code"];
						$customer_id = $_POST["customer_id"];
						$order_id = $_POST["order_id"];
						$unit_price = $_POST["unit_price"];
						$total_price = $_POST["total_price"];
						$paid_amount = $_POST["paid_amount"];
						$due_amount = $_POST["due_amount"];

						$ssql = "UPDATE payment_information SET invoice_no='$invoice_no', parts_code='$parts_code', customer_id='$customer_id', order_id='$parts_unit_price', unit_price='$unit_price', total_price='$total_price', paid_amount='$paid_amount', due_amount='$due_amount'
						WHERE sl=".$row['sl']."";
						
						if ($connector->query($ssql) === TRUE) {
						echo "<script type='text/javascript'>alert('Submitted successfully!!!')</script>";
						} else {
						echo "Upadate Unsucessful!!!". $connector->error;
						}

					}
					if(isset($_POST['cancle'])){
						echo "<script>document.getElementById('close').style.display='none'</script>";
					}
				}
				// DELETE CODE STARTS FORM HERE
				if(isset($_GET['delete'.$row['sl']])){
					$delete = "DELETE FROM payment_information WHERE sl=".$row['sl']."";
					if ($connector->query($delete) === TRUE) {
					echo "<script type='text/javascript'>alert('Deleted successfully!')</script>";
					echo "<meta http-equiv='refresh' content='0'>"; // THIS IS FOR AUTO REFRESH CURRENT PAGE
					} else {
					echo "Delete Unsucessful". $connector->error;
					}
				}
			
          }
        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        </div>
      </div>
	  <br>

  </body>

</html>