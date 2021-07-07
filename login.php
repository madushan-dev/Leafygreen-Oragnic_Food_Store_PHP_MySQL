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
                    <button type="button" name="login" class="btn btn-success px-4" onclick="loginAjaxCall()">Login <span id="login-btn-spinner" class="spinner-border-sm"></span></button>
                </div>
                <!-- Added div to display messages -->
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
                    <label for="regemail">Email address</label>
                    <!-- Changed id to avoid conflicts with login form -->
                    <input type="email" class="form-control" id="regemail" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" aria-describedby="name" placeholder="Enter Phone Number">

                </div>

                <div class="form-group">
                    <label for="regpassword">Password</label>
                    <!-- Changed id to avoid conflicts with login form -->
                    <input type="password" class="form-control" id="regpassword" placeholder="Password">
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
                    <!-- Changed attribute type for prevent refresh, added onclick function and a spinner for wait until server response -->
                    <button type="button" name="register" class="btn btn-success px-4" onclick="regAjaxCall()">Register <span id="register-btn-spinner" class="spinner-border-sm"></span></button>
                </div>
                <!-- Added div to display messages -->
                <div id="regStatusArea"></div>
            </form>

        </div>

    </div>


</section>

<script>
    function getval(sel) {

        if ((sel.value) == "Seller") {
            $("#storename").append(`<div id="store"> <div id="" class="form-group">
                    <label for="storename">Store Name</label>
                    <input type="text" class="form-control" id="storename" placeholder="Enter Store Name">
                </div><div id="" class="form-group">
                    <label for="storename">Phone Number</label>
                    <input type="text" class="form-control" id="storephone" placeholder="Enter Phone Number">
                </div><div id="" class="form-group">
                    <label for="storename">Store Description</label>
                    <textarea class="form-control"> </textarea>
                </div></div><div id="" class="form-group mb-5">
                    <label for="storename">Store Image</label>
                    <input type="file" class="form-control" id="storeimage">
                </div>`);
        }
        if ((sel.value) == "Customer") {

            $("#store").remove();
        }

    }

    //Ajax script for submit login details, display errors and success redirects
    function loginAjaxCall() {
        var val1 = $('#email').val();
        var val2 = $('#password').val();
        $("#login-btn-spinner").addClass("spinner-border");
        $.ajax({
            type: 'POST',
            url: './login_process.php',
            data: { email: val1, password: val2 },
            success: function(response) {
                $("#login-btn-spinner").removeClass("spinner-border");
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

    //Ajax script for submit registration details, display errors and success redirects
    function regAjaxCall() {
        var val1 = $('#name').val();
        var val2 = $('#regemail').val();
        var val3 = $('#phone').val();
        var val4 = $('#regpassword').val();
        var val5 = $('#usertype').val();
        $("#register-btn-spinner").addClass("spinner-border");
        $.ajax({
            type: 'POST',
            url: './register_process.php',
            data: { name: val1, regemail: val2, phone: val3, regpassword: val4, usertype: val5 },
            success: function(response) {
                $("#register-btn-spinner").removeClass("spinner-border");
                if ($.trim(response) == "email") {
                    $('#regStatusArea').html("<div class='alert alert-danger'><strong>Error:</strong> Email exists!</div>");
                }
                else if ($.trim(response) == "phone") {
                    $('#regStatusArea').html("<div class='alert alert-danger'><strong>Error:</strong> Phone number exists!</div>");
                }
                else if ($.trim(response) == "regerror") {
                    $('#regStatusArea').html("<div class='alert alert-danger'><strong>Error:</strong> Registration error!</div>");
                }
                else if ($.trim(response) == "regsuccess") {
                    $('#regStatusArea').html("<div class='alert alert-success'><strong>Success: </strong> Registration successful!</div>");
                    if (val5 == "Customer") {
                        window.location.href = "./buyer.php";
                    }
                    else if (val5 == "Seller") {
                        window.location.href = "./seller.php";
                    }
                }
                else {
                    $('#regStatusArea').html("<div class='alert alert-danger'><strong>Error:</strong> Unknown server response</div>");
                }
            }
        });
    }
</script>

<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->