<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Customer</title>
  <link href="mainpage_style.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="user_switch.css">
        <link rel="stylesheet" type="text/css" href="table_view.css">
        <script>
      function showError(message) {
        alert(message);
      }
    </script>
    </head>
    <body>
    <div class="menu_bar">
        <a href="restaurant_admin.php">Home</a>
        <a href="addCustomer.php">Add Customer</a>
        <a href="trackOrder.php">View Orders</a>
        <a class="active" href="viewSchedule.php">View Schedules</a>
        <div class="menu_bar-right">
            <a href="myAccount.php"><?php echo $_SESSION['fname']; ?>'s Account</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
        <div id="viewSched">
            <h1><center>View Employee Schedule</center></h1>
            <form id="form" action="" method="post"><center>
            <label><b>Select Employee Name:<b></label><br>
                <select id="selEmp" name="selEmp" size="5">
                    <?php
                        $c = new PDO('mysql:host=localhost;dbname=restaurantDB', 'root', '');
                        $fetchEmpName = "SELECT id, firstInitial, lastInitial
                                            FROM employee";
                        $query = $c->query($fetchEmpName);
                        $employeeNames = $query->fetchAll(PDO::FETCH_ASSOC);
                        if($employeeNames)
                        {
                            foreach ($employeeNames as $emp)
                            {
                                echo "<option id=".$emp['id']." value=".$emp['id'].">".$emp['firstInitial']." ".$emp['lastInitial']."</option>";
                            }
                        }
                    ?>
                </select><br>
                <input type="submit" value="Search" name="submit"/></center>
            </form>
        </div>
    </body>
</html>
<?php
    ini_set("display_errors", "0"); //This was left on due some unfixable (i think) issue
    // ini_set("display_startup_errors", "1");
    // error_reporting(E_ALL);
    $c = new PDO('mysql:host=localhost;dbname=restaurantDB', 'root', '');
    if(isset($_POST['submit']))
    {
        if($_POST['selEmp'])
        {
            $employee = $_POST['selEmp'];
            $fetchSchedule = "SELECT s.workDay, s.startTime, s.endTime
                              FROM schedule as s, employee AS e
                              WHERE (s.id = e.id) AND (e.id = '$employee')
                              AND DAYOFWEEK(s.workDay) BETWEEN 2 AND 6";
            $query = $c->query($fetchSchedule);
            $schedule = $query->fetchAll(PDO::FETCH_ASSOC);
            if ($schedule)
            {
                echo "<table id=emp>
                        <tr>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                        </tr>";
                foreach ($schedule as $s)
                {
                    echo 
                        "<tr>
                            <td>".$s['workDay']."</td>
                            <td>".$s['startTime']."</td>
                            <td>".$s['endTime']."</td><br>
                        </tr>";
                }
                echo "</table>";
            }
            else
            {
                echo "<script>showError('Not working on a weekday.');</script>";
            }
        }
        else
        {
            echo "<script>showError('Please Select a Valid Option.');</script>";
        }
    }
?>