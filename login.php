<!-- Including Header -->
<?php include_once 'resources/header.php'; ?>
<!---------------------->
<section class="bottom-header">
    <h1 class="page-heading">Product Name</h1>
</section>

<section class="mt-5 ">
    <div class="row ">
        <div class="col-5 ">
            <form class="form login-register-form">

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">

                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-success px-4">Login</button>
                </div>
            </form>


        </div>
        <div class="col-7 ">
            <form class="form login-register-form" autocomplete="off" id="register">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter Name">

                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">

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
                    <label for="usertype">User Type</label><br>
                    <select name="usertype" id="usertype" onchange="getval(this);">
                        <option value="Customer">Customer</option>
                        <option value="Seller">Seller</option>

                    </select>


                </div>
                <div id="storename">

                </div>
                <div class="form-group">
                    <button type="submit" name="register" class="btn btn-success px-4">Register</button>
                </div>
            </form>

        </div>

    </div>


</section>

<script>
    function getval(sel) {

        if ((sel.value) == "Seller") {
            $("#storename").append(` <div id="store" class="form-group">
                    <label for="storename">Store Name</label>
                    <input type="text" class="form-control" id="storenamefiled" placeholder="Enter Store Name">
                </div>`);
        }
        if ((sel.value) == "Customer") {

            $("#store").remove();
        }

    }
</script>

<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->