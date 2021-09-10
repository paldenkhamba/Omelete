<?php include "db_conf.php";

session_start();
if(!isset($_SESSION['name']))
{
     header('location:login.php');
 } 
;?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Customers</title>
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
    <h2> Customer List</h2>
   
    </div>
    <br>
    <hr>
    <br>
    <table>
        <thead>
<tr>
    <th> Customer ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Address</th>
    </tr>
    <thead>
    
    </table>
    <hr>
    <?php
    $sql = ("SELECT `user_id`, `first_name`, `last_name`, `email`, `mobile`, `address` FROM `user_info`");
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<table>
                    <tr>
                    <td>".$row["user_id"]."</td>
                    <td>".$row["first_name"]."</td>
                    <td>".$row["last_name"]."</td>
                    <td>".$row["email"]."</td>
                    <td>".$row["mobile"]."</td>
                    <td>".$row["address"]."</td>
                    </tr>
                    </table>";
          
    }
}
    ?>

    </div>
    </body>
    </html>

