<!-- Starting sessions -->
<?php session_start(); ?>
<!-- Including Header -->
<?php include_once 'resources/header.php'; ?>
<!---------------------->
<section class="bottom-header ">
    <div class="user-bar d-flex justify-content-between align-items-center">
        <h2 class="dashboard-username">Welcome Admin!</h2>
        <a href="#" class="btn btn-danger" role="button">Logout</a>
    </div>
</section>

<section class="mt-5 dashboard">
    <div class="row">
        <div class="col-3">
            <div class="dashboard-menu">

                <div class="list-group">

                    <a href="admin.php"><button type="button" class="list-group-item list-group-item-action menu-active">Dashboard</button></a>
                    <a href="products.php"><button type="button" class="list-group-item list-group-item-action ">Products</button></a>
                    <a href="orders.php"><button type="button" class="list-group-item list-group-item-action ">Orders</button></a>
                    <a href="users.php"><button type="button" class="list-group-item list-group-item-action">Users</button></a>
                    <a href="stores.php"><button type="button" class="list-group-item list-group-item-action">Stores</button></a>
                    <a href="inquires.php"><button type="button" class="list-group-item list-group-item-action">Inquires</button></a>
                    <a href="edit-profile.php"><button type="button" class="list-group-item list-group-item-action">Edit Profile</button></a>


                </div>


            </div>


        </div>
        <script>
            window.addEventListener("load", function() {
                $.ajax({
                    type: "GET", 
                    url: './admin-dashboard.php',
                    success: function(response) {
                        var data = response.split(",");
                        $('#user').html(data[0]);
                        $('#store').html(data[1]);
                        $('#order').html(data[2]);
                        $('#product').html(data[3]);
                        $('#inc').html(data[4]);
                        $('#revenue').html("Rs. "+data[5]);
                        $('#profit').html("Rs. "+data[6]);
                    }
                });
            });
        </script>
        <div class="col-9 dashboard-overview d-flex justify-content-center align-items-center pt-5">
            <div style="background-color: #3498db;">
                <h2>Revenue</h2>
                <h3 id="revenue"></h3>

            </div>
            <div style="background-color: #e67e22;">
                <h2>Profit</h2>
                <h3 id="profit"></h3>
            </div>
            <div style="background-color: #2c3e50;">
                <h2>Products</h2>
                <h3 id="product"></h3>
            </div>
            <div style="background-color: #8e44ad;">
                <h2>Orders</h2>
                <h3 id="order"></h3>
            </div>
            <div style="background-color: #f1c40f;">
                <h2>Stores</h2>
                <h3 id="store"></h3>
            </div>
            <div style="background-color: #c0392b;">
                <h2>Users</h2>
                <h3 id="user"></h3>
            </div>

            <div style="background-color: #1abc9c;">
                <h2>Inquires</h2>
                <h3 id="inc"></h3>
            </div>


        </div>

    </div>



</section>




<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->