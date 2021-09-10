<?php include"db_conf.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Sign Up</title>
    <style>
        .error{
            color:red;
        }
        span{
            color:black;
        }
        .login{  
        width: 382px;  
        overflow: hidden;  
        margin: auto;  
        margin: 20 0 0 450px;  
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
         $("#header").load("header.php");  
         $("#footer").load("footer.html");  
       }); 
       </script>  
   
</head>
<body >
  
    
    <div id="header"></div> 
  <div style="background-color: #f5f5dc ; padding-bottom:50px; margin:0;">
    <?php
    $firstname=$lastname=$mobile=$address=$email=$password=$confirm_password="";
    $error=0;
    $firstname_err=$lastname_err=$email_err=$password_err=$confirm_password_err=$password_mismatch="";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
 
        if(empty($_POST['firstname']))
        {
            $firstname_err="field cannot be empty";
        }
        else
        {
            $firstname = $_POST['firstname'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];

        }
        if(empty($_POST['lastname']))
        {
            $lastname_err="field cannot be empty";
        }
        else
        {
            $lastname = $_POST['lastname'];
        }
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
            if(empty($_POST['confirm_password']))
            {
                $confirm_password_err="field cannot be empty";
            }
            else
            {
                $confirm_password = $_POST['confirm_password'];
                if($password!=$confirm_password)
                {
                    $password_mismatch = "both password must match";
                }
            }
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
            $password=md5($password);
            $sql="insert into user_info(first_name,last_name, email,password,mobile,address) values('$firstname','$lastname','$email','$password','$mobile','$address') ";
            if($conn->query($sql)===true)
            {
                echo '<script>alert("Registration Successful!!!")</script>';
            }
            else
            {
                echo "<p class='error'> please correct the errors</p>";
            }
        }
    }
    ?>
    <div class="login">
    <h3 style="color:dark grey;text-align :center;"><b>New Customer Registration</b></h3>
    <h5 style="color: grey;">Create an account to experience faster shopping</h5><br><br>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <span>First Name</span><br>
    <input type="text" name="firstname"><span class="error"><?php echo $firstname_err;?><br><br>
    <span>Last Name</span><br>
    <input type="text" name="lastname"><span class="error"><?php echo $lastname_err;?><br><br>
    <span>Contact Number</span><br>
    <input type="text" name="mobile"><br><br>
    <span>Address</span><br>
    <input type="text" name="address"><br><br>
    <span>Email</span><br>
    <input type="text" name="email"><span class="error"><?php echo $email_err;?><br><br>
    <span> password</span><br>
    <span><input type="password" name="password"><span class="error"><?php echo $password_err;?></span></span><br><br>
    <span>Confirm password</span><br>
    <span><input type="password" name="confirm_password"><span class="error"><?php echo $confirm_password_err;?></span></span><br><br>
    <span><span class="error"><?php echo $password_mismatch;?></span></span><br>
    <span><input type="submit" value="Sign Up" style="padding:15px;background-color:#e8a628;border-radius: 15px ;border-style:hidden;"></span>
    
    </form>
    
</div>
</div>
    <div id="footer"></div> 

</body>
</html>