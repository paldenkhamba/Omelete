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
           $button = $_GET [ "submit" ];
            $search = $_GET [ 'search' ]; 
            if( !$button ) echo "you didn't submit a keyword";
             else { if( strlen( $search ) <= 1 ) 
                echo "Search term too short";
                 else { echo "You searched for <b> $search </b> <hr size='1' > </ br > ";
               
           
                     $sql = " SELECT * FROM products WHERE p_keywords LIKE '%$search%' ";
            $result = $conn->query($sql);
            $foundnum = $result->num_rows;
            if ($foundnum == 0) 
            echo "Sorry, there are no matching result for <b> $search </b> </br> </br>";
             else {
                  echo "$foundnum results found !<p>";
                  echo "<div class='grid-container'>";
               while ($row = $result->fetch_assoc()) {
                    $path="<img src='admin/img/".$row["p_img"].".png' id='image'>";
            
                    echo "
                    <div class='grid-item' style='
                    background-color: 	#fff8a9;'>
                    <p id='image'>".$path."</p><br>
                    <caption>".$row['product_name']."<br><br><p style='color:#e8a628;'>Rs.".$row['p_price']."</p> </caption>
                           </div>";
                }
                echo "</div>";
            }
        }
    }
            ?>

<div id="footer"></div> 
</body>

    </html>