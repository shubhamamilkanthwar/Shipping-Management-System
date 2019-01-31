
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


      $email = mysqli_real_escape_string($conn,$_POST['email_id']);
      $order_no = mysqli_real_escape_string($conn,$_POST['order_no']);


      //$sql="call cancel_order('$','$to')";
      //$result = $conn->query($sql);
   $sql="select customer_id from Customer where email_id='$email'";
$r1=$conn->query($sql);

$x=0;
if($r1->num_rows > 0)
  {
    while($row = $r1->fetch_assoc()) {

        $x=$row["customer_id"];
        $sqlnew="call cancel_order('$x', '$order_no');";

$result = $conn->query($sqlnew);
echo "Order Canceled!";

   }

  }
  else
  {
    echo "Failed to Cancel Order!";
  }




?>
