<?php 
 require_once "../config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <?php require_once "../includes/css.php" ?>
</head>

<body>


    <!-- header start -->
    <?php require_once "../includes/header.php" ?>

    <!-- header end -->

    <!-- page-title stary -->
    <div class="page-title mg-top-50">
        <div class="container">
     
            <a href="<?=APP_PATH?>auth/register.php" class="float-right">Sign Up</a>
        </div>
    </div>

    <!-- page-title end -->

    <!-- singin-area start -->
    <div class="signin-area mt-5">
        <div class="container">
        <h3 class="text-center p-3 bg-white rounded shadow text-primary" >Login Here</h3>
            <form class="contact-form-inner">

                <label class="single-input-wrap">
                    <span>Email Address*</span>
                    <input type="text">
                </label>
                <label class="single-input-wrap">
                    <span>Password*</span>
                    <input type="password">
                </label>
                <div class="single-checkbox-wrap">
                    <input checked required type="checkbox"><span>Remember Me</span>
                </div>
                <a class="btn btn-purple" href="#">Login</a>
            </form>
        </div>
    </div>
    <!-- singin-area End -->

    <!-- Footer Area -->
     <?php require_once "../includes/footer.php"; ?>
    <!-- back to top area end -->


    <!-- All Js File here -->
    <script src="assets/js/vendor.js"></script>
    <script src="assets/js/main.js"></script>

</body>


<!-- Mirrored from www.s7template.com/tf/bankapp/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Jun 2021 08:22:33 GMT -->
</html>