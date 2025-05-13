<?php $__env->startSection('title','Managing Director Message'); ?>
<?php $__env->startSection('content'); ?>
    <!-- ==== banner section start ==== -->
    <section class="common-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="common-banner__content text-center">
                        <h2 class="title-animation">Managing Director Message</h2>
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
                    Managing Director Message
                </li>
            </ol>
        </nav>
    </section>
    <!-- ==== / banner section end ==== -->
    <!-- ==== about section start ==== -->
    <section class="about-area pt-80 pb-80">
        <div class="container">
            <div class="row align-items-center gutter-40">
                <div class="col-12">
                    <?php echo $companyInformation->managing_director_message; ?>

                </div>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\surjeralo\resources\views/frontend/about_us/managing_director_message.blade.php ENDPATH**/ ?>