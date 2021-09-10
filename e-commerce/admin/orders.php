<?php include"db_conf.php";
//session_destroy();
//unset($_SESSION['name']);
// session_start();
// if(!isset($_SESSION['name']))
// {
//      header('location:login.php');
//  } ?>
<!DOCTYPE html>

<head>
    
    <title>Orders</title>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script> 
       <script>  
       $(function(){ 
         $("#header").load("top.html");  
         $("#sidebar").load("side-bar.html");  
       }); 
       </script>  
   <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body >
  
    
    <div id="header"></div>
    <div id="sidebar"></div>
<div class="display">
    <div class= "top">
    <h2> Order List</h2>
    </div>
    <br>
    <hr>
    <br>
    <table>
        <thead>
<tr>
    <th> Order ID</th>
    <th>User Id</th>
    <th>Product Id</th>
    <th>Quantity</th>
    <th>Product Status</th>
    </tr>
    <thead>
    
    </table>
    <hr>
    <?php
    $sql = ("SELECT order_id, user_id,product_name,qty,p_status FROM orders join products on orders.product_id=products.product_id;");
   
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<table>
                    <tr>
                    <td >".$row["order_id"]."</td>
                    <td>".$row["user_id"]."</td>
                    <td>".$row["product_name"]."</td>
                    <td>".$row["qty"]."</td>
                    <td>".$row["p_status"]."</td>
                    </tr>
                    </table>";
          
    }
}
    ?>

    </div>

 
    </div>
</div>

    </div>
    </body>
    </html>

