<!-- Including Header -->
<?php include_once 'resources/header.php'; ?>
<!---------------------->
<section class="bottom-header ">
    <div class="user-bar d-flex justify-content-between align-items-center">
        <h2 class="dashboard-username">Welcome Seller!</h2>
        <a href="#" class="btn btn-danger" role="button">Logout</a>
    </div>
</section>

<section class="mt-5 dashboard">
    <div class="row">
        <div class="col-3">
            <div class="dashboard-menu">

                <div class="list-group">
                    <div class="list-group">

                        <a href="seller.php"><button type="button" class="list-group-item list-group-item-action ">Dashboard</button></a>
                        <a href="seller-products.php"><button type="button" class="list-group-item list-group-item-action menu-active ">Products</button></a>
                        <a href="seller-orders.php"> <button type="button" class="list-group-item list-group-item-action ">Orders</button></a>
                        <a href="seller-purchased.php"> <button type="button" class="list-group-item list-group-item-action">My Purchased</button></a>
                        <a href="seller-edit.php"> <button type="button" class="list-group-item list-group-item-action">Edit Profile</button></a>
                        <a href="seller_addProduct.php"> <button type="button" class="list-group-item list-group-item-action menu">Add Product</button></a>


                    </div>


                </div>


            </div>


        </div>

        <script>
            window.addEventListener("load", function() {
                $.ajax({
                    type: "GET", 
                    url: './seller_productdata.php',
                    success: function(response) {
                        $('#products').html(response);
                    }
                });
            });
        </script>


        <div class="col-9 dashboard-orders dashboard-table">

            <table class="table table-hover order-table ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">price</th>
                        <th scope="col">image</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody id="products">
             
                </tbody>
            </table>

        </div>

    </div>



</section>




<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->