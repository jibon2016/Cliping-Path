<?php $__env->startSection('title','Payment Success'); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .alert{
            display: block;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="common-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="common-banner__content text-center">
                        <h2 class="title-animation">Payment Success</h2>
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
                    Payment Success
                </li>
            </ol>
        </nav>
    </section>

    <section class="cart-list-area mt-20">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Thank You!</h4>
                        <p><?php echo e($message); ?></p>
                        <hr>
                        <p class="mb-0">If you have any questions, please contact our support team.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\surjeralo\resources\views/donation/success.blade.php ENDPATH**/ ?>