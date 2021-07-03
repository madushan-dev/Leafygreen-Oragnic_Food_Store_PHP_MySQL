<?php
#Ajax need seperate php to handle the requests cz it returns all php elements including html as the server response

#Starting sessions
session_start();

#Including DB Connection
include_once 'resources/db.php';

#PHP for send data to the DB
    
    #user count
    $sql = "SELECT * FROM users where type != 'admin'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $users= mysqli_num_rows($result);

    #store count
    $sql = "SELECT * FROM store";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $store= mysqli_num_rows($result);
    
    #order count
    $sql = "SELECT * FROM orders";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $order= mysqli_num_rows($result);

    #product count
    $sql = "SELECT * FROM products";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $product= mysqli_num_rows($result);

    #inquery count
    $sql = "SELECT * FROM inquiry";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $inc= mysqli_num_rows($result);

    #revenue
    $sql = "SELECT * FROM orders";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $revenue = 0;
    $profit = 0;

    if(mysqli_num_rows($result)>1){
        while($row = mysqli_fetch_array($result)) {
            $revenue += $row['total_payment'];
        }

        #profit
        $profit = $revenue * 20 / 100 ;
    }

    echo $users.",".$store.",".$order.",".$product.",".$inc.",".$revenue.",".$profit;
?> 

