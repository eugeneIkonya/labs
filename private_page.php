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
        <p>This is a private page</p>
        <p>We want to protect it</p>
        <p><a href="logout.php">Logout</a></p>
        <script src="script.js" async defer></script>
    </body>
</html>