<!-- transport to mainpage in -->
<!-- single page, store form data in  -->
<!DOCTYPE html>
<html>
    <head>
        <title>Log In</title>
        <link rel="stylesheet" type="text/css" href="user_switch.css">
        <script>
    </script>
    </head>
    <body>
        <div id="form" class="user_switch">
            <h1>Admin Login Form</h1>
            <form action="" name="log_form" method="post">
                <label>Username: </label>
                <input type="text" id="user" name="user"><br></br>

                <label>Password:</label>
                <input type="password" id="pass" name="pass"><br>

                <input type="submit" id="btn" value="Login" name="submit"/>
                <?php
                    // ini_set("display_errors", "1");
                    // ini_set("display_startup_errors", "1");
                    // error_reporting(E_ALL);
                    session_start();
                    $c = new PDO('mysql:host=localhost;dbname=restaurantDB', 'root', '');
                    if (isset($_POST['submit']))
                    {
                        $username = $_POST['user'];
                        $password = $_POST['pass'];
                        $managementAccount = "SELECT e.firstInitial, e.lastInitial, m.email, m.paswrd FROM managementRole AS m, employee AS e WHERE (e.id = m.id) AND (m.email = '$username')";

                        if(!empty(trim($username)))
                        {
                            if(!empty(trim($password)))
                            {
                                $query = $c->prepare("SELECT COUNT(`email`) FROM `managementRole` WHERE `email` = '$username' AND `paswrd` = '$password'");
                                $query->execute();
                                $count = $query->fetchColumn();

                                if($count == 1)
                                {
                                    $query = $c->query($managementAccount);
                                    $info = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($info as $i)
                                    {
                                        $_SESSION['email'] = $i['email'];
                                        $_SESSION['fname'] = $i['firstInitial'];
                                        $_SESSION['lname'] = $i['lastInitial'];
                                    }

                                    header('location: restaurant_admin.php');
                                }
                                else if($count != 1){
                                    echo "<label>Invalid Account</label>";
                                }
                            }
                            else
                            {
                                echo $_err = "<error>Password field is empty</error>";
                            }
                        }
                        else
                        {
                            echo $_err = "<error>Username field is empty</error>";
                        }
                    }
                ?>
            </form>
        </div>
    </body>
</html>
