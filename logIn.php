<!-- transport to mainpage in -->
<!-- single page, store form data in  -->
<?php
    session_start();
    $c = new PDO('mysql:host=localhost;dbname=restaurantdb', 'root', '');
    $message = "";
    if (isset($_POST['submit']))
    {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        if(empty(trim($username)))
        {
            echo $_err = "<label>Username field is empty</label>";
        }
        else
        {
            if(empty(trim($password)))
            {
                echo $_err = "<label>Password field is empty</label>";
            }
        }

        $query = $c->prepare("SELECT COUNT(`email`) FROM `customer` WHERE `email` = '$username' AND `paswrd` = '$password'");
        $query->execute();
        $count = $query->fetchColumn();

        if($count == 1)
        {
            $_SESSION['username'] = $username;

            header('location: new.php');
        }
        else if($count == NULL){
            echo $message = "<label>Invalid Account</label>";
        }
    }
    include 'restaurantDB.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Log In</title>
    </head>
    <body>
        <div id="form">
            <h1>Login Form</h1>
            <form action="" name="log_form" method="post">
                <label>Username: </label>
                <input type="text" id="user" name="user"><br></br>

                <label>Password</label>
                <input type="password" id="pass" name="pass">

                <input type="submit" id="btn" value="Login" name="submit"/>
            </form>
        </div>
    </body>
</html>
