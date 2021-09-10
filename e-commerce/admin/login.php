<?php include "db_conf.php";

session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Sign In</title>
    <style>
         span{
            color:black;
        }
        .login{  
        width: 382px;  
        overflow: hidden;  
        margin: auto;  
        margin: 0 0 0 450px;  
        padding: 80px;  
        background: #fdfd96;  
        border-radius: 15px ; 
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
       
        }
        .login span{
             color:#2f4f4f;
        }
        .login input{
            width:350px;
        }  
        </style>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script> 
       <script>  
       $(function(){ 
         $("#header").load("templates/top.html");  
       }); 
       </script>  
   
</head>
<body >
  
    
    <div id="header"></div>
   
    <div style="background-color: #f5f5dc ; padding-bottom:50px; margin:0;">
    <div class="login">
    <h3 style="color:dark grey;text-align :center;"><b>Welcome to Omelette ! Please Login</b></h3>
    <h5 style="color: grey;text-align :center;">New Member? Register <a href="signup.php">here</a></h5><br><br>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <span>Email</span><br>
    <input type="text" name="email"><span class="error"><?php echo $email_err;?><br><br>
    <span> password</span><br>
    <span><input type="password" name="password"><span class="error"><?php echo $password_err;?></span></span><br><br>
     <span><input type="submit" value="LOGIN" style="padding:15px;background-color:#e8a628;border-radius: 15px ;border-style:hidden;"></span>
    
    </form>
    
</div>
    <?php
   $email=$password="";
    $error=0;
   
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(empty($_POST['email']))
        {
            $email_err="field cannot be empty";
        }
        else
        {
            $email = $_POST['email'];
        }
        if(empty($_POST['password']))
        {
            $password_err="field cannot be empty";
        }
        else
        {
            $password = $_POST['password'];
           
        }
    }
    if ($error==0)
    {
        if($conn->connect_error)
        {
            die("connection cannot be established");
        }
        else
        {
            $password = md5($password);
            $sql="SELECT * FROM `admin` WHERE email='$email' AND password='$password'; ";
            $result = $conn->query($sql);
           
            if( isset($result)){
                $res = $result->fetch_assoc();
               
             $_SESSION['name']=$res['name'];
             $_SESSION['isloggedin'] = true;
             header('location:customer.php');
           
 
            }
            
            else
            {
                echo "<p class='error'> either the email or the password is incorrect. </p>";
            }
        }
    }
    ?>
 
</div>
    

</body>
</html>