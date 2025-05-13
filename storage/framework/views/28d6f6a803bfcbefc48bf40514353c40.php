<?php $__env->startSection('title','News & Events'); ?>
<?php $__env->startSection('content'); ?>
    <!-- ==== banner section start ==== -->
    <section class="common-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="common-banner__content text-center">
                        <h2 class="title-animation">News & Events</h2>
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
                    News & Events
                </li>
            </ol>
        </nav>
    </section>
    <!-- ==== / banner section end ==== -->
    <!-- ==== about section start ==== -->
    <section class="blog-main blog cm-details pt-80 pb-80">
        <div class="container">
            <div class="row gutter-60">
                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-lg-4">
                        <div class="blog__single-wrapper" data-aos="fade-up" data-aos-duration="1000">
                            <div class="blog__single van-tilt">
                                <div class="blog__single-thumb">
                                    <a href="<?php echo e(route('news-and-events.show',['slug'=>$newsItem->slug])); ?>">
                                        <img src="<?php echo e(asset($newsItem->attachments->first()->file ?? '')); ?>" alt="Image">
                                    </a>
                                    <div class="tag">
                                        <a href="<?php echo e(route('news-and-events.show',['slug'=>$newsItem->slug])); ?>"><i class="fa-solid fa-tags"></i>News</a>
                                    </div>
                                </div>
                                <div class="blog__single-inner">
                                    <div class="blog__single-content">
                                        <h5><a href="<?php echo e(route('news-and-events.show',['slug'=>$newsItem->slug])); ?>">
                                            <?php echo e($newsItem->title); ?></a>
                                        </h5>
                                    </div>
                                    <div class="blog__single-cta">
                                        <a href="<?php echo e(route('news-and-events.show',['slug'=>$newsItem->slug])); ?>" aria-label="blog details"
                                           title="blog details">Read More<i
                                                class="fa-solid fa-circle-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-12 mt-4">
                    <?php echo $news->links(); ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\surjeralo\resources\views/frontend/news.blade.php ENDPATH**/ ?>