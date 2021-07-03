<!-- Including DB Connection -->
<?php include_once 'resources/db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | Leafy Green Oragnic Food Store</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;1,700&display=swap" rel="stylesheet">
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <!-------- Top Bar -------->
    <section class="top-header">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div>
                    <i class="fa fa-facebook-official"></i>
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-twitter-square"></i>

                </div>

                <div>
                    <h4><i class="fa fa-envelope"></i>info@leafygreen.lk <i class="fa fa-phone-square"></i>076 6666 777</h4>

                </div>

            </div>
        </div>
    </section>

    <section class="main-header pt-4">
        <nav class="row">
            <div class="col col-2 nav-brand">
                <img src="images/logo.png" alt="">

            </div>
            <div class="col col-6 ">
                <ul class="list-unstyled d-flex justify-content-center primary-menu mt-3">
                    <li class="px-2"><a href="index.php" class="btn btn-success btn-lg px-4 py-3" role="button">Home</a></li>
                    <li class="px-2"><a href="about-us.php" class="btn btn-success btn-lg px-4 py-3" role="button">About us</a></li>
                    <li class="px-2"><a href="shop.php" class="btn btn-success btn-lg px-4 py-3" role="button">Shop</a></li>
                    <li class="px-2"><a href="vendors.php" class="btn btn-success btn-lg px-4 py-3" role="button">Vendors</a></li>
                    <li class="px-2"><a href="contact-us.php" class="btn btn-success btn-lg px-4 py-3" role="button">Contact us</a></li>
                </ul>


            </div>
            <div class="col col-4 tool-box m-auto">
                <ul class="list-unstyled d-flex justify-content-center ">
                    <li class="px-"><a href="login.php"><i class="fa fa-user""></i>My Account</a></li>
                    <li class=" px-2"><a href="cart.php"><i class="fa fa-shopping-cart""></i>Cart</a></li>
                </ul>


            </div>

        </nav>
        
        <!-- Login Model -->
    

    </section>