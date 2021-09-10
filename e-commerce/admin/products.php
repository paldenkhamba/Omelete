<?php include "db_conf.php";
// session_start(); 
// if(!isset($_SESSION['name']))
// {
//      header('location:login.php');
//  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Products</title>
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
    <h2> Product List</h2>
    <button id ="myBtn" class ="button" type="button"  ><b>Add Product</b></button>
    </div>
    <br>
    <hr>
    <br>
    <table>
        <thead>
<tr>
    <th> Product ID</th>
    <th> Category ID</th>
    <th> Sub-Cat ID</th>
    <th> Brand ID</th>
    <th>Name</th>
    <th>Image</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Supplier</th>
    </tr>
    <thead>
    
    </table>
    <hr>
    <?php
    $sql = ("SELECT `product_id`, `cat_title`,`sub_title`,`brand_title`, `product_name`, `p_img`, `p_qty`, `p_price`,'p_supplier' FROM `products` left join brands on products.brand_id=brands.brand_id left join categories on products.cat_id=categories.cat_id left join sub_categories on products.scat_id=sub_categories.scat_id;");
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $path="<img src='img/".$row["p_img"].".png' id='image'>";
     
            echo "<table class='p'>
                    <tr>
                    <td>".$row["product_id"]."</td>
                    <td>".$row["cat_title"]."</td>
                    <td>".$row["sub_title"]."</td>
                    <td>".$row["brand_title"]."</td>
                    <td>".$row["product_name"]."</td>
                    <td  id='image'>".$path."</td>
                    <td>".$row["p_qty"]."</td>
                    <td>".$row["p_price"]."</td>
                    <td>".$row["p_supplier"]."</td>
                    </tr>
                    </table>";
          
    }
}
    ?>


<div id="myModal" class="modal">
  
  <div class="modal-content ">
    <span class="close">&times;</span>
     <h3 style="text-align:center;"> Product registration</h3>
    
     <form action ="products.php"  method ="POST">
      <label for="product_name"><b>Product Name</b></label><br>
      <input type="text" placeholder="Enter Product name" name="product_name" required>
        <br>
        <label for="cat_id"><b>Category</b></label><br>
      <input type="text" placeholder="Enter Category" name="cat_title" required>
        <br>
        <label for="scat_id"><b>Sub-Category</b></label><br>
      <input type="text" placeholder="Enter Sub-Category" name="sub_title" required>
        <br>
        <label for="brand_id"><b>Brand</b></label><br>
      <input type="text" placeholder="Enter Brand " name="brand_title" required>
        <br>
      <label for="p_qty"><b>Quantity</b></label><br>
      <input type="text" placeholder="Enter quantity" name="p_qty" required>
      <br>
      <label for="p_price"><b>Price</b></label><br>
      <input type="text" placeholder="Enter Price" name="p_price" required>
        <br>
        <label for="p_supplier"><b>Supplier</b></label><br>
      <input type="text" placeholder="Enter Supplier" name="p_supplier" required>
        <br>
        <label for="p_img"><b>upload image</b></label><br>
        <input type ="file" name='fileToUpload' id='fileToUpload'>
        <input type="submit" value="Submit" style="padding:15px;background-color:#e8a628;border-radius: 15px ;border-style:hidden;">
     </form>

     <?php

    $product_name=$cat_id=$cat_title=$sub_title=$brand_title=$scat_id=$brand_id=$p_qty=$p_price=$p_supplier=$p_img ="";
    $error=0;
    $product_name_err=$p_price_err="";
    if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['submit']))
    {
    $p_img = basename($_FILES['fileToUpload']['name']);
    
    $product_name=$_POST['product_name'];
    $cat_title=$_POST['cat_title'];
    $sub_title=$_POST['sub_title'];
    $brand_title=$_POST['brand_title'];
    $p_qty=$_POST['p_qty'];
    $p_price=$_POST['p_price'];
    $p_supplier=$_POST['p_supplier'];
   
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$p_img);
    $name = $_POST['name'];
    }
    
      if($conn->connect_error)
        {
            die("connection cannot be established");
        }
        else
        {
           $sql1= "SELECT cat_id FROM categories where cat_title=$cat_title";
           $result = $conn->query($sql1);
           $cat_id=  $result->fetch_assoc();
           $sql2= "SELECT scat_id FROM sub_categories where sub_title=$sub_title";
           $result = $conn->query($sql2);
           $scat_id=  $result->fetch_assoc();
           $sql3= "SELECT cat_id FROM brands where brand_title=$brand_title";
           $result = $conn->query($sql3);
           $brand_id=  $result->fetch_assoc();
           $
            $sql="INSERT INTO products(product_name,cat_id,scat_id,brand_id,p_qty,p_price,p_supplier,p_img) values('$product_name',$cat_id,$scat_id,$brand_id,$p_qty,$p_price,'$p_supplier','$p_img')"; 
           
           
             if($conn->query($sql)===TRUE)
             {
                echo "<script>alert('Product Registered!');
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>";
                
            }
            
            else
            {
              echo $cat_id;
                echo "<p class='error'>Error! </p>";
            }
        }
    
    ?>
    </div>
</div>

<script>
var modal = document.getElementById("myModal");

var btn = document.getElementById("myBtn");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
    </div>
    </body>
    </html>

