<?php
ini_set("display_errors", "1");
    ini_set("display_startup_errors", "1");
    error_reporting(E_ALL);
    $c = new PDO('mysql:host=localhost;dbname=restaurantDB', 'root', '');
    $fetchEmpName = "SELECT id, firstInitial 
                     FROM employee";
    $query = $c->query($fetchEmpName);
    $employeeNames = $query->fetchAll(PDO::FETCH_ASSOC);
?>