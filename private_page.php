<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:login.php");
    }
?>
<!DOCTYPE html>
    <head>
        <title>Private page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
       
        <p><a href="logout.php">Logout</a></p>
        <script src="script.js" async defer></script>
    </body>
</html>