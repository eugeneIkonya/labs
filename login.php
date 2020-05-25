<?php
    
    include_once 'user.php';

    if(isset($_POST['btn-login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        //creating and instance of the class as not details are available
        $instance=User::create();
        $instance->setPassword($password);
        $instance->setUsername($username);

        
        if($instance->isPasswordCorrect()){//check if password matches to execute :
            echo("Im alright");//echo on the page to show it moves
            $instance->login();//call to login function 
            //$con->closeDatabase();//close DB connection
            $instance->createUserSession();//create new user session

        }else{
            echo "oops";
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login-form">
        <!-- =$SERVER['PHP_SELF']means that the form is submitting this form to itself for processing -->
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post" name="login" id="login" onsubmit="return loginValidate()">
            
                        <label for="username" class = "login-label" > Username :</label>
                        <input type="text" name="username" class="login-label" placeholder="Username" required>
                
                        <label for="password" class="login-label"> Password :</label>
                        <input type="password" name="password" class=" login-input " placeholder="Password" required>
                
                        <button type="submit" class="btn" name="btn-login">Login </button>
              
        </form>
    </div>
    
</body>
</html>