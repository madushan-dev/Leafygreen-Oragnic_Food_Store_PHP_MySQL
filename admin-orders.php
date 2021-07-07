<?php
#Ajax need seperate php to handle the requests cz it returns all php elements including html as the server response

#Starting sessions
session_start();

#Including DB Connection
include_once 'resources/db.php';

#PHP for send data to the DB
    
    $sql = "SELECT * FROM orders,users where u_id=o_u_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $num=1;

    while($row = mysqli_fetch_array($result)) {
        echo "<tr>
            <th scope='row'>".$num++."</th>
            <td>".$row["name"]."</td>
            <td>".$row["total_payment"]."</td>
            <td>".$row["payment_type"]."</td>
            <td>".$row["address"]."</td>
            <td>".$row["date"]."</td>
            <td class='tools'>
            <button id='p".$row["o_id"]."' type='button' class='btn btn-primary bg-warning' data-toggle='modal' data-target='#exampleModalCenter'>
            <i class='fa fa-pencil-square-o edit px-2 text-dark'></i>
            </button>

            <div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLongTitle'>Edit Product Details</h5>
                    <button type='button' class='close btn btn-secondary bg-danger' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    ...
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                    <button type='button' class='btn btn-primary'>Save changes</button>
                </div>
                </div>
            </div>
            </div>
            
            <button id='p".$row["o_id"]."' type='button' class='btn btn-primary bg-danger' data-toggle='modal' data-target='#exampleModalCenter'>
            <i class='fa fa-window-close-o delete px-2 text-light'></i></td>
            </button>

            <div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLongTitle'>Delete product</h5>
                    <button type='button' class='close btn btn-secondary bg-danger' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    Are you sure you want to delete this product?<br>
                    product name : ".$row["p_name"]."
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                    <button type='button' class='btn btn-primary'>Save changes</button>
                </div>
                </div>
            </div>
            </div>
        </tr>
    
        ";
    }

?> 

