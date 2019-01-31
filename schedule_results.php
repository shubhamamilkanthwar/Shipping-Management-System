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

      $from = mysqli_real_escape_string($conn,$_POST['from']);
      $to = mysqli_real_escape_string($conn,$_POST['to']);
      $startdate = mysqli_real_escape_string($conn,$_POST['startdate']);
     $enddate = mysqli_real_escape_string($conn,$_POST['enddate']);



      $sql="call showschedule('$from','$to','$startdate','$enddate')";

      $result = $conn->query($sql);
   echo '<link rel="stylesheet" type="text/css" href="style.css"></head>';


if ($result->num_rows > 0) {
  echo '<div>';
  echo '<h1>Schedule</h1>';
    echo "<table><tr><th>Schedule ID</th><th>Vessel Name</th><th>Departing Date</th><th>Departing Time</th><th>Arriving Date</th><th>Arriving Time</th><th>Available Capacity</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["schedule_id"]."</td><td>".$row["vessel_name"]."</td><td>".$row["departing_date"]."</td><td>".$row["departing_time"]."</td><td>".$row["arriving_date"]."</td><td>".$row["arriving_time"]."</td><td>".$row["available_capacity"]."</td></tr>";
    }
    echo "</table>";
    echo'<div>';
} else {
    echo "Unable to get Schedule";
}

}
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
    <div style = " top:auto;  width: 1200px; height: auto; right:10%; bottom:10%; left:10%; text-align: center;" align="center">


    <div  style = " top:auto;  width: 1300px; height: auto+300px; right:50%; bottom:10%; left:10%; text-align: center;" align="center" >
     <div style="width: 500px; margin: 0 auto; background: #d3d3d3;">
       <h2>Get estimated Quotation</h2>
     <form  action="GetQuote.php" method= "post">
       <p>
          <label  for="order_capacity">Order Capacity </label>
            <input id="order_capacity" name="order_capacity" type="number" maxlength="255" value="">
              </p>
            <p>
            <label  for="schedule_id">Schedule No </label>


              <input id="schedule_id" name="schedule_id" type="number" maxlength="255" value="">

              <p>
              <input type = "submit" value = "Get Quotation"/>
            </p>
               </form>

            <h1>Place Order</h1>
    <form action = "Ordercall.php" method = "post">

       <label  for="email">Email </label>
      <input id="email" name="email" type="text" maxlength="255" value="">
      <label  for="schedule_id">Schedule ID </label>
      <input id="schedule_id" name="schedule_id" type="text" value="">

       <label  for="order_capacity">Order Capacity </label>
      <input id="order_capacity" name="order_capacity" type="text" value="">
       <label  for="order_value">Order Value </label>
      <input id="order_value" name="order_value" type="text" maxlength="255" value="">

       <label for="shipping_1">Sender Address Line 1</label>
      <input id="shipping_1" name="shipping_1" type="text" maxlength="255">

      <label for="shipping_2">Sender Address Line 2</label>
      <input id="shipping_2" name="shipping_2" class="element text medium" value="" type="text">

      <label for="shipping_city">Sender City</label>
      <input id="shipping_city" name="shipping_city" class="element text medium" value="" type="text">

      <label for="shipping_state">Sender State / Province / Region</label>
      <input id="shipping_state" name="shipping_state" class="element text medium" value="" type="text">

      <label for="shipping_country">Sender Country</label>
       <input id="shipping_country" name="shipping_country" class="element text medium" value="" type="text">

      <label for="shipping_zipcode">Sender Postal / Zip Code</label>
      <input id="shipping_zipcode" name="shipping_zipcode" class="element text medium" value="" type="text">

  <label for="consignee_1">Receiver Address Line 1</label>
      <input id="consignee_1" name="consignee_1" type="text" maxlength="255">

      <label for="consignee_2">Receiver Address Line 2</label>
      <input id="consignee_2" name="consignee_2" class="element text medium" value="" type="text">

      <label for="consignee_city">Receiver City</label>
      <input id="consignee_city" name="consignee_city" class="element text medium" value="" type="text">

      <label for="consignee_state">Receiver State / Province / Region</label>
      <input id="consignee_state" name="consignee_state" class="element text medium" value="" type="text">

      <label for="consignee_country">Receiver Country</label>
       <input id="consignee_country" name="consignee_country" class="element text medium" value="" type="text">

      <label for="consignee_zipcode">Receiver Postal / Zip Code</label>
      <input id="consignee_zipcode" name="consignee_zipcode" class="element text medium" value="" type="text">

   <input type = "submit" value = "Submit"/>

    </form>
</div>
</div>
</div>
  </body>
</html>
