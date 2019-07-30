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
      $result = mysqli_query($connector,"SELECT * FROM order_information ORDER BY order_id");
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
            <div class="panel-heading panel-head"><h2><center>Order Information</center></h2></div>
			</br>
			</br>
            <div class="panel-body">
                <div class="top-buffer"></div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer ID</th>
                            <th>Location Code</th>
                            <th>Parts Code</th>
                            <th>Order Date</th>
                            <th>Order Delivery Date</th>
                            <th>Order Unit Price</th>
                            <th>Order TOtal PRice</th>
							<th>Action Perform</th>
                            
                        </tr>
                    </thead>
                    <tbody>
		<?php
          while( $row = mysqli_fetch_array( $result ) ){
            echo
            "<tr>
              <td>{$row['order_id']}</td>
              <td>{$row['customer_id']}</td>
              <td>{$row['location_code']}</td>
              <td>{$row['parts_code']}</td>
              <td>{$row['order_date']}</td>
              <td>{$row['order_delivery_date']}</td>
              <td>{$row['order_unit_price']}</td>
              <td>{$row['order_total_price']}</td>
			  <td>
				<form action='' method='GET'>
					<input type='submit' name=".$row['sl']." value='Edit'> | 
					<input type='submit' name='delete".$row['sl']."' value='Delete' onClick=\"return confirm('Are you sure you want to delete?')\"> 
					
				</form>
				
			</td>
			 
            </tr>\n";
			// UPDATE CODE STARTS FROM HERE
				if(isset($_GET[$row['sl']])){
					echo"<form action='' method='POST'><div class='p' id='close'>";// CLASS P IS USED TO DECORATION AND ID CLOSE IS USED TO CLOSE THE POPUP PAGE
					echo"Update Information Form</br></br>";
					echo "Order ID : <input type='text'  name='order_id' value=".$row['order_id'].">";
					echo "</br></br>";
					echo "Customer ID : <input type='text'  name='customer_id' value=".$row['customer_id'].">";
					echo "</br></br>";
					echo "location Code: <input type='text' name='location_code' value=".$row['location_code'].">";
					echo "</br></br>";
					echo "Parts Code : <input type='text' name='parts_code' value=".$row['parts_code'].">";
					echo "</br></br>";
					echo "Order Delivery Date: <input type='text' name='order_delivery_date' value=".$row['order_delivery_date'].">";
					echo "</br></br>";
					echo "Order Unit Price: <input type='text' name='order_unit_price' value=".$row['order_unit_price'].">";
					echo "</br></br>";
					echo "Order Total Price: <input type='text' name='order_total_price' value=".$row['order_total_price'].">";
					echo "</br></br>";
					echo "</br></br>";
					

					echo"<input type='submit' name = 'submit' value='Update'>";
					echo"<input type='submit' name = 'cancle' value='Cancle'>";
					echo "</div></form>";

					if(isset($_POST['submit'])){
						$order_id = $_POST["order_id"];
						$customer_id = $_POST["customer_id"];
						$location_code = $_POST["location_code"];
						$parts_code = $_POST["parts_code"];
						$order_delivery_date = $_POST["order_delivery_date"];
						$order_unit_price = $_POST["order_unit_price"];
						$order_total_price = $_POST["order_total_price"];

						$ssql = "UPDATE order_information SET order_id='$order_id', customer_id='$customer_id', location_code='$location_code', parts_code='$parts_code', order_delivery_date='$order_delivery_date', order_unit_price='$order_unit_price', order_total_price='$order_total_price'
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
					$delete = "DELETE FROM order_information WHERE sl=".$row['sl']."";
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
 <a href="order_information.html">Insert Order Information</a>
  </body>

</html>

