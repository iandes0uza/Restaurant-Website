<!-- should have logout, menu, create order, order history, track my orders, update account details -->
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>User Homepage</title>
  <link href="mainpage_style.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="user_switch.css">
        <link rel="stylesheet" type="text/css" href="table_view.css">
</head>
<body>
<div class="menu_bar">
        <a class="active" href="restaurant_user.php">Home</a>
        <a href="#">Add Customer</a>
        <a href="#">View Orders</a>
        <a href="#">View Schedules</a>
        <div class="menu_bar-right">
            <a href="myAccount.php"><?php echo $_SESSION['username']; ?>'s Account</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <center><h1>Welcome to the User Panel</h1>
    <img src="leftsmile.png" alt="leftsmile" width="500" height="300">
    <img src="rainbow.png" alt="mainpageimg" width="800" height="500">
    <img src="rightsmile.jpg" alt="rightsmile" width="500" height="300"></center>
</body>
