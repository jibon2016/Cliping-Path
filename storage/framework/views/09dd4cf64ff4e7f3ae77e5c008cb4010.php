<?php $__env->startSection('title','Image gallery'); ?>
<?php $__env->startSection('content'); ?>
    <!-- ==== banner section start ==== -->
    <section class="common-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="common-banner__content text-center">
                        <h2 class="title-animation">Image Gallery</h2>
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
                    Image Gallery
                </li>
            </ol>
        </nav>
    </section>

    <section class="testimonial-area pt-120 pb-120">
        <div class="container">
            <div class="row gallery gutter-30">
                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 col-sm-3">
                        <div class="gallery-item">
                            <a href="<?php echo e(asset($gallery->file)); ?>" class="popup-link">
                                <img  src="<?php echo e(asset($gallery->file)); ?>" class="img-fluid" alt="Gallery Image">
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="mt-60 text-center">
                        <?php echo $galleries->links(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\surjeralo\resources\views/frontend/image_gallery.blade.php ENDPATH**/ ?>