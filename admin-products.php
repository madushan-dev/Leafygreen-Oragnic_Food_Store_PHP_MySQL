<?php
#Ajax need seperate php to handle the requests cz it returns all php elements including html as the server response

#Starting sessions
session_start();

#Including DB Connection
include_once 'resources/db.php';

#PHP for send data to the DB
    
    $sql = "SELECT * FROM products,users,category where c_id=p_c_id and p_s_id = u_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $num=1;

    while($row = mysqli_fetch_array($result)) {
        echo "<tr>
            <th scope='row'>".$num++."</th>
            <td>".$row["p_name"]."</td>
            <td>".$row["c_name"]."</td>
            <td>".$row["description"]."</td>
            <td>".$row["price"]."</td>
            <td>@mdo</td>
            <td>".$row["name"]."</td>
            <td class='tools'><i class='fa fa-pencil-square-o edit px-2'></i> <i class='fa fa-window-close-o delete px-2'></i></td>
        </tr>";
    }

?> 

