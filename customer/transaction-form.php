    <!-- deposit form -->

    <div class="add-balance-inner-wrap deposit_form">
        <div class="container">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Balance</h5>
                                                <p class="close_modal_now">
                            <i style="font-size:20px;" class=" fa fa-close""></i>
                        </p>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form data-form="processDeposit" class="cashout_form" action="<?=APP_PATH?>api/process.php" method="POST">

                                <div class="messageBox  text-center"></div>


                                <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input1">&#8358;</span>
                                        </div>
                                        <input type="number" name="amount"  class="form-control form-control-lg" value="">

                                    </div>
                                    <span></span>
                                </div>

                                <div class="form-group basic">
                                    <button data-name="Deposit" data-process="Processing..." type="submit" class="btn-c btn-primary btn-block btn-lg"
                                        >Deposit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- investment form -->
    <div class="add-balance-inner-wrap investment_form">
        <div class="container">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Invest Now!</h5>
                        <p class="close_modal_now">
                            <i style="font-size:20px;" class=" fa fa-close""></i>
                        </p>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form data-form="processInvestment" class="investment_form" action="<?=APP_PATH?>api/process.php" method="POST">

                            <div class="messageBox  text-center"></div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account1">Select Plan</label>
                                 <select data-plan="<?php echo htmlspecialchars(json_encode(INVESTMENT_PLAN));?>"   name="plan_id" class="form-control custom-select investment_plan" id="account1">
                                           <option value="">Select Plan</option>
                                           <?php  foreach(INVESTMENT_PLAN as $key => $plan){
                                            $plan = (object) $plan;    
                                           ?>
                                              <option data-id="<?=$key?>" value="<?=$key?>"><?=$plan->name?></option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group investment_detail">
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input1">&#8358;</span>
                                        </div>
                                        <input type="number" name="amount" required class="form-control form-control-lg" value="">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <button data-name="Invest" data-process="Processing..." type="submit" class="btn-c btn-primary btn-block btn-lg"
                                        >Invest</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- withdrawal form -->
    <div class="add-balance-inner-wrap withdrawal_form">
        <div class="container">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Withdraw Funds</h5>
                        <p class="close_modal_now">
                            <i style="font-size:20px;" class=" fa fa-close""></i>
                        </p>
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
                                    <button type="button" class="btn-c btn-primary btn-block btn-lg"
                                        data-dismiss="modal">Deposit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <!-- Add Bank Info form -->
    <div class="add-balance-inner-wrap add_bank_form">
        <div class="container">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Bank</h5>
                                                <p class="close_modal_now">
                            <i style="font-size:20px;" class=" fa fa-close""></i>
                        </p>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form data-form="processBank" class="addbank_form" action="<?=APP_PATH?>api/process.php" method="POST">
                            <div class="messageBox  text-center"></div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account1">Select Bank</label>
                                 <select    name="bank_code" class="form-control custom-select choose_bank" >
                                           <?php  foreach(BANKS as $key => $bank){
                                            $bank = (object) $bank;    
                                           ?>
                                              <option  value="<?=$bank->code?>"><?=ucwords($bank->name)?></option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Account No</label>
                                    <div class="input-group mb-3">
                                        <input data-action="<?=APP_PATH?>api/process.php" name="account_no" type="number" require class="form-control form-control-lg account_no" value="">
                                    </div>
                                    <span class="display_info"></span>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Account Name</label>
                                    <div class="input-group mb-3">
                                        <input name="account_name" type="text" readonly require class="form-control form-control-lg account_name" value="sfsdddf">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                        <button  data-name="AddBank" data-process="Processing..." type="submit" class="btn-c btn-primary btn-block btn-lg d-none submit_bank"
                                        >AddBank</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>