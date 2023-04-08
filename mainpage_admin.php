<!-- should have logout, menu, create order, order history, track my orders, update account details -->
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Homepage</title>
</head>
<body>
  <header class="header">
    <nav class="nav-items">
      <a href="#"><?php echo $_SESSION['username']; ?>'s Account</a>
      <a href="#">Add to Menu</a> <!-- addToMenu.php -->
      <a href="addCustomer.php">Add Customer</a><!-- addCustomer.php -->
      <a href="#">Add Admin</a><!-- addEmployee.php -->
      <a href="#">Remove from Menu</a><!-- removeFromMenu.php -->
      <a href="#">Change store details</a><!-- changeStoreDetails.php -->
      <a href="trackOrder.php">View Orders</a><!-- viewOrders.php -->
      <a href="viewSchedule.php">View Employee Schedule</a><!-- viewSchedule.php -->
      <a href="#">Log Out</a><!-- logOut.php -->
    </nav>
</body>

</html>