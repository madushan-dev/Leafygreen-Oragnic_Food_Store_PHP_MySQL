<?php
#Ajax need seperate php to handle the requests cz it returns all php elements including html as the server response

#Starting sessions
session_start();

#Including DB Connection
include_once 'resources/db.php';

#PHP for send data to the DB
    $uid = $_SESSION["userID"];
    $sql = "SELECT * FROM products,category where  p_s_id = $uid AND p_c_id = c_id";
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
            <td class='tools'>
            <button id='p".$row["p_id"]."' type='button' class='btn btn-primary bg-warning' data-toggle='modal' data-target='#exampleModalCenter".$row["p_id"]."'>
            <i class='fa fa-pencil-square-o edit px-2 text-dark'></i>
            </button>

            <div class='modal fade' id='exampleModalCenter".$row["p_id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLongTitle'>Edit Product Details</h5>
                    <button type='button' class='close btn btn-secondary bg-danger' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    
                        Product Name&emsp;<input type='text' id='pn".$row["p_id"]."' placeholder='".$row["p_name"]."'><br><br>
                        Description&emsp;<input type='text' id='des".$row["p_id"]."' placeholder='".$row["description"]."'><br><br>
                        Category&emsp;<select name='cat' id='cat".$row["p_id"]."'>
                            <option value='1'>Organic Spices</option>
                            <option value='2'>Organic Vegetables</option>
                            <option value='3'>Organic Fruits</option>
                            <option value='4'>Dairy Products</option>
                            <option value='5'>Beverages</option>
                            <option value='6'>Ready Made Meals</option>
                        </select><br><br>
                        Price&emsp;<input type='text' id='pr".$row["p_id"]."' placeholder='".$row["price"]."'><br><br>
                        <p id='result'></p>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                    <button type='button' class='btn btn-primary'  onclick='UpdateDetails".$row["p_id"]."()'>Save changes</button>
                    <script>
                        function UpdateDetails".$row["p_id"]."() {
                            var val1 = $('#pn".$row["p_id"]."').val();
                            var val2 = $('#des".$row["p_id"]."').val();
                            var val3 = $('#cat".$row["p_id"]."').val();
                            var val4 = $('#pr".$row["p_id"]."').val();
                            var val5 = ".$row["p_id"].";
                            $.ajax({
                                type: 'POST',
                                url: './admin-productsEdit.php',
                                data: { pname: val1, desc: val2, cat: val3, price: val4, id: val5 },
                                success: function(response) {
                                    alert(response);
                                    window.location.href = './seller-products.php';
                                }
                            });
                        }

                    </script>
                    
                </div>
                </div>
            </div>
            </div>
            
            <button id='c".$row["p_id"]."' type='button' class='btn btn-primary bg-danger' value='".$row["p_id"]."''>
            <i class='fa fa-window-close-o delete px-2 text-light'></i></td>
            </button>
            <script>
            $(document).ready(function(){
              $('#c".$row["p_id"]."').click(function(){
                if(confirm('Are you sure you want to delete product : ".$row["p_name"]."')){
                    var val = $('#c".$row["p_id"]."').val();
                    $.ajax({
                        type: 'GET',
                        url: './admin-productsDelete.php',
                        data: { id: val },
                        success: function(response) {
                            alert('product removed');
                            window.location.href = './seller-products.php';

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

