<?php include"db_conf.php";
 //session_start();

?>
<!DOCTYPE html>
<head>
    <title>Online shopping in Nepal| Buy online in Nepal </title>
    
        <link rel="stylesheet" href="s.css">
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
   
<!---ad row 1---->
    <div class="nospace">
       <img src="admin/img/p2.png"  >
   <img src="admin/img/ad.png" >
    </div>
   <div  class='grid-container'>
<!--grid 1-->
<?php
    $path="";
    $sql = ("SELECT  product_id,`product_name`, `p_img`, `p_price` FROM `products`where cat_id=1 ;");
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $path="<img src='admin/img/".$row["p_img"].".png' id='image'>";
     
            echo "
            <div class='grid-item'>
            <a href='single_product.php?
            product_id=".$row['product_id']." ' id='image'>".$path."</a><br>
            <caption>".$row['product_name']."<br><br><p style='color:#e8a628;'>Rs.".$row['p_price']."</p> </caption>
                   </div>";
          
    }
}
    ?>
</div>

   
   <div class="container">
    <div class="row"> <img src="admin/img/ad2.PNG" ></div>
    <div class="row">
    <img src="admin/img/g1.PNG">
   <div ><img src="admin/img/g2.PNG">
    <img src="admin/img/g3.PNG"></div>
    <div class="row"><img src="admin/img/g4.PNG"></div>
</div>
</div></div>

<div class="title"><h6>SUMMER COLLECTIONS</h6><hr>
    <div class="grid-container-1">
    <?php
    $path="";
    $sql = ("SELECT  product_id,`product_name`, `p_img`, `p_price` FROM `products`where cat_id=5 or cat_id=4 ;");
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $path="<img src='admin/img/".$row["p_img"].".png' id='image'>";
     
            echo "
            <div class='grid-item'>
            <a href='single_product.php?
            product_id=".$row['product_id']." ' id='image'>".$path."</a><br>
            <caption>".$row['product_name']."<br><br><p style='color:#e8a628;'>Rs.".$row['p_price']."</p> </caption>
                   </div>";
          
    }
}
    ?>
</div>
</div>

<div class="ad"><img src="admin/img/ad4.png">
    <img src="admin/img/ad5.png">
    <img src="admin/img/ad6.png"></div>

   
    
<div class="title"><h6> LIFESTYLE</h6><hr>
    <div class="grid-container-1">
    <?php
    $path="";
    $sql = ("SELECT  product_id,`product_name`, `p_img`, `p_price` FROM `products`where cat_id=6 or cat_id=2 LIMIT 7 ;");
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $path="<img src='admin/img/".$row["p_img"].".png' id='image'>";
     
            echo "
            <div class='grid-item'>
            <a href='single_product.php?
            product_id=".$row['product_id']." ' id='image'>".$path."</a><br>
            <caption>".$row['product_name']."<br><br><p style='color:#e8a628;'>Rs.".$row['p_price']."</p> </caption>
                   </div>";
          
    }
}
    ?>
</div>
</div>
<div class="container"><img src="admin/img/ad3.PNG" style="align-content: center;"></div>

    

<div style="text-align: center;" ><p><b>Keep updated & Get Unlimited Offers</b><br>
    <span style="color: gray;"> Sign up for our newsletter to receive updates & exclusive offers</span></p>
    <div class="search"><input  type="text" placeholder="Your email-address..."></div>
</div>


    <div id="footer"></div> 

    
</body>

    </html>