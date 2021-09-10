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
    
    <title>Brands</title>
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
    <h2> Brands</h2>
    
    <div class="dropdown" style="float:right;"><p style="margin-right:30px;">Operations</p>
            <div class="dropdown-content" style="text-align: center; ">
                <li><button id ="myBtn1" class ="button" type="button" data-target="#MyModal" ><b>Add </b></button></li>
                <li><button id ="myBtn2" class ="button" type="button" data-target="#MyModal2"><b>Update</b></button></li>
                <li><button id ="myBtn3" class ="button" type="button" data-target="#MyModal3"><b>Delete</b></button></li>
            </div>
            </div> 
                
      </div>
    <br>
    <hr>
    <br>
    <table>
        <thead>
<tr>
    <th> Brand ID</th>
    <th>Brand name</th>
    </tr>
    <thead>
    
    </table>
    <hr>
    <?php
    $sql = ("SELECT `brand_id`, `brand_title` FROM `brands`");
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<table>
                    <tr>
                    <td >".$row["brand_id"]."</td>
                    <td>".$row["brand_title"]."</td>
                    </tr>
                    </table>";
          
    }
}
    ?>

    </div>

    
    <div id="myModal" class="modal">
  
  <div class="modal-content ">
    <span class="close">&times;</span>
     <h3 style="text-align:center;">Brand registration</h3>
    
     <form action ="brand.php"  method ="POST">
      <label for="product_name"><b>Brand Name</b></label><br>
      <input type="text" placeholder="Enter Brand name" name="brand_title" required>
      
        <input type="submit" value="Submit" style="padding:15px;background-color:#e8a628;border-radius: 15px ;border-style:hidden;">
     </form>

     <?php

    $brand_title="";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
            $brand_title = $_POST['brand_title'];
        }
    
      if($conn->connect_error)
        {
            die("connection cannot be established");
        }
        else
        {
           
            $sql="INSERT INTO brands(brand_title) values('$brand_title')"; 
           
           
             if($conn->query($sql)===TRUE)
             {
                 
                echo '<script>alert("Brand Registered!");
                if ( window.history.replaceState ) {
                  window.history.replaceState( null, null, window.location.href );
                }</script>';
            }
            
            else
            {echo $brand_title;
                echo "<p class='error'>Error! </p>";
            }
        }
    
    ?>
    </div>
</div>

<div id="myModal2" class="modal">
  
  <div class="modal-content ">
    <span class="close">&times;</span>
     <h3 style="text-align:center;">Update Brand</h3>
    
     <form action ="brand.php"  method ="POST">
     <label for="brand_id"><b>Brand ID</b></label><br>
      <input type="text" placeholder="Enter Brand ID" name="brand_id" required>
      <label for="brand_name"><b>Brand Name</b></label><br>
      <input type="text" placeholder="Enter Brand name" name="brand_title" required>
      
        <input type="submit" value="Update" style="padding:15px;background-color:#e8a628;border-radius: 15px ;border-style:hidden;">
     </form>

     <?php

    $brand_title=$brand_id="";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
            $brand_title = $_POST['brand_title'];
            $brand_id = $_POST['brand_id'];
        }
    
      if($conn->connect_error)
        {
            die("connection cannot be established");
        }
        else
        {
           
            $sql="UPDATE brands SET brand_title='$brand_title' where brand_id=$brand_id"; 
           
           
             if($conn->query($sql)===TRUE)
             {
                 
                echo '<script>alert("Brand Registered!");
                if ( window.history.replaceState ) {
                  window.history.replaceState( null, null, window.location.href );
                }</script>';
            }
            
            else
            {
                echo "<p class='error'>Error! </p>";
            }
        }
    
    ?>
    </div>
</div>
    


<div id="myModal3" class="modal">
  
  <div class="modal-content ">
    <span class="close">&times;</span>
     <h3 style="text-align:center;">Delete Brand</h3>
    
     <form action ="brand.php"  method ="POST">
     <label for="brand_id"><b>Brand ID</b></label><br>
      <input type="text" placeholder="Enter Brand ID" name="brand_id" required>
     
        <input type="submit" value="Delete" style="padding:15px;background-color:#e8a628;border-radius: 15px ;border-style:hidden;">
     </form>

     <?php

    $brand_id="";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
           
            $brand_id = $_POST['brand_id'];
        }
    
      if($conn->connect_error)
        {
            die("connection cannot be established");
        }
        else
        {
           
            $sql="DELETE FROM brands where brand_id=$brand_id"; 
           
           
             if($conn->query($sql)===TRUE)
             {
                 
                echo '<script>alert("Brand Registered!");
                if ( window.history.replaceState ) {
                  window.history.replaceState( null, null, window.location.href );
                }</script>';
            }
            
            else
            {
                echo "<p class='error'>Error! </p>";
            }
        }
    
    ?>
    </div>
</div>

<script>
var modal1 = document.getElementById("myModal");
var modal2 = document.getElementById("myModal2");
var modal3 = document.getElementById("myModal3");

var btn1 = document.getElementById("myBtn1");
var btn2 = document.getElementById("myBtn2");
var btn3 = document.getElementById("myBtn3");


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

