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


                    <a href="seller.php"><button type="button" class="list-group-item list-group-item-action ">Dashboard</button></a>
                    <a href="seller-products.php"><button type="button" class="list-group-item list-group-item-action ">Products</button></a>
                    <a href="seller-orders.php"> <button type="button" class="list-group-item list-group-item-action ">Orders</button></a>
                    <a href="seller-purchased.php"> <button type="button" class="list-group-item list-group-item-action">My Purchased</button></a>
                    <a href="seller-edit.php"> <button type="button" class="list-group-item list-group-item-action menu">Edit Profile</button></a>
                    <a href="seller_addProduct.php"> <button type="button" class="list-group-item list-group-item-action menu-active">Add Product</button></a>

                </div>


            </div>


        </div>
        <div class="col-9 dashboard-orders dashboard-profile-edit">

            <form name="add">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter Product Name">

                </div>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <input type="text" class="form-control" id="desc" aria-describedby="name" placeholder="Enter Discription">

                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" aria-describedby="name" placeholder="Enter Price">

                </div>

                <div class="form-group">
                    <label for="qty">Quantity</label>
                    <input type="text" class="form-control" id="qty" placeholder="Enter Quantity">
                </div>

                <div class="form-group">
                    <label for="qty">Category</label>
                    <select name="category" id="category" class="form-select form-control p-3 py-3">
                    <?php
                    
                    $category_query = "SELECT * FROM category";
                    $category_result = mysqli_query($conn, $category_query);;
                    while ($row = mysqli_fetch_assoc($category_result)) {
                    ?>

                        <option style="font-size:16px;" value="<?php echo ($row['c_id']) ?>"><?php echo ($row['c_name']) ?></option>

                    <?php } ?>
                    ?>
                    
                    
                    </select>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-primary" onclick="UpdateDetails()">Submit</button>
                </div>
                <p class="cart-msg"></p>

            </form>
<div id="result"></div>
            <script>
            function UpdateDetails() {
                var val1 = $('#name').val();
                var val2 = $('#desc').val();
                var val3 = $('#price').val();
                var val4 = $('#qty').val();
                var val5=  $('#category').val();
                $.ajax({
                    type: 'POST',
                    url: 'handle-add-product.php',
                    data: { name: val1, desc: val2, price: val3, qty: val4,cat:val5 },
                    success: function(response) {
                        $('.cart-msg').html(response);
                    }
                });
            
            }

            </script>

        </div>

    </div>



</section>




<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->