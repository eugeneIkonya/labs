<?php 
    include_once "DBConnector.php";
    include_once "user.php";

    $con = new DBConnector;

    if (isset($_POST['btn-save'])){
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $city_name=$_POST['city_name'];

        $user = new User($first_name,$last_name,$city_name);
        $res = $user->save();
        $allRes=$user->readAll();
    
        if($res){
            echo "The save operation was successful";
        }else{
            echo "An error has occurred!";
        }
    }
    $con->closeDatabase();

?>

<!DOCTYPE html>
    <head>
        <title>Lab 1</title>
    </head>
    <script src="script.js" async defer></script>
    <body>

        <form method="post" action="<?=$_SERVER['PHP_SELF']?>" name="user_data" onsubmit="return validateForm()">
            <table align="center">
                <tr>
                    <td><input type="text" name="first_name" required placeholder="First Name"></td>
                </tr>
                <tr>
                    <td><input type="text" name="last_name" placeholder="Last Name"></td>
                </tr>
                <tr>
                    <td><input type="text" name="city_name" placeholder="City"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="btn-save"><strong>Save</strong></button></td>
                </tr>
            </table> 
            <br><br><br>
             <table class="results" align="center">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>City</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while    
                    if($allRes>0){

                        for ($i=0;$i <$users_number;$i++){
                            $user1=mysqli_fetch_assoc($users);
                        ?>
                        <tr>
                            <td><?php echo $user1['id'];?></td>
                            <td><?php echo $user1['first_name'];?></td>
                            <td><?php echo $user1['last_name'];?></td>
                            <td><?php echo $user1['user_city'];?></td>    
                        </tr>  

                       <?php }}?>
                </tbody>
             </table>  
        </form>        
    </body>
</html>

