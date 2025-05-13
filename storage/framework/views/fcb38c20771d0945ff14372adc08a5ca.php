<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <a href="<?php echo e(route('slider.index')); ?>" class="col-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-fuchsia elevation-1"><i class="fas fa-image"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Sliders</span>
                    <span class="info-box-number"><?php echo e(number_format($sliders)); ?></span>
                </div>
            </div>
        </a>
        <a href="<?php echo e(route('activity-category.index')); ?>" class="col-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fas fa-list-ol"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Activity Categories</span>
                    <span class="info-box-number"><?php echo e(number_format($activityCategories)); ?></span>
                </div>
            </div>
        </a>
        <a href="<?php echo e(route('activity.index')); ?>" class="col-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fas fa-list-ol"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Activity</span>
                    <span class="info-box-number"><?php echo e(number_format($activityCategories)); ?></span>
                </div>
            </div>
        </a>
        <a href="<?php echo e(route('story.index')); ?>" class="col-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fas fa-list-ol"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Success Story</span>
                    <span class="info-box-number"><?php echo e(number_format($activityCategories)); ?></span>
                </div>
            </div>
        </a>
        <a href="<?php echo e(route('gallery.index')); ?>" class="col-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fas fa-list-ol"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Gallery</span>
                    <span class="info-box-number"><?php echo e(number_format($activityCategories)); ?></span>
                </div>
            </div>
        </a>
        <a href="<?php echo e(route('customer.index')); ?>" class="col-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fas fa-list-ol"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Partners</span>
                    <span class="info-box-number"><?php echo e(number_format($activityCategories)); ?></span>
                </div>
            </div>
        </a>
        <a href="<?php echo e(route('news.index')); ?>" class="col-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-info elevation-1 text-white"><i class="fas fa-list-ul"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text ">News</span>
                    <span class="info-box-number"><?php echo e(number_format($news)); ?></span>
                </div>
            </div>
        </a>
        <a href="<?php echo e(route('customer.index')); ?>" class="col-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-cyan elevation-1 text-white"><i class="fas fa-list-ul"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text ">Partners</span>
                    <span class="info-box-number"><?php echo e(number_format($customers)); ?></span>
                </div>
            </div>
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\clipping\resources\views/dashboard.blade.php ENDPATH**/ ?>