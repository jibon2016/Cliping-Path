<?php $__env->startSection('title','Payment Failed'); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .alert{
            display: block;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="page-header-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Payment Failed</a></li>
                        </ol>
                    </nav>
                    <h1 class="page-title">Payment Failed</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="cart-list-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Payment Failed</h4>
                        <p><?php echo e($message); ?></p>
                        <hr>
                        <p class="mb-0">If you need further assistance, please contact our support team.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\surjeralo\resources\views/donation/fail.blade.php ENDPATH**/ ?>