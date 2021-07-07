<?php
#Ajax need seperate php to handle the requests cz it returns all php elements including html as the server response

#Starting sessions
session_start();

#Including DB Connection
include_once 'resources/db.php';

#PHP for send data to the DB
    
    $id = $_POST["id"];
    $tp = $_POST["tp"];
    $pt  = $_POST["pt"];
    $add = $_POST["add"];

    if($tp != NULL || $add != NULL){
        if(is_numeric($tp)){
            $sql = "Select * FROM orders where o_id='".$id."'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            if(mysqli_num_rows($result)== 1){
                $sql = "UPDATE orders SET  total_payment = ".$tp.", payment_type ='".$pt."', address= '".$add."' WHERE o_id = ".$id."";
                    $stmt = $conn->prepare($sql);
                    if ($stmt->execute() === TRUE) {
                       echo "record updated";
                    }else{
                        echo "error";
                    }
            }else{
                echo "Order not found";
            }
        }else{
            echo "invalid price";
        }
    }else{
        echo "fields are empty";
    }
?> 

