<?php 

require_once "../config/config.php";
require_once "../config/Db.php";
require_once "../controllers/Helper.php";
require_once "../controllers/Account.php";
require_once "../controllers/Bank.php";
require_once "../controllers/Transaction.php";




 
 if(empty($_SESSION['customer_id'])){
     $path = APP_PATH."auth/login.php";
     header("Location: $path");
     exit();
 }

 $account =(object) Account::getData();
 $userBanks = Bank::getAllData();
 $userInvestments = Transaction::getAllDataByType(TRANSACTION_TYPE[1]);
 $userDeposits = Transaction::getAllDataByType(TRANSACTION_TYPE[0]);

 $userWithdrawals = Transaction::getAllDataByType(TRANSACTION_TYPE[2]);
//  Helper::see($userBanks);

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
                    <h5 class="amount">&#8358;<?=number_format($account->balance,0,".",",")?></h5>
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

    <!-- investments -->

    <?php if(!empty($userInvestments)){ ?>
        <div class="goal-area pd-top-36">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Investment History</h3>
            </div>
            <?php foreach ($userInvestments as $key => $investment) { 
              $investment = (object) $investment;
              $info = json_decode($investment->info);
            ?>
            <!-- {"name":"Basic","min":1000,"max":10000,"duration":"30 days","commission":10,"roi":20} -->
            <div class="single-goal single-goal-one">
                <div class="row">
                    <div class="col-7 pr-0">
                        <div class="details">
                            <h6><?=ucwords($info->name)?></h6>
                            <p><?=ucwords($info->duration)?></p>
                        </div>
                    </div>
                    <div class="col-5 pl-0">
                        <div class="circle-inner circle-inner-one">
                            <h6 class="goal-amount">&#8358;<?=number_format($investment->amount,0,".",",")?></h6>
                            <div class="chart-circle" data-value="<?=(rand(0*10, 1*10) / 10)?>">
                                <canvas width="52" height="52"></canvas>
                                <div class="chart-circle-value text-center"><?=($info->roi)?>%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
   <?php } ?>
    <!-- investments -->

    <!-- deposit -->

    <?php if(!empty($userDeposits)){ ?>
             <div class="history-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Deposit Transaction</h3>

            </div>
            <div class="ba-history-inner">
                <div class="row custom-gutters-20">
                    <?php foreach ($userDeposits as $key => $deposit) {
                        $deposit = (object) $deposit; ?>
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-one" style="background-image: url(assets/img/bg/3.png);">
                            <h6>You Deposited &#8358;<?=number_format($deposit->amount,0,".",",")?></h6>
                            <h5>+ &#8358;<?=number_format($deposit->amount,0,".",",")?></h5>
                        </div>
                    </div>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- deposit -->

    <!-- withdrawal -->
    <?php if (!empty($userWithdrawals)) { ?>
             <div class="history-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Withdrawal Transaction</h3>

            </div>
            <div class="ba-history-inner">
                <div class="row custom-gutters-20">
                    <?php foreach ($userWithdrawals as $key => $withdrawal) {
    $withdrawal = (object) $withdrawal; ?>
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-one text-danger" style="background-image: url(assets/img/bg/3.png);">
                            <h6>You withdrew  &#8358;<?=number_format($withdrawal->amount, 0, ".", ",")?></h6>
                            <h5>- &#8358;<?=number_format($withdrawal->amount, 0, ".", ",")?></h5>
                        </div>
                    </div>
                    <?php
} ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- withdrawl -->


    <!-- banks -->
    <?php if(!empty($userBanks)){ ?>
    <div class="cart-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Your Banks</h3>
            </div> 

            <div class="row">
                            <?php foreach ($userBanks as $key => $bank) {
    $bank = (object) $bank; ?>
              <div class="col-md-4">
                              <div class="ba-cart-inner mt-2" style="background-image: url(<?=IMAGE_PATH?>bg/<?=(rand(1, 14))?>.png);">
                <p>Bank Name</p>
                <h4><?=ucwords($bank->name)?></h4>
                <p>Account Number</p>
                <h5><?=$bank->account_no?></h5>
                <div class="row">
                    <div class="col-4">
                        <p>Account Name</p>
                        <h5><?=strtoupper($bank->account_name)?></h5>
                    </div>
                    <div class="col-8">
                        <p>Bank Code</p>
                        <h5><?=$bank->code?></h5>
                    </div>
                </div>
            </div>
              </div>
            <?php
} ?>
            </div>

        </div>
    </div>
    <?php } ?>
    <!-- banks -->
    <!-- investment section start -->

    <!-- investment section ends -->


    <!-- history section start -->

    <!-- history section ends -->







    <!-- Footer Area -->

    <?php require_once "../includes/footer.php"; ?>




    <?php require_once "../includes/js.php"; ?>


</body>


</html>