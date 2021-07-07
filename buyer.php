<!-- Starting sessions -->
<?php session_start(); ?>
<!-- Including Header -->
<?php include_once 'resources/header.php'; ?>
<!---------------------->
<section class="bottom-header ">
    <div class="user-bar d-flex justify-content-between align-items-center">
        <h2 class="dashboard-username">Welcome Customer!</h2>
        <a href="#" class="btn btn-danger" role="button">Logout</a>
    </div>
</section>

<section class="mt-5 dashboard">
    <div class="row">
        <div class="col-3">
            <div class="dashboard-menu">

                <div class="list-group">

                    <a href="buyer.php"><button type="button" class="list-group-item list-group-item-action menu-active">Dashboard</button></a>
                   
                    <a href="buyer-purchased.php"><button type="button" class="list-group-item list-group-item-action ">Orders</button></a>
                    
                    <a href="buyer-edit.php"><button type="button" class="list-group-item list-group-item-action">Edit Profile</button></a>


                </div>


            </div>


        </div>
        <script>
            window.addEventListener("load", function() {
                $.ajax({
                    type: "GET", 
                    url: './buyer_dash.php',
                    success: function(response) {
                        var data = response.split(",");
                        
                        $('#order').html(data[2]);
                        
                    }
                });
            });
        </script>
        <div class="col-9 dashboard-overview d-flex justify-content-center align-items-center pt-5">
           
            <div style="background-color: #8e44ad;">
                <h2>Orders</h2>
                <h3 id="order"></h3>
            </div>
            


        </div>

    </div>



</section>




<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->