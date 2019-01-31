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
$email = mysqli_real_escape_string($conn,$_POST['email']);
(int)$schedule_id = mysqli_real_escape_string($conn,$_POST['schedule_id']);
(int)$order_capacity = mysqli_real_escape_string($conn,$_POST['order_capacity']);
$order_value = mysqli_real_escape_string($conn,$_POST['order_value']);
$shipping_1 = mysqli_real_escape_string($conn,$_POST['shipping_1']);
$shipping_2 = mysqli_real_escape_string($conn,$_POST['shipping_2']);
$shipping_city = mysqli_real_escape_string($conn,$_POST['shipping_city']);
$shipping_state = mysqli_real_escape_string($conn,$_POST['shipping_state']);
$shipping_country = mysqli_real_escape_string($conn,$_POST['shipping_country']);
(int)$shipping_zipcode = mysqli_real_escape_string($conn,$_POST['shipping_zipcode']);
$consignee_1 = mysqli_real_escape_string($conn,$_POST['consignee_1']);
$consignee_2 = mysqli_real_escape_string($conn,$_POST['consignee_2']);
$consignee_city = mysqli_real_escape_string($conn,$_POST['consignee_city']);
$consignee_state = mysqli_real_escape_string($conn,$_POST['consignee_state']);
$consignee_country = mysqli_real_escape_string($conn,$_POST['shipping_country']);
(int)$consignee_zipcode = mysqli_real_escape_string($conn,$_POST['consignee_zipcode']);
$sql="select customer_id from Customer where email_id='$email'";
$r1=$conn->query($sql);
echo '<link rel="stylesheet" type="text/css" href="style.css"></head>';
$x=0;
if($r1->num_rows > 0)
  {
    while($row = $r1->fetch_assoc()) {

        $x=$row["customer_id"];
        $sqlnew="call create_order( '$x', '$schedule_id', '$order_capacity','$order_value', '$shipping_1','$shipping_2','$shipping_city','$shipping_state','$shipping_country','$shipping_zipcode','$consignee_1','$consignee_2','$consignee_city','$consignee_state','$consignee_country','$consignee_zipcode');";

$result = $conn->query($sqlnew);
echo "Order Placed!";

    }


  }
  else
  {
    echo "Failed to Place Order!";
  }

$conn->close();
?>

<html>
<head>
  <title>Schedule</title>
   <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
            top:auto;
            right: 50%;
            bottom: 500px;
            left: 500px;
            width: 1500px;
            height: auto;

         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
         input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
      </style>
</head>
  <body>
    <div style = " top:1px;  width: 1300px; height: auto; right:50%; bottom:10%; left:10%; text-align: center;" align="center" >
     <div style="width: 500px; margin: 0 auto; background: #d3d3d3;">


  <form action = "Track_Order.html" method = "post">

   <input name ="Track Order!" type = "submit" value = "Track"/>
    </form>
</div>
</div>
  </body>
</html>
