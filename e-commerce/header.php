<?php include"db_conf.php";
session_start(); ?>
<!DOCTYPE html>
<head>
    <style>
        .header{
display:inline-flex;
    font-size: small;
    font-family:monospace;
    width:90%;
    
}
.header>ul{
    display:inline;
   
}
ul{
    list-style-type: none;
}

a{
    text-decoration:none;
    color:grey;
}
a:hover{
    
    color:black;
}
.float-left{
    float:left;
    list-style-type: none;
   width:45%;
}
.float-left> li{
    display:inline;
    padding-right: 10px;
}

.float-right{
float:right;
text-align: right;
list-style-type: none;
width:45%;
}
.float-right> li{
    display:inline;
}
.topnav{
    padding :0 20px 20px 20px;
    display:inline-flex;
}

.dropdown{
    padding : 5px;
    }
.dropdown-1{
    background-color: #fff68f;
padding : 5px;
}

.dropdown-content{
    color:grey;
    display:none;
    position:absolute;
    background-color: rgb(255, 255, 255);
    list-style-type: none;
    text-align: left;
    min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

    }
 .dropdown-content-1{
     padding:10px;
    color:grey;
    left:150px;
    display:none;
    position:absolute;
    background-color: rgb(255, 255, 255);
    list-style-type: none;
    text-align: left;
    min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

    }
.dropdown-content>li{
    padding : 10px;
}
.dropdown-1:hover .dropdown-content {
     display: block;
    }
.dropdown:hover .dropdown-content {
    display: block;
}
.dropdown>li:hover .dropdown-content-1 {
    display: block;
}
.dropdown-content-1 li{
    padding :5px;

}

    


    </style>
</head>
<body >
<div class="header"><ul class="float-left"><li>Connect with us</li><li><img src="admin\img\fb.png"></li><li><img src="admin\img\insta.png"></li><li><img src="admin\img\twitter.png"></li><li>contact us +97715970000</li></ul>
        <ul class="float-right"><li><?php if(isset($_SESSION['first_name']))
echo $_SESSION['first_name']."'s account";?>
</li><li>| SELL ON Omelete  |</li><LI>HELP CENTER   |</LI><LI>TRACK ORDER</LI></ul>
    </div>
       
    <hr style="color: lightgray;">
        
    <div class="topnav">
            <a href="homePage.php"><img src= "admin\img\logo2.png" style="margin-left:10px;margin-right: 20px;" width="200"  height="35"></a>
            <form action = "search.php" method ="GET">
            <input  style="width:700px;padding-top: 10px;margin-right:50px;border-color: yellow;"  type="text" placeholder="Search entire store here..." size= 100 name="search">
            <button><input type = 'submit' name = "submit" value = 'Search' ></button>
            </form>
            
            <div class="dropdown" style="float:right;"><img src = "admin\img\signin.png" style="margin-right:30px;">
            <div class="dropdown-content" style="text-align: center; ">
            <?php 
            if(isset( $_SESSION['first_name'])){
                echo "<li><a href='logout.php' style='text-align: center; '>Log Out</a></li>";
            }
            else{
                echo "<li><a href='signin.php' >Sign In</a></li>";
                echo "<li>New customer?</li>";
                echo "<li><a href='signup.php' style='text-align: center; '>Start here</a></li>";
            }
            ?>
            </div>
            </div>
            <a href="cart.php" > <img src = "admin\img\cart.png" ></a>
            
     </div>
    
       <div class="dropdown-1" > 
           <span style="padding-left:55px; color: grey;font-weight: bold;">CATEGORIES </span>
           <div class="dropdown-content">
              <ul>
                   <?php
                   
                   $sql = ("SELECT * FROM categories ;");
                   $result = $conn->query($sql);
                   if ($result->num_rows > 0) {
                       while ($row = $result->fetch_assoc()) {
                         echo "<div class='dropdown'>";
                         echo"<li><a href='display.php?cat_id=".$row['cat_id']."&scat_id=0'>".$row['cat_title']."</a>";
                          
                           echo "<div class='dropdown-content-1'>";
                           echo "<ul>";
                           $sql1 = ("SELECT * FROM sub_categories where cat_id=".$row['cat_id'].";");
                           $result1 = $conn->query($sql1);
                            while ($row1 = $result1->fetch_assoc()) {
                              

                                echo "<li><a href='display.php?cat_id=".$row['cat_id']."&scat_id=".$row1['scat_id']."'>".$row1['sub_title']."</a></li>";
                                   
                            }
                            echo "</ul>";
                            echo "</div>";
                            echo "</li>";
                            echo "</div>";
                   
                       }
                    }
                
                           ?>
                    </ul>
              
           </div>
          
       </div>
    
</body>
</html>