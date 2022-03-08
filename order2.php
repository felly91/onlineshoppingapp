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
  <?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `Product` WHERE CONCAT('pro_type', 'pro_id', 'proname', 'avail', 'quantity') LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `Product`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "login");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>
 <!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
       <style type="text/css">
       body {
 
  
	background:url(Product.jpeg)no-repeat center center fixed; 
  }
  
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="viewp.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>PRODUCT TYPE</th>
                    <th>PRODUCT ID</th>
                    <th>PRODUCT NAME</th>
                    <th>AVAILABILITY</th>
                    <th>QUANTITY</th>
                    
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['pro_type'];?></td>
                    <td><?php echo $row['pro_id'];?></td>
                    <td><?php echo $row['proname'];?></td>
                    <td><?php echo $row['avail'];?></td>
                    <td><?php echo $row['quantity'];?></td>
                    
                </tr>
                <?php endwhile;?>
    <a href="product.php"> HOME </a>
            </table>
        </form>
        
    </body>
</html>

