<?php
#Ajax need seperate php to handle the requests cz it returns all php elements including html as the server response

#Starting sessions
session_start();

#Including DB Connection
include_once 'resources/db.php';

#PHP for send data to the DB
    
    $id = $_POST["id"];
    $pn = $_POST["pn"];
    $name = $_POST["name"];
    $desc = $_POST["desc"];

    if($pn != NULL || $name != NULL || $desc != NULL){
        if(is_numeric($pn) && strlen($pn)==10){
            $sql = "Select * FROM store where s_id='".$id."'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            if(mysqli_num_rows($result)== 1){
                $sql = "UPDATE store SET  s_phone_number = ".$pn.", s_name ='".$name."', s_description= '".$desc."' WHERE s_id = ".$id."";
                    $stmt = $conn->prepare($sql);
                    if ($stmt->execute() === TRUE) {
                       echo "record updated";
                    }else{
                        echo "error";
                    }
            }else{
                echo "store not found";
            }
        }else{
            echo "invalid Phone number";
        }
    }else{
        echo "fields are empty";
    }
?> 

