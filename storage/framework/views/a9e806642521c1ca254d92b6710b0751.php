<?php $__env->startSection('title','Executive Committees'); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .card img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1rem;
            margin-bottom: 10px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- ==== banner section start ==== -->
    <section class="common-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="common-banner__content text-center">
                        <h2 class="title-animation">Executive Committees</h2>
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
                    Executive Committees
                </li>
            </ol>
        </nav>
    </section>
    <!-- ==== / banner section end ==== -->
    <!-- ==== about section start ==== -->
    <section class="about-area pt-80 pb-80">
        <div class="container">
            <div class="row align-items-center gutter-40">
                <?php $__currentLoopData = $executiveCommittees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $executiveCommittee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <!-- Set a fixed size for the image (e.g., 150x150 pixels) -->
                            <img src="<?php echo e(asset($executiveCommittee->attachments->first()->file)); ?>" class="card-img-top rounded-circle mx-auto d-block" alt="Executive Committee" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($executiveCommittee->name); ?></h5>
                                <p class="card-text"><strong>Designation:</strong> <?php echo e($executiveCommittee->designation); ?></p>
                                <p class="card-text"><strong>Education:</strong> <?php echo e($executiveCommittee->education); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\surjeralo\resources\views/frontend/who_we_are/executive_committee.blade.php ENDPATH**/ ?>