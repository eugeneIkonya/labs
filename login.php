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
            <table class="tbl-login">
                <tr>
                    <td>
                        <label for="username">Username :</label>
                        <input type="text" name="username" placeholder="Username" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password :</label>
                        <input type="password" name="password" placeholder="Password" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn" name="btn-login">Login </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
</body>
</html>