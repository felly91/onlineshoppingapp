<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `order1` WHERE CONCAT('ord_type', 'ord_id', 'ordname', 'ord_dat', 'quan') LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `order1`";
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
                    <th>ORDERTYPE</th>
                    <th>ORDERID</th>
                    <th>ORDERNAME</th>
                    <th>DATE AND TIME</th>
                    <th>QUANTITY</th>
                    
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['ord_type'];?></td>
                    <td><?php echo $row['ord_id'];?></td>
                    <td><?php echo $row['ordname'];?></td>
                    <td><?php echo $row['ord_dat'];?></td>
                    <td><?php echo $row['quan'];?></td>
                    
                </tr>
                <?php endwhile;?>
    <a href="order3.php"> HOME </a>
            </table>
        </form>
        
    </body>
</html>



