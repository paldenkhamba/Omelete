<?php include"db_conf.php";
//session_destroy();
//unset($_SESSION['name']);
 session_start();
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
    <div id="body">

    <?php
    if (isset($_GET["product_id"])){
    $sql = ("SELECT * FROM `products`where product_id=".$_GET["product_id"].";");
    $result = $conn->query($sql);
    $row = $result->fetch_assoc() ;
            $path="<img src='admin/img/".$row["p_img"].".png' style='height:350px;width:250px;'>";
    $sql1 = ("SELECT cat_title,brand_title,sub_title FROM `products` left join brands on products.brand_id=brands.brand_id left join categories on products.cat_id=categories.cat_id left join sub_categories on products.scat_id=sub_categories.scat_id where product_id=".$_GET["product_id"].";");
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc() ;
    ?>
          
         <p style="margin-left:150px;">
              <?php echo $row1['cat_title']?> > <?php echo $row1['sub_title']?>
    </p>
    <div class="singleProduct">
<div class="sp_item">
    <p id ="sp-image" ><?php echo $path?></p>
    </div>

<div class="sp_item">
    <h2><?php echo $row['product_name']?></h2>
    <br>
    <hr style="color:light grey;">
    <br>
    <h1 style='color:#e87628;' >Rs.<?php echo $row['p_price']?></h1>
    <hr style="color:light grey;">
  <div><br><br>
  
  
  <form id= "form" method="post" action='single_product.php'>
  <p>Quantity
    <input type='number' step='1' min='1' max='' name='qty' value='1'  style='width: 40px;'></p>
    <p style="color:grey;font-size:small;">only <?php echo $row['p_qty']?> items left</p>
    <br>
  </form>
  
 

    <button id ="myBtn" class ="button" type="button" data-target="#MyModal" ><b> Add to Cart</b></button>
    </form>
  
   </div>
    <br>
    <div>
    <p ><h4>Supplier :</h4><?php echo $row['p_supplier']?></p>
    </div>
    </div>
    </div><br>
    <div style="padding-left:50px;padding-bottom:50px;padding-top:20px;  margin-right:150px; margin-left:150px;background-color: #fff8a9;">
   
    <h4>Product Details:</h4><br>
    <?php echo $row['p_desc']?>
    
    </div>

    

<?php
    }
    else 
    echo "No Product Found";
    ?>


<br>
<div style=" margin-right:150px; margin-left:150px;background-color: #fff8a9;">
    <p >Products you may also like</p>
    <div class="grid-container">
    <?php
    $sql1 = ("SELECT  `product_name`, `p_img`, `p_price` FROM `products`where cat_id= ".$row['cat_id']." ;");
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $path="<img src='admin/img/".$row1["p_img"].".png' id='image'>";
     
            echo " 
            <div class='grid-item-1'>
            <p  id='image'>".$path."</p>
            <caption>".$row1['product_name']."<br><br><p style='color:#e8a628;'>Rs.".$row1['p_price']."</p> </caption>
                   </div>";
          
    }
}
    ?>
    </div>
</div>
</div>
<div id="myModal" class="modal">

  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="singleProduct">
        <div class="sp_item">
           
    <?php
    
    $qty="";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
    $qty=$_POST["qty"];
    }
   
    array_push($_SESSION["cart"],$row['product_id']);
    
    echo " <h4 style='color:#00cc00;'> ".$qty." New item/s have been added to your cart</h4>";
     $sql = ("SELECT  `product_name`, `p_img`, `p_price` FROM `products` where product_id= ". $row['product_id']." ;");
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $path="<img src='admin/img/".$row["p_img"].".png' id='image'>";
            
            echo "
            <div class='grid-item' style='
            background-color: 	#fff8a9;'>
            <p id='image'>".$path."</p><br>
            <caption>".$row['product_name']."<br><br><p style='color:#e8a628;'>Rs.".$row['p_price']."</p> </caption>
                   </div>";
}
    }
    ?>
    </div>
    <div class='sp_item' >
        <h3>My Shopping Cart</h3>
        <a href="cart.php"><button >Go to Cart </button></a>
        <a href="checkout.php"><button >Checkout</button></a>
</div>
    </div>
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

    <div id="footer"></div> 
</body>

    </html>