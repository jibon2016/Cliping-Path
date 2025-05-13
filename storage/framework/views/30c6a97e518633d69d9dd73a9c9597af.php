<?php $__env->startSection('title','Donation'); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .form-row {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -5px;
            margin-left: -5px;
        }
        .step-bg-clr {
            background: #F8F8F8;
        }

        .btn-list-wrap {
            list-style-type: none;
            margin: 0px;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }

        .btn-list-wrap input[type="radio"] {
            opacity: 0.011;
            z-index: 100;
            height: 0px;
            visibility: hidden;
            top: -20px;
            left: -20px;
            position: absolute;
        }

        .btn-list-wrap label {
            padding: 7px;
            cursor: pointer;
            z-index: 90;
            text-align: center;
            background: #fff;
            width: 25%;
            margin-bottom: 5px !important;
            font-size: 16px;
            text-transform: capitalize;
            border: 4px solid transparent;
            font-family: 'Geogrotesque-SemiBold';
            border: 1px solid #D9D9D9;
            font-weight: 600;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #000;
        }

        .btn-list-wrap label, .btn-list-wrap input {
            display: block;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .donateAmnt {
            font-style: italic;
            font-weight: 600;
            font-size: 42px;
            line-height: 52px;
        }

        .btn-list-wrap {
            list-style-type: none;
            margin: 0px;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }

        .btn-list-wrap input[type="radio"] {
            opacity: 0.011;
            z-index: 100;
            height: 0px;
            visibility: hidden;
            top: -20px;
            left: -20px;
            position: absolute;
        }

        .btn-list-amount.btn-list-wrap label {
            width: 25%;
            font-size: 15px;
            font-weight: 600;
            border: 1px solid #13a462;
            font-family: 'Geogrotesque-SemiBold';
        }

        .descriptionAmount {
            font-size: 20px;
            line-height: 26px;
            color: #71767D;
            font-weight: 600;
        }

        #other_donation_amount {
            border-radius: 0px;
            font-size: 20px;
            border: 2px solid #13a462;
            color: #17202B !important;
            padding: 5px 22px;
            width: 100%;
            appearance: none;
            -webkit-appearance: none;
            font-weight: bold;
            margin-top: 13px;
        }

        #monthly-fund-heading-1 {
            color: #17202B;
            font-style: italic;
            font-size: 60px;
            text-transform: none !important;
            padding: 0px 60px;
            font-weight: 600;
        }


        .btn-list-wrap input[type="radio"]:checked + label {
            background: #13a462;
            color: #fff;
            border: 1px solid #13a462;
            position: relative;
        }

        .btn-list-amount input[type="radio"]:checked + label::after {
            content: "";
            border-left: 12px solid transparent;
            border-right: 12px solid transparent;
            border-top: 16px solid #13a462;
            margin-top: 70px;
            position: absolute;
            top: -38px;
            left: 46%;
        }

        .single-fund-heading-1 {
            color: #17202B;
            font-style: italic;
            font-size: 28px;
            text-transform: none !important;
            font-weight: 600;
        }
        h2#user-details-single-heading {
            color: #17202B;
            font-style: italic;
            font-weight: 600;
            font-size: 60px;
            line-height: 66px;
            padding-left: 60px;
        }
        .secForm .form-control {
            -webkit-appearance: none;
            /* appearance: none; */
            border: 2px solid #13a462;
            padding: 7px 12px;
            height: 50px !important;
            color: #13a462;
            font-weight: 400;
            font-size: 18px;
            line-height: 28px;
            border-radius: unset!important;
            font-family: 'Lato';
            background: #F8F8F8;
        }
        .selectArrow {
            background-size: 14px 16px!important;
            background-position-x: 88%!important;
            background-position-y: 16px!important;
            background-repeat: no-repeat!important;
            background-image: url("https://i.ibb.co/frMKkMH/down-arrow-4.png")!important;
        }

        .noValue {
            color: #727272!important;
            font-style: italic;
            font-weight: 400;
            opacity: 1!important;
            font-family: 'Lato';
        }
        select option {
            color: #13a462!important;
            font-style: normal;
        }

        .step-bg-clr {
            background: #F8F8F8;
            padding: 15px 15px;
            border-radius: 15px;
            border: 1px solid #eee;
        }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="common-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="common-banner__content text-center">
                        <h2 class="title-animation">Donation</h2>
                    </div>
                </div>
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo e(route('home')); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Donation
                </li>
            </ol>
        </nav>
    </section>
    <section class="cart-list-area mt-20 mb-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="<?php echo e(route('donation.pay')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="content clearfix">
                            <h4 class="text-blue text-uppercase mb-3 font-600 single-fund-heading-1">Select your
                                fund[s]</h4>
                            <fieldset class="fieldsetSecond fundsloaded field-width-set body current">
                                <div class="step-bg-clr">
                                    <div class="btn-list-wrap">
                                        <?php $__currentLoopData = $donationFunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donationFund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input type="radio" id="<?php echo e($donationFund->id); ?>" value="<?php echo e($donationFund->id); ?>" name="donation_fund"
                                                   data-donation_fund_id="<?php echo e($donationFund->id); ?>" class="select_fund">
                                            <label for="<?php echo e($donationFund->id); ?>"
                                                   data-donation_fund="<?php echo e($donationFund->name); ?>"><?php echo e($donationFund->name); ?></label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div id="donation_amount_area" style="display: none">
                                        <br>
                                        <h4 class="text-blue text-uppercase mb-3 font-600 single-fund-heading-1">Sadaqah Jariyah amount</h4>
                                        <div class="btn-list-wrap btn-list-amount mb-2">
                                            <input type="radio"  id="donation_amount_1000" name="donation_amount_type" data-donation_amount="1000" class="select_donation">
                                            <label for="donation_amount_1000">৳1000</label>
                                            <input type="radio" id="donation_amount_2000" name="donation_amount_type"  data-donation_amount="2000" class="select_donation">
                                            <label for="donation_amount_2000">৳2000</label>
                                            <input type="radio" id="donation_amount_5000" name="donation_amount_type" data-donation_amount="5000"  class="select_donation">
                                            <label for="donation_amount_5000">৳5000</label>
                                            <input type="radio" id="donation_other_amount" name="donation_amount_type"  data-value="other"
                                                   class="select_donation">
                                            <label for="donation_other_amount">৳ Other</label>
                                            <input type="number" style="display: none" required readonly min="10" id="other_donation_amount" name="donation_amount"
                                                   class="form-control required" placeholder="Enter Amount">
                                        </div>
                                    </div>
                                    <div id="donor_details" style="display: none">
                                        <br>
                                        <h4 class="text-blue text-uppercase mb-3 font-600 single-fund-heading-1">Your details</h4>
                                        <section class="step-4-oneoff secForm step-bg-clr">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="first_name">First name<span class="text-danger">*</span></label>
                                                    <input type="text" required id="first_name" name="first_name" class="form-control required"
                                                           minlength="2" placeholder="First name" tabindex="2">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="last_name">Last name<span class="text-danger">*</span></label>
                                                    <input type="text" required id="last_name" name="last_name" class="form-control required"
                                                           minlength="2" placeholder="Last name" tabindex="3">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="email">Email (optional)</label>
                                                    <input type="email"  id="email" name="email" class="form-control required"
                                                           placeholder="Email address" tabindex="4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="contact_number">Contact number <span class="text-danger">*</span></label>
                                                    <input type="tel" required id="contact_number" name="contact_number" class="form-control"
                                                           placeholder="Contact number" tabindex="5">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="address">Address (Optional)</label>
                                                    <textarea id="address" name="address" class="form-control"
                                                              placeholder="Address" tabindex="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 form-check valueWrap">
                                                    <input type="checkbox" class="big-checkbox" name="is_organisation"
                                                           id="is_organisation" tabindex="6" value="1">
                                                    <label class=" form-check-label" for="is_organisation"> I am donating on behalf
                                                        of an organisation.</label>
                                                </div>
                                                <div class="form-group col-md-12" style="display: none" id="organisation_area">
                                                    <label for="organisation">Organisation Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="organisation" id="organisation" class="form-control required"
                                                           placeholder="Organisation Name" maxlength="249" tabindex="7"
                                                           minlength="2">
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </fieldset>
                            <button style="display: none" class="btn btn-primary btn-lg btn-block" id="sslczPayBtn">Pay Now</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(function (){
            $('.select_fund').click(function (){
                $("#donation_amount_area").show();
            })
            $('.select_donation').click(function (){
                $("#donor_details").show();
                    $("#other_donation_amount").show()
                    let donationAmount = $(this).data('donation_amount');
                    console.log(donationAmount);
                    let amountType = $(this).data('value');
                    if (amountType == 'other'){
                        $("#other_donation_amount").attr('readonly',false);
                        $("#other_donation_amount").val(' ');
                    }else{
                        $("#other_donation_amount").val(donationAmount);
                        $("#other_donation_amount").attr('readonly',true);
                    }
                    $('#sslczPayBtn').show();
            })
            $('#is_organisation').click(function (){
                console.log(this.value);
                if ($(this).is(":checked")) {
                    $('#organisation_area').show();
                    $('#organisation').attr('required',true);
                }else {
                    $('#organisation_area').hide();
                    $('#organisation').attr('required',false);
                }
            })
        })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\surjeralo\resources\views/frontend/donation.blade.php ENDPATH**/ ?>