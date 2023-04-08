<?php
    ini_set("display_errors", "1");
    ini_set("display_startup_errors", "1");
    error_reporting(E_ALL);
    session_start();
    $c = new PDO('mysql:host=localhost;dbname=restaurantDB', 'root', '');
    $message = "";
    if (isset($_POST['submit']))
    {
        $count = 0;
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $pass = $_POST['pass'];
        $passRetyped = $_POST['cpass'];
        $num = $_POST['num'];
        $city = $_POST['ccity'];
        $street = $_POST['cstreet'];
        $lname = $_POST['lname'];
        $pc = $_POST['pc'];
        $checkExisting = "SELECT COUNT(`email`) FROM `customer` WHERE `email` = '$email'";  
        $addUser = "INSERT INTO customer (email, paswrd, credit, firstName, lastName, phoneNum, street, city, pc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if(empty(trim($email)) || empty(trim($pass)) || empty(trim($passRetyped)) || empty(trim($num)))
        {
            echo "One of the required fields left blank";
        }
        else
        {
            $query = $c->prepare($checkExisting);
            $query->execute();
            $count = $query->fetchColumn();
            if($count >= 1)
            {
                echo "Account with that user already exists.";
            }
            else
            {
                if ($pass == $passRetyped)
                {
                    $query = $c->prepare($addUser);
                    $query->execute([$email, $pass, 5, $fname, $lname, $num, $street, $city, $pc]);
                    echo "Account Created";
                }
                else
                {
                    echo "Passwords do not match";
                }
            }
        }

    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Customer</title>
    </head>
    <body>
        <button onclick="window.location.href='mainpage_admin.php';">Back</button>
        <div id="addCustomerForm">
            <h1>Add Customer</h1>
            <!--<h2>Please input specified user details</h2>-->
            <form action="" name="add_cus_form" method="post">
                <label>Customer Email: </label>
                <input type="email" id="email" name="email"><br></br>

                <label>Customer First Name: </label>
                <input type="text" id="fname" name="fname"><br></br>

                <label>Customer Last Name: </label>
                <input type="text" id="lname" name="lname"><br></br>

                <label>Customer Phone Number: </label>
                <input type="text" id="num" name="num"><br></br>

                <label>Customer City: </label>
                <input type="text" id="ccity" name="ccity"><br></br>

                <label>Customer Street: </label>
                <input type="text" id="cstreet" name="cstreet"><br></br>

                <label>Customer Postal Code: </label>
                <input type="text" id="pc" name="pc"><br></br>

                <label>Password:</label>
                <input type="text" id="pass" name="pass"><br></br>

                <label>Confirm Password:</label>
                <input type="text" id="cpass" name="cpass">

                <input type="submit" id="btn" value="Login" name="submit"/>
            </form>
        </div>
    </body>
</html>
