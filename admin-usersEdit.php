<?php
#Ajax need seperate php to handle the requests cz it returns all php elements including html as the server response

#Starting sessions
session_start();

#Including DB Connection
include_once 'resources/db.php';

#PHP for send data to the DB

#edited

    $id = $_POST["id"];
    $pn = $_POST["pn"];
    $name = $_POST["name"];
    $type = $_POST["type"];
    $email = $_POST["email"];

    if($pn != NULL || $name != NULL || $email != NULL){
        if(is_numeric($pn) && strlen($pn)==10){
            $sql = "Select * FROM users where u_id='".$id."'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            if(mysqli_num_rows($result)== 1){
                $sql = "UPDATE users SET  phone_number = ".$pn.", name ='".$name."', type= '".$type."', email= '".$email."' WHERE u_id = ".$id."";
                    $stmt = $conn->prepare($sql);
                    if ($stmt->execute() === TRUE) {
                       echo "record updated";
                    }else{
                        echo "error";
                    }
            }else{
                echo "user not found";
            }
        }else{
            echo "invalid Phone number";
        }
    }else{
        echo "fields are empty";
    }
?> 

