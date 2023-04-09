<!-- Attaching a styling theme -->
<head>
    <link href="mainpage_style.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="user_switch.css">
        <link rel="stylesheet" type="text/css" href="table_view.css">
</head>
<!DOCTYPE html>
<html>
    <div class="menu_bar">
        <a href="restaurant.php">Home</a>
        <a class="active" href="menu.php">Menu</a>
        <a href="contact.php">Contact</a>
        <a href="https://www.irs.gov/">Financial Documents</a>
        <div class="menu_bar-right">
            <a href="login_user.php">User Log-In</a>
            <a href="login_admin.php">Admin Log-In</a>
            <a href="signUp.php">Sign-Up</a>
        </div>
    </div>  
</html>
<?php
    ini_set("display_errors", "1"); 
    ini_set("display_startup_errors", "1");
    error_reporting(E_ALL);
    $c = new PDO('mysql:host=localhost;dbname=restaurantDB', 'root', '');
    $resCall = "SELECT `name` FROM restaurant";
    $query = $c->query($resCall);
    $restaurant = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($restaurant)
    {
        foreach ($restaurant as $res)
        {
            $resName = $res['name'];
            $menuCall = "SELECT m.name, m.price FROM menuItems AS m WHERE (m.resName = '$resName')";
            $query = $c->query($menuCall);
            $menu = $query->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($menu))
            {
                echo "<table id=emp>
                        <h1><center>$resName<center></h1>
                        <tr>
                        <th>Item Name</th>
                        <th>Price</th>
                        </tr>";
                foreach ($menu as $m)
                {
                    echo 
                    "<tr>
                        <td>".$m['name']."</td>
                        <td>".$m['price']."$</td>
                    </tr>";
                }
                echo "</table>";
            }
        }
    }
?>