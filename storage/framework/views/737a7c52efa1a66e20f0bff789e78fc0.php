<?php $__env->startSection('content'); ?>
    <section class="cause pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-5">
                    <div class="section__header text-center mb-60" data-aos="fade-up" data-aos-duration="1000">
                        <span>Turning Challenges into Triumphs</span>
                        <h2 class="title-animation">Success Story</h2>
                        <div class="icon-thumb justify-content-center">
                            <div class="icon-thumb-single">
                                <span></span>
                                <span></span>
                            </div>
                            <i class="icon-donation"></i>
                            <div class="icon-thumb-single">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gutter-30">
                <?php $__currentLoopData = $stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="cause__slider-inner" data-aos="fade-up" data-aos-duration="1000">
                            <div class="cause__slider-single van-tilt">
                                <div class="thumb">
                                    <a href="<?php echo e(route('success-stories.show',['slug'=>$story->slug])); ?>">
                                        <img src="<?php echo e(asset($story->attachments->first()->file ?? 'img/blank.jpg')); ?>" alt="Image">
                                    </a>
                                </div>
                                <div class="content">
                                    <h6><a href="<?php echo e(route('success-stories.show',['slug'=>$story->slug])); ?>"><?php echo e($story->title); ?></a></h6>
                                    <p><?php echo e($story->short_description); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="mt-60 text-center">
                        <?php echo $stories->links(); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="spade">
            <img src="<?php echo e(asset('themes/frontend/assets/images/help/spade.png')); ?>" alt="Image">
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\surjeralo\resources\views/frontend/success_stories.blade.php ENDPATH**/ ?>