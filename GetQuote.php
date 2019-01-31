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

$schedule_id = mysqli_real_escape_string($conn,$_POST['schedule_id']);
$order_capacity = mysqli_real_escape_string($conn,$_POST['order_capacity']);

$x=0;

$sqlnew="call quotation(  '$order_capacity','$schedule_id');";
$result = $conn->query($sqlnew);
 echo '<link rel="stylesheet" type="text/css" href="style.css"></head>';




if($result -> num_rows > 0)
  {
    while($row = $result->fetch_assoc()) {
      echo '<div>';
      echo '<h1>Estimated</h1>';
        echo "<table><tr><th>Schedule ID</th><th>Capacity</th><th>Quotation</th><tr>";


      // echo $row["Order_Status"];
        echo "<tr><td>".$row["schedule_id"]."</td><td>".$row["capacity"]."</td><td>".$row["Quotation"]."</td><tr>";
        echo "</table>";
        echo'<div>';
    }


  }
  else
  {
    echo "Invalid Entry!";
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
    <h1>Quotation</h1>
  </body>
</html>
