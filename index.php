<?php 
   require_once "config/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title><?=APP_NAME; ?></title>
   <?php require_once "includes/css.php"; ?>
</head>
<body>

    <!-- header start -->
    <?php require_once "includes/header.php" ?>

    <!-- header end -->

    <!-- page-title stary -->
    <div class="page-title mg-top-50">
        <div class="container">
           <?php if(empty($_SESSION["customer_id"])){ ?>
            <a class="float-right ml-3 p-2" href="<?=APP_PATH?>auth/register.php">Register</a>
            <a class="float-right ml-3 p-2" href="<?=APP_PATH?>auth/login.php">Login</a>
           <?php }else{ ?>
            <a class="float-right ml-3 p-2" href="<?=APP_PATH?>customer/home.php">Dashboard</a>
            <a class="float-right ml-3 p-2 text-danger" href="<?=APP_PATH?>auth/logout.php">Logout</a>

           <?php } ?>
        </div>
    </div>
    <!-- page-title end -->

    <!-- transaction start -->
    <div class="transaction-area pd-top-36">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Welcome To <?=ucwords(APP_NAME)?></h3>
            </div>
            <div class="about-content-inner p-0">
                <img class="w-100" src="<?=IMAGE_PATH?>other/2.png" alt="img">
            </div>
            <div class="about-content-inner">
                <h5>Recived Money Anywhere</h5>
                <p>You have received a payment from Aorn Fice.</p>
                <p>Lpsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                    Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="about-content-inner">
                <h5>Invest Wisely And Earn A Passive Income</h5>
                <p>You have received a payment from Aorn Fice.</p>
                <p>Lpsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                    Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="ba-bill-pay-inner">
                <div class="ba-single-bill-pay">
                    <div class="thumb">
                        <img src="<?=IMAGE_PATH?>icon/7.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Contact Us</h5>
                        <p>You can contact Our Team For Proper Enquiry</p>
                    </div>
                </div>
                <div class="amount-inner">
                    <a class="float-left btn btn-red" href="mailto:<?=APP_EMAIL?>">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- transaction End -->

    <!-- Footer Area -->
    <?php require_once "includes/footer.php"; ?>



    <!-- All Js File here -->
    <?php require_once "includes/js.php"; ?>


</body>
</html>