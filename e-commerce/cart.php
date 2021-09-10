<?php include"db_conf.php";
 session_start();
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
    
        <div style="
   padding:10px;
   margin-top:20px;
    background-color: #fff8a9;margin-left:200px;margin-right:200px;">


<?php

if(isset($_SESSION["cart"])){

echo "Number of Items in the cart = ".sizeof($_SESSION['cart']);
// echo  "<a href=cart-remove-all.php>Remove all</a><br>";
 
echo "<table style = 'width :100%;'>
<tr>
<th style='text-align:center;'></th>
<th style='text-align:center;'></th>
<th style='text-align:center;'> Products </th>

<th style='text-align:center;'> Quantity</th>
<th style='text-align:center;'> Price</th>
</tr><hr>";
while (list ($key, $val) = each ($_SESSION['cart'])) { 
    $sql = ("SELECT  * FROM `products` where product_id= ".$val." ;");
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $path="<img src='admin/img/".$row["p_img"].".png' id='image'>";
    echo "<form method=post action='checkout.php'>";
    echo "
   <tr>
   <td style='text-align:center;width:20px;'><input type=checkbox name=item[] value='".$row["product_id"]."'></td>
   <td style='width:150px;'><p id='image'>".$path."</p></td>
   <td style='width:200px;'>".$row['product_name']."</td>
   <td style='text-align:center;'> <input type='number' step='1' min='1' max='' name='qty[]' value='1' style='width: 40px;'></p></td>
   <td style='text-align:center;'>Rs.".$row['p_price']."</td>
   </tr>";

    }
    echo "<button><input type=submit value='Proceed to Checkout'></button></form>";
echo"</table>";


?>
<button><a href=cart-remove.php>Remove Item</a> </button>
<?php 
}
else{
    echo "Empty Cart!!";
}


?>
   </div>


    <div id="footer"></div> 

    
</body>

    </html>