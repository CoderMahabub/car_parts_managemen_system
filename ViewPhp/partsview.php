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
      $result = mysqli_query($connector,"SELECT * FROM parts_information ORDER BY parts_code");
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
            <div class="panel-heading panel-head"><h2><center>Parts Information</center></h2></div>
			</br>
			</br>
            <div class="panel-body">
                <div class="top-buffer"></div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Parts Code</th>
                            <th>Parts Purpose</th>
                            <th>Current Parts Quantity</th>
                            <th>Parts Unit Price</th>
                            <th>Location Code</th>
                            <th>Parts Name</th>
                            
                        </tr>
                    </thead>
                    <tbody>
		<?php
          while( $row = mysqli_fetch_array( $result ) ){
            echo
            "<tr>
              <td>{$row['parts_code']}</td>
              <td>{$row['parts_purpose']}</td>
              <td>{$row['current_parts_quantity']}</td>
              <td>{$row['parts_unit_price']}</td>
              <td>{$row['location_code']}</td>
              <td>{$row['parts_name']}</td>
			  
			 
            </tr>\n";
			// UPDATE CODE STARTS FROM HERE
				if(isset($_GET[$row['sl']])){
					echo"<form action='' method='POST'><div class='p' id='close'>";// CLASS P IS USED TO DECORATION AND ID CLOSE IS USED TO CLOSE THE POPUP PAGE
					echo"Update Information Form</br></br>";
					echo "Parts Code : <input type='text'  name='parts_code' value=".$row['parts_code'].">";
					echo "</br></br>";
					echo "Parts Purpose : <input type='text'  name='parts_purpose' value=".$row['parts_purpose'].">";
					echo "</br></br>";
					echo "Current Parts Quantity: <input type='text' name='current_parts_quantity' value=".$row['current_parts_quantity'].">";
					echo "</br></br>";
					echo "Parts Unit Price : <input type='text' name='parts_unit_price' value=".$row['parts_unit_price'].">";
					echo "</br></br>";
					echo "Location Code: <input type='text' name='location_code' value=".$row['location_code'].">";
					echo "</br></br>";
					echo "Parts Name: <input type='text' name='parts_name' value=".$row['parts_name'].">";
					echo "</br></br>";
					echo "</br></br>";
					

					echo"<input type='submit' name = 'submit' value='Update'>";
					echo"<input type='submit' name = 'cancle' value='Cancle'>";
					echo "</div></form>";

					if(isset($_POST['submit'])){
						$parts_code = $_POST["parts_code"];
						$parts_purpose = $_POST["parts_purpose"];
						$current_parts_quantity = $_POST["current_parts_quantity"];
						$parts_unit_price = $_POST["parts_unit_price"];
						$location_code = $_POST["location_code"];
						$parts_name = $_POST["parts_name"];

						$ssql = "UPDATE parts_information SET parts_code='$parts_code', parts_purpose='$parts_purpose', current_parts_quantity='$current_parts_quantity', parts_unit_price='$parts_unit_price', location_code='$location_code', parts_name='$parts_name'
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
					$delete = "DELETE FROM parts_information WHERE sl=".$row['sl']."";
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