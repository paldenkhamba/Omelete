<?php include"db_conf.php";
 session_start();
 if(!isset($_SESSION['first_name']))
 {
      header('location:login.php');
 } ?>
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
    
    <div style="  margin-right:150px;
    margin-left:150px; background-color:white;padding:30px;">

<div style="background-color: 	#fff8a9;">
<?php
$subtotal=0;
$subtotal1=0;
$total=0;
while ((list ($key, $val) =  @each ($item))){
    echo $key->$val;
}
    if(isset($_SESSION["cart"])){
       
        $item=$_POST['item'];
        $qty=$_POST['qty'];
    
echo "Number of Items in the cart = ".sizeof($item);


echo "<table style='width:100%;padding-top:20px;'>
<tr>

<th style='text-align:center;'></th>
<th style='text-align:center;'> Products </th>

<th style='text-align:center;'> Quantity</th>
<th style='text-align:center;'> Price</th>
<th style='text-align:center;'> Total</th>
</tr><hr>";
 
while ((list ($key, $val) =  @each ($item))& (list ($i)=@each($qty))){ 
   
    $sql = ("SELECT  * FROM `products` where product_id= ".$val." ;");
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $path="<img src='admin/img/".$row["p_img"].".png' id='image'>";
    echo "<form method=post action='checkout.php'>";
    $subtotal=$qty[$i]*$row['p_price'];
    $subtotal1+= $subtotal;
    echo "
   <tr>
   <td style='text-align:center;width:20px;'></td>
   <td style='width:150px;'><p id='image'>".$path.$row['product_name']."</td>
   <td style='text-align:center;'> ".$qty[$i]."</td>
   <td style='text-align:center;'>Rs.".$row['p_price']."</td>
   <td style='text-align:center;'>Rs.".$subtotal."</td>
   
   </tr>";

    
}
echo "</table>";$total=$subtotal1+69;
    }
    ?>  <hr>
    </div>

    <div style="display:grid;grid-template-columns:repeat(2,1fr);background-color: 	#fff8a9;padding:30px;">
  
<div style="margin-top:20px;">

<?php

   $sql = ("SELECT  * FROM `user_info` where first_name='". $_SESSION['first_name']."';");
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   echo "<br><h4>Shipping Address</h4>";
   echo $row['first_name']." ".$row['last_name'];
   echo"<hr>";
   echo "Address : ".$row['address']."<br>";
   echo $row['mobile']."<br>";
   echo $row['email'];
   ?>
   </div>
   <div class="checkout">
       <table >
<tr>
<th> Sub Total</th>
<td> <?php echo $subtotal1?></td>
</tr>
<tr>
    <th>Shipping Fee</th>
    <td>Rs. 69</th>
</tr>
<tr>
    <th> Total</th>
    <td> <?php echo $total?></td>
</tr>
</table>

<button style="padding:30px;width:100%;"><a href="homePage.php" onClick="alert('Order Registered!!!')">Confirm Order</a></button>
    </div>
</div>

  
<?php
while ((list ($key, $val) =  @each ($item))& (list ($i)=@each($qty))){ 
   
    $sql = ("SELECT  * FROM `products` where product_id= ".$val." ;");
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $sql2 = ("SELECT  * FROM `user_info` where first_name='". $_SESSION['first_name']."';");
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $sql1 = ("INSERT INTO orders(user_id,product_id,qty) VALUES(".$row2['user_id'].",".$row['product_id'].",".$qty[$i].",'".$total."'; ");
    $conn->query($sql1);
}
?>

 
    </div>
  
    <!-- <div id="footer"></div>  -->

    
</body>

    </html>