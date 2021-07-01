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
                    <!-- Changed attribute type for prevent refresh, added onclick function and a spinner for wait until server response -->
                    <button type="button" name="login" class="btn btn-success px-4" onclick="ajaxCall()">Login <span id="save-btn-spinner" class="spinner-border-sm"></span></button>
                </div>
                <div id="loginStatusArea"></div>
                
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

    //Ajax script for submit login details, display errors and success redirects
    function ajaxCall() {
        var val1 = $('#email').val();
        var val2 = $('#password').val();
        $("#save-btn-spinner").addClass("spinner-border");
        $.ajax({
            type: 'POST',
            url: './login_process.php',
            data: { email: val1, password: val2 },
            success: function(response) {
                $("#save-btn-spinner").removeClass("spinner-border");
                if ($.trim(response) == "username") {
                    $('#loginStatusArea').html("<div class='alert alert-danger'><strong>Error:</strong> Username is incorrect!</div>");
                }
                else if ($.trim(response) == "password") {
                    $('#loginStatusArea').html("<div class='alert alert-danger'><strong>Error:</strong> Password is incorrect!</div>");
                }
                else if ($.trim(response) == "admin" || $.trim(response) == "seller" || $.trim(response) == "customer") {
                    $('#loginStatusArea').html("<div class='alert alert-success'><strong>Success: </strong> Login successful!</div>");
                    if ($.trim(response) == "admin") {
                        window.location.href = "./admin.php";
                    }
                    else if ($.trim(response) == "seller") {
                        window.location.href = "./seller.php";
                    }
                    else if ($.trim(response) == "buyer") {
                        window.location.href = "./buyer.php";
                    }
                }
                else {
                    $('#loginStatusArea').html("<div class='alert alert-danger'><strong>Error:</strong> Invalid server respose!</div>");
                }
            }
        });
    }
</script>

<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->