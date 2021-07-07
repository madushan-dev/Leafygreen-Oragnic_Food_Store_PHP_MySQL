<?php
#Ajax need seperate php to handle the requests cz it returns all php elements including html as the server response

#Starting sessions
session_start();

#Including DB Connection
include_once 'resources/db.php';

#PHP for send data to the DB
    
    $sql = "SELECT * FROM users where type!='admin'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $num=1;

    while($row = mysqli_fetch_array($result)) {
        echo "<tr>
            <th scope='row'>".$num++."</th>
            <td>".$row["name"]."</td>
            <td>".$row["email"]."</td>
            <td>".$row["phone_number"]."</td>
            <td>".$row["type"]."</td>
            <td class='tools'>
            <button id='p".$row["u_id"]."' type='button' class='btn btn-primary bg-warning' data-toggle='modal' data-target='#exampleModalCenter".$row["u_id"]."'>
            <i class='fa fa-pencil-square-o edit px-2 text-dark'></i>
            </button>

            <div class='modal fade' id='exampleModalCenter".$row["u_id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLongTitle'>Edit User Details</h5>
                    <button type='button' class='close btn btn-secondary bg-danger' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                        Name&emsp;<input type='text' id='des".$row["u_id"]."' placeholder='".$row["name"]."'><br><br>
                        Type&emsp;<select name='cat' id='cat".$row["u_id"]."'>
                            <option value='Seller'>Seller</option>
                            <option value='Customer'>Customer</option>
                        </select><br><br>
                        Email&emsp;<input type='text' id='pr".$row["u_id"]."' placeholder='".$row["email"]."'><br><br>
                        Phone Number&emsp;<input type='text' id='ph".$row["u_id"]."' placeholder='".$row["phone_number"]."'><br><br>
                        <p id='result'></p>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                    <button type='button' class='btn btn-primary'  onclick='UpdateDetails".$row["u_id"]."()'>Save changes</button>
                    <script>
                        function UpdateDetails".$row["u_id"]."() {
                            var val1 = $('#ph".$row["u_id"]."').val();
                            var val2 = $('#des".$row["u_id"]."').val();
                            var val3 = $('#cat".$row["u_id"]."').val();
                            var val4 = $('#pr".$row["u_id"]."').val();
                            var val5 = ".$row["u_id"].";
                            $.ajax({
                                type: 'POST',
                                url: './admin-usersEdit.php',
                                data: { pn: val1, name: val2, type: val3, email: val4, id: val5 },
                                success: function(response) {
                                    alert(response);
                                    window.location.href = './users.php';
                                }
                            });
                        }

                    </script>
                    
                </div>
                </div>
            </div>
            </div>
            </div>
        </tr>
    
        ";
    }

?> 

