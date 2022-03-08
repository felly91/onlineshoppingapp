<?php
$pro_type = $_POST['pro_type'];
$pro_id = $_POST['pro_id'];
$proname = $_POST['proname'];
$avail = $_POST['avail'];
$quantity = $_POST['quantity'];

if (!empty($pro_type) || !empty($pro_id) || !empty($proname) || !empty($avail) || !empty($quantity)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "login";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT pro_id From product Where pro_id = ? Limit 1";
     $INSERT = "INSERT Into product (pro_type, pro_id, proname, avail, quantity) values(?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("i", $pro_id);
     $stmt->execute();
     $stmt->bind_result($pro_id);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sissi", $pro_type, $pro_id, $proname, $avail, $quantity);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this eid";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
  ?>
  <html>
  <head>
  </head>
  <body>
  <a href="product.php"><h3> HOME </h3> </a>
  </body>
  </html>
