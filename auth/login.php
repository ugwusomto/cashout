<?php 
 require_once "../config/config.php";
  if (!empty($_SESSION['customer_id'])) {
     $path = APP_PATH."customer/home.php";
     header("Location: $path");
     exit();
 }

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
            <form data-form="login"  method="POST" action="<?=APP_PATH?>api/process.php" class="contact-form-inner cashout_form">
                <div class="messageBox  text-center"></div>

                <label class="single-input-wrap">
                    <span>Email Address*</span>
                    <input required type="email" maxlength="100" name="email" placeholder="email" >
                </label>
                <label class="single-input-wrap">
                    <span>Password*</span>
                      <input required type="password"  required name="password" minlength="6"  maxlength="10">
                </label>
                <div class="single-checkbox-wrap">
                    <input name="rem" checked required type="checkbox"><span>Remember Me</span>
                </div>
                <button class="btn btn-purple" name="login_user" type="submit">Login</button>
            </form>
        </div>
    </div>
    <!-- singin-area End -->

    <!-- Footer Area -->
     <?php require_once "../includes/footer.php"; ?>
    <!-- back to top area end -->


    <!-- All Js File here -->
    <?php require_once "../includes/js.php"; ?>


</body>



</html>