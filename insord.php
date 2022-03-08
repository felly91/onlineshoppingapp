<?php
$ord_type = $_POST['ord_type'];
$ord_id = $_POST['ord_id'];
$ordname = $_POST['ordname'];
$ord_dat = $_POST['ord_dat'];
$quan = $_POST['quan'];

if (!empty($ord_type) || !empty($ord_id) || !empty($ordname) || !empty($ord_dat) || !empty($quan)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "login";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT ord_id From order1 Where ord_id = ? Limit 1";
     $INSERT = "INSERT Into order1 (ord_type, ord_id, ordname, ord_dat, quan) values(?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("i", $ord_id);
     $stmt->execute();
     $stmt->bind_result($ord_id);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sissi", $ord_type, $ord_id, $ordname, $ord_dat, $quan);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this eid";
     }
     $stmt->close();
     $conn->close();
    }
} 
else {
 echo "All field are required";
 die();
}
  ?>
  <html>
  <head>
  </head>
  <body>
  <a href="home.php"><h3> HOME </h3> </a>
  </body>
  </html>
