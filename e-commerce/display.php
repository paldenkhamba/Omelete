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
    <title>Online shopping in Nepal| Buy online in Nepal </title>
    
        <link rel="stylesheet" type="text/css" href="s.css">
       <script src="//code.jquery.com/jquery-1.10.2.js"></script> 
       <script>  
       $(function(){ 
         $("#header").load("header.php");  
         $("#footer").load("footer.html");  
       }); 
       </script>  
</head>
<body >
    <div id="header"></div> 
    <?php 
           $category = $_GET [ "cat_id" ];
           
            if( $_GET [ "scat_id" ]==0 ) {
                $sql = " SELECT * FROM products WHERE cat_id =$category ";
                $result = $conn->query($sql);
                echo "<div class='grid-container'>";
               while ($row = $result->fetch_assoc()) {
                    $path="<img src='admin/img/".$row["p_img"].".png' id='image'>";
            
                    echo "
                    <div class='grid-item' style='
                    background-color: 	#fff8a9;'>
                    <a href='single_product.php?
            product_id=".$row['product_id']." ' id='image'>".$path."</a><br>
                    <caption>".$row['product_name']."<br><br><p style='color:#e8a628;'>Rs.".$row['p_price']."</p> </caption>
                           </div>";
                }
                echo "</div>";
            }
            else{
                $sub_category= $_GET [ "scat_id" ]; 
                $sql = " SELECT * FROM products WHERE cat_id =$category and scat_id=$sub_category ";
                $result = $conn->query($sql);
                echo "<div class='grid-container'>";
               while ($row = $result->fetch_assoc()) {
                    $path="<img src='admin/img/".$row["p_img"].".png' id='image'>";
            
                    echo "
                    <div class='grid-item' style='
                    background-color: 	#fff8a9;'>
                    <a href='single_product.php?
            product_id=".$row['product_id']." ' id='image'>".$path."</a><br>
                    <caption>".$row['product_name']."<br><br><p style='color:#e8a628;'>Rs.".$row['p_price']."</p> </caption>
                           </div>";
                }
                echo "</div>";
            }
               
           
                   
            ?>

<div id="footer"></div> 
</body>

    </html>