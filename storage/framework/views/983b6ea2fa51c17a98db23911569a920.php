<?php $__env->startSection('title','Home'); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .swiper-slide{
            max-height: 450px!important;
        }
        @media only screen and (max-width: 767.98px) {
            .banner-two .banner-two__slider-single {
                padding-block: 0;
                position: relative;
                z-index: 1;
                height: 195px;
            }
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="banner-two">
        <div class="banner-two__slider swiper">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <div class="banner-two__slider-single">
                            <div class="banner-two__slider-bg" data-background="<?php echo e(asset($slider->attachments->first()->file ?? '')); ?>">
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-9 col-lg-7 col-xxl-7">
                                        <div class="banner-two__slider-content">
                                            <?php if($slider->sub_title): ?>
                                                <span class="sub-title"><?php echo e($slider->sub_title); ?></span>
                                            <?php endif; ?>
                                            <?php if($slider->title): ?>
                                                <h1><?php echo e($slider->title); ?></h1>
                                            <?php endif; ?>

                                            <div class="banner__content-cta mt-40">
                                                <?php if($slider->link): ?>
                                                    <a href="<?php echo e($slider->link); ?>" aria-label="about us" title="about us" class="btn--primary">Discover
                                                        More</a>
                                                <?php endif; ?>

                                                <a href="<?php echo e(route('contact_us')); ?>" aria-label="contact us" title="contact us" data-text="Contact Us"
                                                   class="btn--secondary"><span>Contact Us</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="slider-navigation d-none d-md-flex">
            <button type="button" aria-label="prev slide" title="prev slide" class="prev-banner slider-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            <button type="button" aria-label="next slide" title="next slide" class="next-banner slider-btn slider-btn-next">
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>

    </section>
    <section class="cause pt-4 pb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-5">
                    <div class="section__header text-center mb-4" data-aos="fade-up" data-aos-duration="1000">
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
                    <div class="mt-20 text-center">
                        <a href="<?php echo e(route('success-stories')); ?>" data-text="Explore All" class="btn--secondary"><span>Explore All</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial-area pt-4 pb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-5">
                    <div class="section__header text-center mb-4" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="title-animation">Image Gallery</h2>
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
                    <div class="mt-20 text-center">
                        <a href="<?php echo e(route('image-gallery')); ?>" data-text="Explore All" class="btn--secondary"><span>Explore All</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cause pt-4 pb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-5">
                    <div class="section__header text-center mb-4" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="title-animation">Our Development Partners</h2>
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
                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="partner-card p-3">
                            <img src="<?php echo e(asset($customer->attachments->first()->file ?? '')); ?>" alt="Partner 1">
                            <div class="partner-name"><?php echo e($customer->name); ?></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row justify-content-center" style="display: none">
                <div class="col-12 col-lg-6">
                    <div class="mt-20 text-center">
                        <a href="<?php echo e(route('success-stories')); ?>" data-text="Explore All" class="btn--secondary"><span>Explore All</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\surjeralo\resources\views/frontend/home.blade.php ENDPATH**/ ?>