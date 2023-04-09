<!-- transport to mainpage in -->
<!-- single page, store form data in  -->
<!DOCTYPE html>
<html>
    <head>
        <title>Log In</title>
        <link rel="stylesheet" type="text/css" href="user_switch.css">
    </head>
    <body>
        <div id="form">
            <h1>User Login Form</h1>
            <form action="" name="log_form" method="post">
                <label>Username: </label>
                <input type="text" id="user" name="user"><br></br>

                <label>Password</label>
                <input type="password" id="pass" name="pass"><br>

                <input type="submit" id="btn" value="Login" name="submit"/>
                <?php
                    // ini_set("display_errors", "1");
                    // ini_set("display_startup_errors", "1");
                    // error_reporting(E_ALL);
                    session_start();
                    $c = new PDO('mysql:host=localhost;dbname=restaurantDB', 'root', '');
                    $message = "";
                    if (isset($_POST['submit']))
                    {
                        $username = $_POST['user'];
                        $password = $_POST['pass'];

                        if(!empty(trim($username)))
                        {
                            if(!empty(trim($password)))
                            {
                                $query = $c->prepare("SELECT COUNT(`email`) FROM `customer` WHERE `email` = '$username' AND `paswrd` = '$password'");
                                $query->execute();
                                $count = $query->fetchColumn();
                                if($count == 1)
                                {
                                    $_SESSION['username'] = $username;
                                    header('location: restaurant_user.php');
                                }
                                else if($count == NULL){
                                    echo $message = "<label>Invalid Account</label>";
                                }
                            }
                            else
                            {
                                echo $_err = "<label>Password field is empty</label>";
                            }
                        }
                        else
                        {
                            echo $_err = "<label>Username field is empty</label>";
                            
                        }
                    }
                ?>
            </form>
        </div>
    </body>
</html>
