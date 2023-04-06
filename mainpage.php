<!-- Attaching a styling theme -->
<head>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>

<?php
    include 'restaurantDB.php';
?>

<!DOCTYPE html>
<html>
    <ul>
        <!-- <li><img src="AirplaneLogo.png" alt="AirlineLogo" width="85" height="85"></li> -->
        <li><a href="createOrder.php">Create an Order</a></li>  <!-- spoof page to simulate account requirement to start order -->
        <li><a href="trackOrder.php">Track Order</a></li>    <!-- Allow users to track their orderID without signing in (exist in both log-in & homepage-->
        <li><a href="logIn.php">Log-In</a></li>    <!-- Log users in to track order origin -->
        <li><a href="signUp.php">Sign-Up</a></li>   <!-- Allow users to add name to DB, forward to login after sign up completed-->
        <li><a href="menu.php">Sign-Up</a></li>   <!-- Allow users to view menu from different locations-->
    </ul>
    <body>
        <h1>Ian's Very Legal Tax Paying Restaurant</h1>
        <p>Hello there! Thank you for visiting!</p>
        <a href="https://www.queensu.ca">This is a link</a>
    </body>
    <table>
        <tr><th>Name</th><th>Age</th></tr>
        <tr><td>Bob</td><td>49</td></tr>
        <tr><td>Cindy</td><td>50</td></tr>
    </table>
    <form action="myfirstPHP.php" method="post">
        <p>First name:</p>
        <input type="text" name="firstname">
        <br>
        <p>Last name: </p>
        <input type="text" name="lastname">
        <input type="submit">
    </form>
</html>