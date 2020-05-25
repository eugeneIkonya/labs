<?php 
    include_once "DBConnector.php";
    include_once "user.php";

    $con = new DBConnector;

    $person=User::create();
    $users=$person->readAll();


    if (isset($_POST['btn-save'])){
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $city_name=$_POST['city_name'];
        $username=$_POST['username'];
        $password=$_POST['password'];

        $user = new User($first_name,$last_name,$city_name,$username,$password);
        
        if(!$user->validateForm()){
            $user->validateFormErrorSessions();
            header("Refresh:0");
            die();
        }
        if(!$user->isUserExists()){
            $res = $user->save();
            if($res){
                echo "The save operation was successful";
            }else{
                echo "An error has occurred!";
            }
        }else{
            echo "User Exists";
        }
    }
   
    $con->closeDatabase();

?>

<!DOCTYPE html>
    <head>
        <title>Lab 1</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <script src="script.js" async defer></script>
    <body>
    <div class="heading">
        <h1 class="heading">I.A.P Lab Exercises</h1>
       
    </div>
    <div class="create_user">
        <h1 class="heading">Create User ...</h1>
        <button class="btn" onclick="showSignup()">Create User</button>
        <form method="post" action="<?=$_SERVER['PHP_SELF']?>" id="signup" name="user_data" onsubmit="return validateForm()">

            <ul>
                <li>
            <div id="form-errors">
              
                    <?php
                        session_start();
                       
                    ?>
                    
                
            </div>
                
                        <label for="first_name"> First Name :</label> 
                        <input type="text" name="first_name" required placeholder="First Name"><br>
                    
                        <label for="last_name">Last Name :</label>
                        <input type="text" name="last_name" placeholder="Last Name"><br>
                   
                        <label for="city_name">City Name :</label>
                        <input type="text" name="city_name" placeholder="City"><br>
                  
                        <label for="username">Username :</label>
                        <input type="text" name="username" placeholder="Username"><br>
             
                        <label for="password">Password :</label>
                        <input type="password" name="password" placeholder="Password"><br><br>
               
                        <button type="submit" class="btn" name="btn-save"><strong>Save</strong></button>
                
       
            
        </form>
    </div>
    <h1 class="heading">Task: Read all...   <br><button class="btn" onclick="displayTable()">Read All</button></h1>
    <div class="read_all_task" id="users_table">
       <table class="tables">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>City Name</th>
                <th>Username</th>
            </tr>
            <?php
                
                while($user = mysqli_fetch_assoc($users)){
                  
                   echo " <tr>";

                        echo "<td>". $user['first_name'] . "</td>";
                        echo "<td> ". $user['last_name']. "</td>";
                        echo "<td>". $user['user_city']. "</td>";
                        echo "<td> ". $user['username']."</td>";
                    echo "</tr>";
                    
                }

            ?>
       </table>
    
    </div> 
    <div class="login">
        <h1 class="heading">Login ...</h1>
        <a href="login.php" class="btn ">Login</a>
    </div>       
    </body>
</html>

