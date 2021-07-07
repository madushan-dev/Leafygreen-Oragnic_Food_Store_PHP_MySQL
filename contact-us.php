<!-- Including Header -->
<?php include_once 'resources/header.php'; ?>
<!---------------------->
<section class="bottom-header">
    <h1 class="page-heading">Contact Us</h1>
</section>

<section class="mt-5 contact-row">
    <div class="row">
        <div class="col-6 contact-details m-auto">
            <h2><i class="fa fa-envelope"></i> info@leafygreen.com</h2>
            <h2><i class="fa fa-phone-square"></i> 076 6666 777</h2>
            <h2><i class="fa fa-map-marker"></i> Kamurupitiya, Matara</h2>

        </div>
        <div class="col-6 ">
            <form class="form contact-form " autocomplete="off" action="handlers/insert-contactus.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter Name" name="name">

                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">

                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" aria-describedby="name" placeholder="Enter Phone Number" name="phone">

                </div>

                <div class="form-group">
                    <label for="message">Message</label><br>
                    <textarea name="message" id="" class="form-control" ></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-success px-4" rows="20">Submit</button>
                </div>
            </form>

        </div>


    </div>


</section>
<div class="section mt-5">
    <div class="map row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.496996373256!2d80.53975221534778!3d6.063504830020449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae141585ad5987d%3A0x717cf948bd5444ff!2sFaculty%20of%20Technology%2C%20University%20of%20Ruhuna!5e0!3m2!1sen!2slk!4v1623254405019!5m2!1sen!2slk" height="300px style=" border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>


<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->