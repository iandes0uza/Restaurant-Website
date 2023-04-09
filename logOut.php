<?php
    session_start();
    session_destroy();
    echo "Succesfully Logged Out!";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Logging Out</title>
        <link rel="stylesheet" type="text/css" href="user_switch.css">
        
    </head>
    <body>
        <btn onclick="window.location.href='restaurant.php';">Return to Main Menu</btn>
    </body>
</html>