<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `product` WHERE CONCAT('pro_type', 'pro_id', 'proname', 'avail', 'quantity') LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `product`";
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
                    <th>PRODUCTTYPE</th><th></th>
                    <th>PRODUCTID</th><th></th>
                    <th>PRODUCTNAME</th><th></th>
                    <th>AVAILABILTIY</th><th></th>
                    <th>QUANTITY</th><th></th>
                    
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['pro_type'];?></td><th></th>
                    <td><?php echo $row['pro_id'];?></td><th></th>
                    <td><?php echo $row['proname'];?></td><th></th>
                    <td><?php echo $row['avail'];?></td><th></th>
                    <td><?php echo $row['quantity'];?></td><th></th>
                    
                </tr>
                <?php endwhile;?>
    <a href="order3.php"> HOME </a>
            </table>
        </form>
        
    </body>
</html>



