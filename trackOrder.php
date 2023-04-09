<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Order Tracker</title>
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
        <a class="active" href="trackOrder.php">View Orders</a>
        <a href="viewSchedule.php">View Schedules</a>
        <div class="menu_bar-right">
            <a href="myAccount.php"><?php echo $_SESSION['fname']; ?>'s Account</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
        <div id="viewOrdersonDate">
            <h1><center>Track All Orders</center></h1>
            <form id="form" action="" name="view_orders_form" method="post"><center>

                <input type="radio" id="all" name="all" value="all">
                <label for="all">View all Orders</label><br>

                <input type="radio" id="byDate" name="byDate" value="byDate">
                <label for="byDate">View Orders by Date</label><br><br><br>
                
                <label>Order Date:</label><br>
                <input type="date" id="orderDate" name="orderDate"><br>

                <input type="submit" id="btn" value="Submit" name="submit"/></center>
            </form>

            <form action="">

        </div>
    </body>
</html>
<?php
    // ini_set("display_errors", "1");
    // ini_set("display_startup_errors", "1");
    // error_reporting(E_ALL);
    $c = new PDO('mysql:host=localhost;dbname=restaurantDB', 'root', '');
    if (isset($_POST['submit']))
    {
        $orderDate = $_POST['orderDate'];
        $fetchDay = "SELECT
                        p.paymentDate AS payment_date,
                        p.paymentTime AS payment_time,
                        p.customerEmail AS email,
                        c.firstName AS fname,
                        c.lastName AS lname,
                        i.name AS item_name,
                        p.orderId AS id,
                        o.total AS total,
                        o.tip AS tip,
                        e.firstInitial AS dp
                     FROM 
                        purchaseHistory AS p,
                        orders AS o ,
                        customer AS c,
                        orderedItems AS i,
                        employee AS e
                     WHERE
                        (o.id = p.orderId) AND (c.email = o.customerEmail) AND (o.id = i.orderId) AND (o.dpID = e.id)
                     AND
                        (p.paymentDate = '$orderDate')";
        $fetchAll = "SELECT
                        p.paymentDate AS payment_date,
                        p.paymentTime AS payment_time,
                        p.customerEmail AS email,
                        p.orderId AS id,
                        o.total AS total,
                        o.tip AS tip,
                        o.dpID AS dpID
                     FROM 
                        purchaseHistory AS p
                     JOIN
                        orders AS o 
                     ON
                       (o.id = p.orderId)";
        if (isset($_POST['all']))
        {
            $query = $c->query($fetchAll);
            $orders = $query->fetchAll(PDO::FETCH_ASSOC);
            if($orders)
            {
                echo "<table id=emp>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Customer Email</th>
                        </tr>";
                foreach ($orders as $order)
                {
                    echo 
                        "<tr>
                            <td>".$order['payment_date']."</td>
                            <td>".$order['payment_time']."</td>
                            <td>".$order['email']."</td>
                        </tr>";
                }
                echo "</table>";
            }
        }
        else
        {
            if (isset($_POST['byDate']))
            {
                if(empty(trim($orderDate)))
                {
                    echo "<script>showError('No Date Selected.');</script>";
                }
                else
                {
                    $query = $c->query($fetchDay);
                    $orders = $query->fetchAll(PDO::FETCH_ASSOC);
                    if($orders)
                    {
                        echo "<table id=emp>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Item Name</th>
                            <th>Total</th>
                            <th>Tip</th>
                            <th>Delivery Person Name</th>
                        </tr>";
                        foreach ($orders as $order)
                        {
                            echo 
                                "<tr>
                                    <td>".$order['fname']."</td>
                                    <td>".$order['lname']."</td>
                                    <td>".$order['item_name']."</td>
                                    <td>".$order['total']."</td>
                                    <td>".$order['tip']."</td>
                                    <td>".$order['dp']."</td><br>
                                </tr>";
                        }
                        echo "</table>";
                    }
                    else
                    {
                        echo "<script>showError('No Orders on this Date.');</script>";
                    }
                }
            }
            else
            {
                echo "<script>showError('No Option Selected.');</script>";
            }
        }
    }
?>

