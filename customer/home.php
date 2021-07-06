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
    <div class="add-balance-inner-wrap">
        <div class="container">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Balance</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form action="https://www.s7template.com/tf/bankapp/index.html">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account1">From</label>
                                        <select class="form-control custom-select" id="account1">
                                            <option value="0">Investment (*** 7284)</option>
                                            <option value="1">Savings (*** 5078)</option>
                                            <option value="2">Deposit (*** 2349)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input1">$</span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" value="768">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <button type="button" class="btn-c btn-primary btn-block btn-lg" data-dismiss="modal">Deposit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar end -->

    <!-- balance start -->
    <div class="balance-area pd-top-40 mg-top-50">
        <div class="container">
            <div class="balance-area-bg balance-area-bg-home">
                <div class="balance-title text-center">
                    <h6>Welcome! <br> Dear Mr Suvro - Bankapp Wallet</h6>
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
            <div class="ba-add-balance-title ba-add-balance-btn">
                <h5>Add Balance</h5>
                <i class="fa fa-plus"></i>
            </div>
            <div class="ba-add-balance-inner mg-top-40">
                <div class="row custom-gutters-20">
                    <div class="col-6">
                        <a class="btn btn-blue ba-add-balance-btn" href="#">Withdraw <i class="fa fa-arrow-down"></i></a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-red ba-add-balance-btn" href="#">Send <i class="fa fa-arrow-right"></i></a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-purple ba-add-balance-btn" href="#">Cards <i class="fa fa-credit-card-alt "></i></a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-green ba-add-balance-btn" href="#">Exchange <i class="fa fa-arrow-down"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- add balance End -->

    <!-- goal area Start -->
    <div class="goal-area pd-top-36">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Saving Goals</h3>
                <a href="#">View All</a>
            </div>
            <div class="single-goal single-goal-one">
                <div class="row">
                    <div class="col-7 pr-0">
                        <div class="details">
                            <h6>Finance Business</h6>
                            <p>Business</p>
                        </div>
                    </div>
                    <div class="col-5 pl-0">
                        <div class="circle-inner circle-inner-one">
                            <h6 class="goal-amount">$130</h6>
                            <div class="chart-circle" data-value="0.30">
                                <canvas width="52" height="52"></canvas>
                                <div class="chart-circle-value text-center">30%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-goal single-goal-two">
                <div class="row">
                    <div class="col-7 pr-0">
                        <div class="details">
                            <h6>App Store</h6>
                            <p>Technology</p>
                        </div>
                    </div>
                    <div class="col-5 pl-0">
                        <div class="circle-inner circle-inner-two">
                            <h6 class="goal-amount">$1065</h6>
                            <div class="chart-circle" data-value="0.90">
                                <canvas width="52" height="52"></canvas>
                                <div class="chart-circle-value text-center">90%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-goal single-goal-three">
                <div class="row">
                    <div class="col-7 pr-0">
                        <div class="details">
                            <h6>Gaming Software</h6>
                            <p>Development</p>
                        </div>
                    </div>
                    <div class="col-5 pl-0">
                        <div class="circle-inner circle-inner-three">
                            <h6 class="goal-amount">$580</h6>
                            <div class="chart-circle" data-value="0.60">
                                <canvas width="52" height="52"></canvas>
                                <div class="chart-circle-value text-center">60%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-goal single-goal-four">
                <div class="row">
                    <div class="col-7 pr-0">
                        <div class="details">
                            <h6>Racing Car</h6>
                            <p>Playing</p>
                        </div>
                    </div>
                    <div class="col-5 pl-0">
                        <div class="circle-inner circle-inner-four">
                            <h6 class="goal-amount">$980</h6>
                            <div class="chart-circle" data-value="0.60">
                                <canvas width="52" height="52"></canvas>
                                <div class="chart-circle-value text-center">60%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- goal area End -->

    <!-- history start -->
    <div class="history-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">History</h3>
                <a href="#">View All</a>
            </div>
            <div class="ba-history-inner">
                <div class="row custom-gutters-20">
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-one" style="background-image: url(assets/img/bg/3.png);">
                            <h6>Income</h6>
                            <h5>$58,968.00</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-two" style="background-image: url(assets/img/bg/3.png);">
                            <h6>Expenses</h6>
                            <h5>$50,968.00</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-three" style="background-image: url(assets/img/bg/3.png);">
                            <h6>Total Bills</h6>
                            <h5>$50,968.00</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-four" style="background-image: url(assets/img/bg/3.png);">
                            <h6>Savings</h6>
                            <h5>$58.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- history End -->

    <!-- cart start -->
    <div class="cart-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">My Cart</h3>
                <a href="#">View All</a>
            </div>
            <div class="ba-cart-inner" style="background-image: url(assets/img/bg/4.png);">
                <p>Balance</p>
                <h4>$56,985.00</h4>
                <p>Card Number</p>
                <h5>0000 0000 0000 0909</h5>
                <div class="row">
                    <div class="col-4">
                        <p>Expiry</p>
                        <h5>12/10</h5>
                    </div>
                    <div class="col-8">
                        <p>CCV</p>
                        <h5>513</h5>
                    </div>
                </div>
                <p>aron smith</p>
            </div>
        </div>
    </div>
    <!-- cart End -->

    <!-- transaction start -->
    <div class="transaction-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Transactions</h3>
                <a href="#">View All</a>
            </div>
            <ul class="transaction-inner">
                <li class="ba-single-transaction">
                    <div class="thumb">
                        <img src="assets/img/icon/2.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$130</h5>
                    </div>
                </li>
                <li class="ba-single-transaction">
                    <div class="thumb">
                        <img src="assets/img/icon/3.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$130</h5>
                    </div>
                </li>
                <li class="ba-single-transaction">
                    <div class="thumb">
                        <img src="assets/img/icon/4.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$130</h5>
                    </div>
                </li>
                <li class="ba-single-transaction">
                    <div class="thumb">
                        <img src="assets/img/icon/5.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$130</h5>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- transaction End -->

    <!-- send-money start -->
    <div class="send-money-area pd-top-36 pd-bottom-40 mg-top-40" style="background-image: url(assets/img/bg/5.png);">
        <div class="container">
            <div class="section-title style-two">
                <h3 class="title">Send Money</h3>
                <a href="#">View All</a>
            </div>
        </div>
        <div class="send-money-slider owl-carousel">
            <div class="item">
                <div class="single-send-money">
                    <img src="assets/img/send-money/1.png" alt="img">
                    <p>Alex Smith</p>
                </div>
            </div>
            <div class="item">
                <div class="single-send-money">
                    <img src="assets/img/send-money/2.png" alt="img">
                    <p>Mariano </p>
                </div>
            </div>
            <div class="item">
                <div class="single-send-money">
                    <img src="assets/img/send-money/3.png" alt="img">
                    <p>Karitika</p>
                </div>
            </div>
            <div class="item">
                <div class="single-send-money">
                    <img src="assets/img/send-money/4.png" alt="img">
                    <p>Jhone</p>
                </div>
            </div>
        </div>
    </div>
    <!-- send-money End -->

    <!-- bill-pay start -->
    <div class="bill-pay-area pd-top-36">
        <div class="container">
            <div class="section-title style-three text-center">
                <h3 class="title">Pay Your Monthly Bill</h3>
            </div>
            <div class="ba-bill-pay-inner">
                <div class="ba-single-bill-pay">
                    <div class="thumb">
                        <img src="assets/img/icon/6.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Envato.com</h5>
                        <p>Standard Elements Services Subscribtion</p>
                    </div>
                </div>
                <div class="amount-inner">
                    <h5>$169</h5>
                    <a class="btn btn-blue" href="#">Pay Now</a>
                </div>
            </div>
            <div class="ba-bill-pay-inner">
                <div class="ba-single-bill-pay">
                    <div class="thumb">
                        <img src="assets/img/icon/3.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Apple.com</h5>
                        <p>Apple Laptop Monthly Pay System.</p>
                    </div>
                </div>
                <div class="amount-inner">
                    <h5>$130</h5>
                    <a class="btn btn-blue" href="#">Pay Now</a>
                </div>
            </div>
            <div class="ba-bill-pay-inner">
                <div class="ba-single-bill-pay">
                    <div class="thumb">
                        <img src="assets/img/icon/4.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Amazon.com</h5>
                        <p>Standard Domain Services Subscribtion</p>
                    </div>
                </div>
                <div class="amount-inner">
                    <h5>$130</h5>
                    <a class="btn btn-blue" href="#">Pay Now</a>
                </div>
            </div>
            <div class="btn-wrap text-center mt-4">
                <a class="readmore-btn" href="#">View All</a>
            </div>
        </div>
    </div>
    <!-- bill-pay End -->

    <!-- blog-area start -->
    <div class="blog-area pd-top-36 pb-2 mg-top-40" style="background-image: url(assets/img/bg/6.png);">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Recent Posts</h3>
                <a href="#">View All</a>
            </div>
            <div class="blog-slider owl-carousel">
                <div class="item">
                    <div class="single-blog">
                        <div class="thumb">
                            <img src="assets/img/blog/1.png" alt="img">
                        </div>
                        <div class="details">
                            <a href="blog-details.html">How to save your money in own business firm.</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-blog">
                        <div class="thumb">
                            <img src="assets/img/blog/2.png" alt="img">
                        </div>
                        <div class="details">
                            <a href="blog-details.html">How to save your money in own business firm.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-area End -->

    <!-- Footer Area -->

    <?php require_once "../includes/footer.php"; ?>
    <?php require_once "../includes/js.php"; ?>


</body>


</html>