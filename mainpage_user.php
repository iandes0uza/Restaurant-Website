<!-- should have logout, menu, create order, order history, track my orders, update account details -->
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Simple HTML HomePage</title>
</head>
<body>
  <header class="header">
    <nav class="nav-items">
      <a href="#"><?php echo $_SESSION['username']; ?>'s Account</a>
      <a href="#">Menu</a>
      <a href="#">Order</a>
      <a href="#">Track My Order</a>
      <a href="#">Track My Order</a>
      <a href="#">Log Out</a>
    </nav>
</body>

</html>