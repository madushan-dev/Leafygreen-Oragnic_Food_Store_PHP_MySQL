<?php
#Ajax need seperate php to handle the requests cz it returns all php elements including html as the server response

#Starting sessions
session_start();

#Including DB Connection
include_once 'resources/db.php';

#PHP for send data to the DB

    $order = 0;
    $product = 0;
    $revenue = 0;

    #order count
    $sql = "SELECT * FROM orders WHERE o_u_id = '".$_SESSION["userID"]."'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $order= mysqli_num_rows($result);

    $sql = "SELECT * FROM products WHERE p_s_id = '".$_SESSION["userID"]."'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $product= mysqli_num_rows($result);

    $sql = "SELECT * FROM orders WHERE o_u_id = '".$_SESSION["userID"]."'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result)>1){
        while($row = mysqli_fetch_array($result)) {
            $revenue += $row['total_payment'];
        }
    }
    $sql = "SELECT * FROM orders WHERE o_u_id = '".$_SESSION["userID"]."'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $perch= mysqli_num_rows($result);

    echo $order.",".$product.",".$revenue.",".$perch;
?> 

