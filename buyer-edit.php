<!-- Including Header -->
<?php include_once 'resources/header.php'; ?>
<!---------------------->
<section class="bottom-header ">
    <div class="user-bar d-flex justify-content-between align-items-center">
        <h2 class="dashboard-username">Welcome Customer!</h2>
        <form action="./logout.php" method="post">
            <button type="submit" class="btn btn-danger"> Logout</button>
        </form>
    </div>
</section>

<section class="mt-5 dashboard">
    <div class="row">
        <div class="col-3">
            <div class="dashboard-menu">

                <div class="list-group">

                    <a href="buyer_dash.php"><button type="button" class="list-group-item list-group-item-action ">Dashboard</button></a>
                    
                    <a href="buyer-purchased.php"><button type="button" class="list-group-item list-group-item-action">Orders</button></a>
                    
                    <a href="buyer-edit.php"><button type="button" class="list-group-item list-group-item-action menu-active">Edit Profile</button></a>


                </div>


            </div>


        </div>
        <div class="col-9 dashboard-orders dashboard-profile-edit">

            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter Name">

                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">

                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" aria-describedby="name" placeholder="Enter Phone Number">

                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" onclick="UpdateDetails()" >Submit</button>
                    
                </div>
                <div class="form-group">
                    <h4 id="result"></h4>

                </div>
            </form>
            <script>
            function UpdateDetails() {
                var val1 = $('#name').val();
                var val2 = $('#email').val();
                var val3 = $('#phone').val();
                var val4 = $('#password').val();
                $.ajax({
                    type: 'POST',
                    url: './buyer-update.php',
                    data: { name: val1, email: val2, phone: val3, password: val4 },
                    success: function(response) {
                        $('#result').html(response);
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