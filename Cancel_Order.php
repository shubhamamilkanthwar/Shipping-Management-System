<?php
$servername = "dbprojectteam7.ci4s4nk57ha9.us-east-2.rds.amazonaws.com";
$username = "DBProject2018";
$password = "ABC123abc";
$dbname = "shipping_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

   if($_SERVER["REQUEST_METHOD"] == "POST") {


  $email = mysqli_real_escape_string($conn,$_POST['email_id']);
  $sql="select customer_id from Customer where email_id='$email'";
  $r1=$conn->query($sql);
  echo '<link rel="stylesheet" type="text/css" href="style.css"></head>';
  $x=0;
  if($r1->num_rows > 0)
    {

      while($row = $r1->fetch_assoc()) {
          $x=$row["customer_id"];
      }
      echo "</table>";

    }
    else
    {
      echo "Invalid ID";
    }


   $sql="call order_tracker('$x')";
      echo '<link rel="stylesheet" type="text/css" href="style.css"></head>';

   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
     echo '<div>';
     echo '<h1>Order Status</h1>';
       echo "<table><tr><th>Order ID</th><th>Order Capacity</th><th>Order Value</th><th>Receiver Address Line 1</th><th>Receiver Address Line 2</th><th>Receiver City</th><th>Receiver State</th><th>Receiver Country</th><th>Receiver Zipcode</th><th>Order Status</th></tr>";
       // output data of each row
       while($row = $result->fetch_assoc()) {
           echo "<tr><td>".$row["order_id"]."</td><td>".$row["order_capacity"]."</td><td>".$row["order_value"]."</td><td>".$row["consignee_address_line_1"]."</td><td>".$row["consignee_address_line_2"]."</td><td>".$row["consignee_city"]."</td><td>".$row["consignee_state"]."</td><td>".$row["consignee_country"]."</td><td>".$row["consignee_zip_code"]."</td><td>".$row["order_status"]."</td></tr>";
       }
       echo "</table>";
       echo'<div>';
   } else {
       echo "No Orders";
   }

   }

   ?>
