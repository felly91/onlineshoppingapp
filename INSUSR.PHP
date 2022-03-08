<?php
$user_id = $_POST['user_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
if (!empty($user_id) || !empty($username) || !empty($password) || !empty($gender) || !empty($email) ||  !empty($phone)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "login";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT user_id From register Where user_id = ? Limit 1";
     $INSERT = "INSERT Into register (user_id, username, password, gender, email, phone) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("i", $user_id);
     $stmt->execute();
     $stmt->bind_result($user_id);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("issssi", $user_id, $username, $password, $gender, $email, $phone);
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
  <a href="users.php"><h3> HOME </h3> </a>
  </body>
  </html>
