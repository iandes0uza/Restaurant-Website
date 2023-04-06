<?php
    //Connecting to Database
    try 
    {
        $connection = new PDO('mysql:host=localhost;dbname=restaurantDB', "root");
    } catch (PDOException $e) 
    {
        print "Error!: ". $e->getMessage(). "<br/>";
        die();
    }
?>