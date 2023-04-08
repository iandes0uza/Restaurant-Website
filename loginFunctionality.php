<!-- transport to mainpage in -->
<!DOCTYPE html>
<html>
    <?php
        
        $pdo = NULL;
        include 'restaurantDB.php';
        if(isset($_POST['submit']))
        {
            $username = $_POST['user'];
            $password = $_POST['pass'];
            echo $username;
            echo $password;

            $query = 'SELECT COUNT(*) FROM customer WHERE email ="' . $username . '"and paswrd ="' . $password . '"'; 
            $result = $pdo->query($query);
            echo $result;
            // if($query == 1)
            // {
            //     echo "logged in";
            // }
            // else
            // {
            //     echo "poo muncher";
            // }


        }
    
    ?>

    <?php
        $pdo = NULL;
    ?>
</html>