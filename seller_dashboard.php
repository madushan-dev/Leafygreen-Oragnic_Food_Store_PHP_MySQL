<?php
#Ajax need seperate php to handle the requests cz it returns all php elements including html as the server response

#Starting sessions
session_start();

#Including DB Connection
include_once 'resources/db.php';

#PHP for send data to the DB

    #order count

    $sql = "SELECT * FROM orders";// WHERE o_u_id = ?";
    $stmt = $conn->prepare($sql);
  //  $stmt->bind_param("s", $uid);
  //  $uid = $_SESSION["userID"];
    $stmt->execute();
    $result = $stmt->get_result();
    $order= mysqli_num_rows($result);

    #product count

    $sql = "SELECT * FROM products";// WHERE p_s_id = ?";
    $stmt = $conn->prepare($sql);
  //  $stmt->bind_param("s", $uid);
 //   $uid = $_SESSION["userID"];
    $stmt->execute();
    $result = $stmt->get_result();
    $product= mysqli_num_rows($result);

    #revenue

    $sql = "SELECT * FROM Orders ";//WHERE o_u_id = ?";
    $stmt = $conn->prepare($sql);
  //  $stmt->bind_param("s", $uid);
 //   $uid = $_SESSION["userID"];
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

    echo $order.",".$product.",".$revenue.",".$profit;
?> 

