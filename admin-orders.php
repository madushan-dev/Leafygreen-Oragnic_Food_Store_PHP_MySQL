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
            <button id='p".$row["o_id"]."' type='button' class='btn btn-primary bg-warning' data-toggle='modal' data-target='#exampleModalCenter".$row["o_id"]."'>
            <i class='fa fa-pencil-square-o edit px-2 text-dark'></i>
            </button>

            <div class='modal fade' id='exampleModalCenter".$row["o_id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLongTitle'>Edit Order Details</h5>
                    <button type='button' class='close btn btn-secondary bg-danger' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                        Total Payment&emsp;<input type='text' id='des".$row["o_id"]."' placeholder='".$row["total_payment"]."'><br><br>
                        Payment Type&emsp;<select name='cat' id='cat".$row["o_id"]."'>
                            <option value='credit'>Credit</option>
                            <option value='cash'>Cash</option>
                        </select><br><br>
                        Address&emsp;<input type='text' id='pr".$row["o_id"]."' placeholder='".$row["address"]."'><br><br>
                        <p id='result'></p>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                    <button type='button' class='btn btn-primary'  onclick='UpdateDetails".$row["o_id"]."()'>Save changes</button>
                    <script>
                        function UpdateDetails".$row["o_id"]."() {
                            var val2 = $('#des".$row["o_id"]."').val();
                            var val3 = $('#cat".$row["o_id"]."').val();
                            var val4 = $('#pr".$row["o_id"]."').val();
                            var val5 = ".$row["o_id"].";
                            $.ajax({
                                type: 'POST',
                                url: './admin-ordersEdit.php',
                                data: { tp: val2, pt: val3, add: val4, id: val5 },
                                success: function(response) {
                                    alert(response);
                                    window.location.href = './orders.php';
                                }
                            });
                        }

                    </script>
                    
                </div>
                </div>
            </div>
            </div>
            
            <button id='c".$row["o_id"]."' type='button' class='btn btn-primary bg-danger' value='".$row["o_id"]."''>
            <i class='fa fa-window-close-o delete px-2 text-light'></i></td>
            </button>
            <script>
            $(document).ready(function(){
              $('#c".$row["o_id"]."').click(function(){
                if(confirm('Are you sure you want to delete order placed by : ".$row["name"]."')){
                    var val = $('#c".$row["o_id"]."').val();
                    $.ajax({
                        type: 'GET',
                        url: './admin-ordersDelete.php',
                        data: { id: val },
                        success: function(response) {
                            alert('order removed');
                            window.location.href = './orders.php';

                        }
                    });
                }
              });
            });
            </script>
            </div>
        </tr>
    
        ";
    }

?> 

