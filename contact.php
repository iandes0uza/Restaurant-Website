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
        <a href="menu.php">Menu</a>
        <a class="active" href="contact.php">Contact</a>
        <a href="https://www.irs.gov/">Financial Documents</a>
        <div class="menu_bar-right">
            <a href="login_user.php">User Log-In</a>
            <a href="login_admin.php">Admin Log-In</a>
            <a href="signUp.php">Sign-Up</a>
        </div>
    </div>
</html>
<?php
    // ini_set("display_errors", "1"); 
    // ini_set("display_startup_errors", "1");
    // error_reporting(E_ALL);
    $c = new PDO('mysql:host=localhost;dbname=restaurantDB', 'root', '');
    $resCall = "SELECT * FROM restaurant";
    $query = $c->query($resCall);
    $site = "https://meow.com";
    $restaurant = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($restaurant)
    {
        echo "<table id=emp>
                        <tr>
                        <th>Name</th>
                        <th>URL</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>Postal Code</th>
                        </tr>";
        foreach ($restaurant as $res)
        {
            echo 
                "<tr>
                    <td>".$res['name']."</td>
                    <td><a href=".$site.">".$res['url']."</a></td>
                    <td>".$res['street']."</td>
                    <td>".$res['city']."</td>
                    <td>".$res['pc']."</td>
                </tr>";
        }
        echo "</table>";
    }
?>