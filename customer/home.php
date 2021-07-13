<?php 

require_once "../config/config.php";
require_once "../config/Db.php";
require_once "../controllers/Helper.php";
require_once "../controllers/Account.php";


 
 if(empty($_SESSION['customer_id'])){
     $path = APP_PATH."auth/login.php";
     header("Location: $path");
     exit();
 }

 $account =(object) Account::getData();


?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Customer Dashboard</title>
    <?php require_once "../includes/css.php"; ?>

</head>

<body>



    <!-- header start -->
    <?php require_once "../includes/header.php"; ?>

    <?php require_once "../includes/sidebar.php"; ?>


    <!-- header end -->
        <!-- page-title stary -->
        <div class="page-title mg-top-50">
        <div class="container">
            <a class="float-right ml-3 p-2" href="<?=APP_PATH?>auth/register.php">Welcome Back <?=ucwords($_SESSION['customer_username'])?></a>

            <a class="float-right ml-3  p-2 text-danger"  href="<?=APP_PATH?>auth/logout.php">Logout</a>

        </div>
    </div>
    <!-- page-title end -->



    <!-- navbar end -->
    <?php require_once "transaction-form.php"; ?>

    <!-- navbar end -->

    <!-- balance start -->
    <div class="balance-area pd-top-40 mg-top-50">
        <div class="container">
            <div class="balance-area-bg balance-area-bg-home">
                <div class="balance-title text-center ">
                    <h6 style="color:#222 !important;">Welcome! <br> Dear <?=ucwords($_SESSION['customer_username'])?> - <?=ucwords(APP_NAME)?> Wallet</h6>
                </div>
                <div class="ba-balance-inner text-center" style="background-image: url(<?=IMAGE_PATH?>bg/2.png);">
                    <div class="icon">
                        <img src="<?=IMAGE_PATH?>icon/1.png" alt="img">
                    </div>
                    <h5 class="title">Total Balance</h5>
                    <h5 class="amount">$<?=number_format($account->balance,0,".",",")?></h5>
                </div>
            </div>
        </div>
    </div>
    <!-- balance End -->

    <!-- add balance start -->
    <div class="add-balance-area pd-top-40">
        <div class="container">

            <div class="ba-add-balance-inner mg-top-40">
                <div class="row custom-gutters-20">
                     <div class="col-md-3 col-sm-12">
                        <a data-form="deposit_form" class="btn btn-green ba-add-balance-btn" href="#">Deposit  <i class="fa fa-plus"></i></i></a>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <a data-form="investment_form" class="btn btn-purple ba-add-balance-btn" href="#">Invest <i class="fa fa-credit-card-alt "></i></a>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <a data-form="withdrawal_form" class="btn btn-red ba-add-balance-btn" href="#">Withdraw <i class="fa fa-arrow-down"></i></a>
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <a data-form="add_bank_form" class="btn btn-warning ba-add-balance-btn" href="#">Add Bank <i class="fa fa-arrow-up"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- add balance End -->

    <!-- investment section start -->

    <!-- investment section ends -->


    <!-- history section start -->

    <!-- history section ends -->







    <!-- Footer Area -->

    <?php require_once "../includes/footer.php"; ?>




    <?php require_once "../includes/js.php"; ?>


</body>


</html>