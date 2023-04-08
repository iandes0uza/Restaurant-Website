<!DOCTYPE html>
<html>
    <head>
        <title>Add Customer</title>
    </head>
    <body>
        <button onclick="window.location.href='mainpage_admin.php';">Back</button>
        <div id="viewSched">
            <h1>View Employee Schedule</h1>
            <!--<h2>Please input specified user details</h2>-->
            <label>Select Employee Name:</label>
            <select>
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
                            echo "<option id=".$emp['id']." value=".$emp['firstInitial'].">".$emp['firstInitial']." ".$emp['lastInitial']."</option>";
                        }
                    }
                ?>
            </select>
        </div>
    </body>
</html>
