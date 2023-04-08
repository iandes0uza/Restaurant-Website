<!DOCTYPE html>
<html>
    <head>
        <title>Add Customer</title>
    </head>
    <body>
        <button onclick="window.location.href='mainpage_admin.php';">Back</button>
        <div id="viewOrdersonDate">
            <h1>Add Customer</h1>
            <!--<h2>Please input specified user details</h2>-->
            <form action="" name="view_orders_form" method="post">

                <input type="radio" id="all" name="all">
                <label for="all">View all Orders</label><br>

                <input type="radio" id="byDate" name="byDate">
                <label for="byDate">View Orders by Date</label><br>
                
                <label>Order Date:</label>
                <input type="date" id="orderDate" name="orderDate">

                <input type="submit" id="btn" value="Submit" name="submit"/>
            </form>
        </div>
    </body>
</html>
<?php
    ini_set("display_errors", "1");
    ini_set("display_startup_errors", "1");
    error_reporting(E_ALL);
    session_start();
    $c = new PDO('mysql:host=localhost;dbname=restaurantDB', 'root', '');
    if (isset($_POST['submit']))
    {
        $viewAll = $_POST['all'];
        $viewByDate = $_POST['byDate'];
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
        if (isset($viewAll))
        {
            $query = $c->query($fetchAll);
            $orders = $query->fetchAll(PDO::FETCH_ASSOC);
            if($orders)
            {
                foreach ($orders as $order)
                {
                    echo 
                        "<tr>
                            <td>".$order['payment_date']."</td>
                            <td>".$order['payment_time']."</td>
                            <td>".$order['email']."</td>
                            <td>".$order['id']."</td>
                            <td>".$order['total']."</td>
                            <td>".$order['tip']."</td>
                            <td>".$order['dpID']."</td><br>
                        </tr>";
                }
            }
        }
        else
        {
            if (isset($viewByDate))
            {
                if(empty(trim($orderDate)))
                {
                    echo "No date selected";
                }
                else
                {
                    $query = $c->query($fetchDay);
                    $orders = $query->fetchAll(PDO::FETCH_ASSOC);
                    if($orders)
                    {
                        foreach ($orders as $order)
                        {
                            echo 
                                "<tr>
                                    <td>".$order['payment_date']."</td>
                                    <td>".$order['payment_time']."</td>
                                    <td>".$order['email']."</td>
                                    <td>".$order['id']."</td>
                                    <td>".$order['fname']."</td>
                                    <td>".$order['lname']."</td>
                                    <td>".$order['item_name']."</td>
                                    <td>".$order['id']."</td>
                                    <td>".$order['total']."</td>
                                    <td>".$order['tip']."</td>
                                    <td>".$order['dp']."</td><br>
                                </tr>";
                        }
                    }
                }
            }
            else
            {
                echo "No Option Selected";
            }
        }
    }

?>
