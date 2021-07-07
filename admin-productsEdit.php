<?php
#Ajax need seperate php to handle the requests cz it returns all php elements including html as the server response

#Starting sessions
session_start();

#Including DB Connection
include_once 'resources/db.php';

#PHP for send data to the DB
    
    $id = $_POST["id"];
    $pname = $_POST["pname"];
    $des = $_POST["desc"];
    $cat  = $_POST["cat"];
    $price = $_POST["price"];

    if($pname != NULL || $des != NULL || $price != NULL){
        if(is_numeric($price)){
            $sql = "Select * FROM products where p_id='".$id."'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            if(mysqli_num_rows($result)== 1){
                $sql = "UPDATE products SET  p_name = '".$pname."', description = '".$des."', price =".$price.", p_c_id= ".$cat." WHERE p_id = ".$id."";
                    $stmt = $conn->prepare($sql);
                    if ($stmt->execute() === TRUE) {
                       echo "record updated";
                    }else{
                        echo "error";
                    }
            }else{
                echo "Product not found";
            }
        }else{
            echo "invalid price";
        }
    }else{
        echo "fields are empty";
    }
?> 

