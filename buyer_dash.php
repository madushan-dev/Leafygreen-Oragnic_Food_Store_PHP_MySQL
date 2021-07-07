<?php
#Ajax need seperate php to handle the requests cz it returns all php elements including html as the server response

#Starting sessions
session_start();

#Including DB Connection
include_once 'resources/db.php';

#PHP for send data to the DB
    
  
    $sql = "SELECT * FROM users where type != 'admin'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $users= mysqli_num_rows($result);

 
    $sql = "SELECT * FROM store";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $store= mysqli_num_rows($result);
    
    
    $sql = "SELECT * FROM orders";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $order= mysqli_num_rows($result);

    $sql = "SELECT * FROM products";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $product= mysqli_num_rows($result);


    $sql = "SELECT * FROM inquiry";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $inc= mysqli_num_rows($result);

    
    $sql = "SELECT * FROM orders";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    
    
    echo $users.",".$store.",".$order.",".$product.",".$inc.",".$revenue.",".$profit;
?> 

