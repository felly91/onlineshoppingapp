<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Home</title>
        <?php 
        $content = '<img src="images/felly.png"  class="imgLeft" />'
   
       
        ?>
        <link rel="stylesheet" type="text/css" href="Stylesheet.css" />
        <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
            
            <nav id="navigation">
                <ul id="nav">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="users.php">USERS</a></li>
                    <li><a href="product.php">PRODUCT</a></li>
                    <li><a href="order3.php">ORDERS</a></li>
                </ul>
            </nav>
            <div id="content_area">
                <?php echo $content; ?>
      
      <h3>WELCOME TO PHILISTERS-MART </h3>
      <h>
          One of Kenya's biggest shopping mart.It offers large variety of products for its customer.
          It mainly aims at providing customer satisficattion with full value guarentee in all their products.
      </h>


            
</div>    
           
    <div>
      <img src="images/ele.jpg" width="100%"/>
    </div>
  
    
     
            <footer>
                <p>All rights reserved</p>
            </footer>
</div>

    </body>
</html>
