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
                    <span id=emailValidateMsg></span>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password">
                    <span id=passValidateMsg></span>
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
                    <span id="nameValidateMsg"></span>
                </div>
                <div class="form-group">
                    <label for="regemail">Email address</label>
                    <!-- Changed id to avoid conflicts with login form -->
                    <input type="email" class="form-control" id="regemail" placeholder="Enter email">
                    <span id="regemailValidateMsg"></span>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" aria-describedby="name" placeholder="Enter Phone Number">
                    <span id="phoneValidateMsg"></span>
                </div>

                <div class="form-group">
                    <label for="regpassword">Password</label>
                    <!-- Changed id to avoid conflicts with login form -->
                    <input type="password" class="form-control" id="regpassword" placeholder="Password">
                    <span id="regpassValidateMsg"></span>
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
            //IDs are fixed
            $("#storename").append(`<div id="store"> <div id="" class="form-group">
                    <label for="storenameinput">Store Name</label>
                    <input type="text" class="form-control" id="storenameinput" placeholder="Enter Store Name">
                    <span id="storeNameValidateMsg"></span>
                </div><div id="" class="form-group">
                    <label for="storephone">Phone Number</label>
                    <input type="text" class="form-control" id="storephone" placeholder="Enter Phone Number">
                    <span id="regphoneValidateMsg"></span>
                </div><div id="" class="form-group">
                    <label for="storedes">Store Description</label>
                    <textarea class="form-control" id="storedes"> </textarea>
                    <span id="desValidateMsg"></span>
                </div></div><div id="" class="form-group mb-5">
                    <label for="storeimage">Store Image</label>
                    <input type="file" class="form-control" id="storeimage">
                </div>`);
        }
        if ((sel.value) == "Customer") {

            $("#store").remove();
        }

    }

    //Email Validation script
    function validateEmail(email) {
        const res = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return res.test(String(email).toLowerCase());
    }

    //Ajax script for submit login details, display errors and success redirects
    function loginAjaxCall() {

        var val1 = $('#email').val();
        var val2 = $('#password').val();

        if(validateEmail(val1)) {
            $('#emailValidateMsg').html("");
            if (val2 == "") {
                $("#passValidateMsg").addClass("text-danger");
                $('#passValidateMsg').html("Please enter password.");
            }
            else {
                $('#passValidateMsg').html("");
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
                        else if ($.trim(response) == "admin" || $.trim(response) == "Seller" || $.trim(response) == "Customer") {
                            $('#loginStatusArea').html("<div class='alert alert-success'><strong>Success: </strong> Login successful!</div>");
                            if ($.trim(response) == "admin") {
                                window.location.href = "./admin.php";
                            }
                            else if ($.trim(response) == "Seller") {
                                window.location.href = "./seller.php";
                            }
                            else if ($.trim(response) == "Customer") {
                                window.location.href = "./buyer.php";
                            }
                        }
                        else {
                            $('#loginStatusArea').html("<div class='alert alert-danger'><strong>Error:</strong> Invalid server respose!</div>");
                        }
                    }
                });
            }
        }
        else {
            $("#emailValidateMsg").addClass("text-danger");
            $('#emailValidateMsg').html("Email Invalid");
        }
    }

    //Ajax script for submit registration details, display errors and success redirects
    function regAjaxCall() {
        var val1 = $('#name').val();
        var val2 = $('#regemail').val();
        var val3 = $('#phone').val();
        var val4 = $('#regpassword').val();
        var val5 = $('#usertype').val();

        //Varibales for store table
        var val6 = $('#storenameinput').val();
        var val7 = $('#storephone').val();
        var val8 = $('#storedes').val();
        var val9 = $('#storeimage').val();

        if (val1 == "") {
            $("#nameValidateMsg").addClass("text-danger");
            $('#nameValidateMsg').html("Please enter name.");   
        }
        else {
            $('#nameValidateMsg').html("");
            if(validateEmail(val2)) {
                $('#regemailValidateMsg').html("");
                if(val3.length!=10 && !/^[0-9]+$/.test(val2)) { 
                    $("#phoneValidateMsg").addClass("text-danger");
                    $('#phoneValidateMsg').html("Please enter a valid phone number.");
                }
                else { 
                    $('#phoneValidateMsg').html("");
                    if(val4.length<8) { 
                        $("#regpassValidateMsg").addClass("text-danger");
                        $('#regpassValidateMsg').html("Password must have at least 8 characters");
                    }
                    else {
                        $('#regpassValidateMsg').html("");
                        if (val5 == "Seller") {
                            
                            if (val6 == "") {
                                $("#storeNameValidateMsg").addClass("text-danger");
                                $('#storeNameValidateMsg').html("Please enter a store name.");
                            }
                            else {
                                $('#storeNameValidateMsg').html("");
                                if (val7.length!=10 && !/^[0-9]+$/.test(val7)) {
                                    $("#regphoneValidateMsg").addClass("text-danger");
                                    $('#regphoneValidateMsg').html("Please enter a valid phone.");
                                }
                                else {
                                    $('#regphoneValidateMsg').html("");
                                    if(val8.length<50 || val8.length>200) {
                                        $("#desValidateMsg").addClass("text-danger");
                                        $('#desValidateMsg').html("Description must be between 50 and 200 characters.");
                                    }
                                    else {
                                        $('#desValidateMsg').html("");
                                        $("#register-btn-spinner").addClass("spinner-border");
                                        $.ajax({
                                            type: 'POST',
                                            url: './register_process.php',
                                            data: { name: val1, regemail: val2, phone: val3, regpassword: val4, usertype: val5, storename: val6, storephone: val7, storedes: val8, storeimage: val9 },
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
                                                else if ($.trim(response) == "storesuccessregsuccess") {
                                                    $('#regStatusArea').html("<div class='alert alert-success'><strong>Success: </strong> Registration successful, New store created!</div>");
                                                    window.location.href = "./seller.php";
                                                }
                                                else {
                                                    $('#regStatusArea').html("<div class='alert alert-danger'><strong>Error:</strong> Unknown server response</div>");
                                                }                           
                                            }
                                        });
                                    }
                                }
                            }

                        }
                        else {
                            $("#register-btn-spinner").addClass("spinner-border");
                            $.ajax({
                                type: 'POST',
                                url: './register_process.php',
                                data: { name: val1, regemail: val2, phone: val3, regpassword: val4, usertype: val5},
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
                                        window.location.href = "./buyer.php";
                                    }
                                    else {
                                        $('#regStatusArea').html("<div class='alert alert-danger'><strong>Error:</strong> Unknown server response</div>");
                                    }
                                }
                            });
                        }
                    }
                }
            }
            else {
                $("#regemailValidateMsg").addClass("text-danger");
                $('#regemailValidateMsg').html("Please enter valid email");
            }
        }
    }
</script>

<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->