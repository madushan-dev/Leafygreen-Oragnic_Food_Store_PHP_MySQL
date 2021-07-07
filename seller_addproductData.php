<?php
#Ajax need seperate php to handle the requests cz it returns all php elements including html as the server response

#Starting sessions
session_start();

#Including DB Connection
include_once 'resources/db.php';

#PHP for send data to the DB
    


            $sql ="INSERT INTO products(p_Name,description,price,quantity) VALUES('$name','$desc','$price','$qty')";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss",$name, $desc,$price,$qty);
            $name = $_POST["name"];
            $desc = $_POST["desc"];
            $price = $_POST["price"];
            $qty = $_POST["qty"];
            $stmt->execute();
             $result = $stmt->get_result();
            
            
?> 

 
