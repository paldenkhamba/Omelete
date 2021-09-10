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
    
    <title>Categories</title>
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
    <h2> Categories List</h2>
    </div>
    <br>
    <hr>
    <br>
    <table>
        <thead>
<tr>
    <th> Category ID</th>
    <th>Name</th>
    <th>Sub-Categories</th>
    </tr>
    <thead>
    
    </table>
    <hr>
    <?php
    $sql = ("SELECT Categories.cat_id,cat_title,sub_title FROM Categories join sub_categories on Categories.cat_id=sub_categories.cat_id order by categories.cat_id;");
   
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<table>
                    <tr>
                    <td >".$row["cat_id"]."</td>
                    <td>".$row["cat_title"]."</td>
                    <td>".$row["sub_title"]."</td>
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

