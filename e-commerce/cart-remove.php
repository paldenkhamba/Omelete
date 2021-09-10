<?Php
$item=$_POST['item'];
while (list ($key1,$val1) = @each ($item)) {
//echo "$key1 , $val1,<br>";
unset($_SESSION['cart'][$val1]);}
?>