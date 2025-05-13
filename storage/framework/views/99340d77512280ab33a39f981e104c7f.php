<?php $__env->startSection('title','About '.config('app.name')); ?>
<?php $__env->startSection('content'); ?>
    <section class="page-section bg-gradient-gray-light-1 bg-scroll overflow-hidden">

        <!-- Background Shape -->
        <div class="bg-shape-1 wow fadeIn">
            <img loading="lazy" src="colors/images/background/bg-shape-1.svg" alt="" />
        </div>
        <!-- End Background Shape -->
        <h1 class="hero-title-small mb-10 mb-sm-10 wow fadeInUp">About - The Living Colors Studio</h1>
        <div class="container position-relative pt-10 pt-sm-40 text-center">

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h2 class="title-40 mb-40 mb-sm-20 wow fadeInUp">
                        About Us
                    </h2>
                    <p class="section-descr mb-0 wow fadeIn" data-wow-delay="0.2s">
                        At Colors, we believe every image deserves a vibrant story. Founded on the power of visual storytelling, we&#039;re a passionate team of artists and technical wizards dedicated to transforming your photographs and ideas into stunning visuals that captivate and convert.
                    </p>
                </div>
            </div>

        </div>

    </section>
    <!-- End Hero Section -->
    <!-- About Section -->
    <section class="page-section" id="about">

        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="row text-start text-gray mb-80 mb-sm-60">
                        <div class="col-md-6 mb-sm-20 wow linesAnimInLong">
                            <h2 class="section-title-service">

                                Who We Are
                            </h2>
                            <p>
                            <p>It all began a few years back. We have come across people who paid a lot of money for clipping path services, and image and video edits. However, they were not getting what they were supposed to get.&nbsp;</p><p>And that’s why we felt that we should make some changes by creating an agency. An agency that can create images and videos that MATTER.</p>
                            </p>
                        </div>

                        <div class="col-md-6 wow linesAnimInLong">

                            <P>We started Colors in 2001 with a few designers and video editors. Our journey started with a small office first. We boarded a few clients, worked for them, and got their feedback. From then on, Word-of-mouth spread like wildfire, and soon, Colors wasn't just transforming individual images; it was transforming businesses. The team expanded, welcoming like-minded artists and technical wizards who shared their passion for visual storytelling.</P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Images Composition -->
        <div class="possition-relaive">
            <!-- Decorative Line -->
            <div class="bg-line-1 z-index-1">
                <img loading="lazy" src="https://cdn.livingcolors.studio/colors/images/background/line_gradient.svg" alt="" />
            </div>
            <!-- End Decorative Line -->

            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">

                        <div class="composition-7">

                            <div class="composition-7-image-1">
                                <div class="composition-7-border"></div>
                                <div class="composition-7-inner">
                                    <img src="<?php echo e(asset('themes/frontend/assets/images/work/1709618533-65e6b565cce28.webp')); ?>" alt="Image Description" />

                                </div>
                            </div>

                            <div class="composition-7-image-2">
                                <div class="composition-7-border"></div>
                                <div class="composition-7-inner">
                                    <img src="<?php echo e(asset('themes/frontend/assets/images/work/11.webp')); ?>" alt="Image Description" />

                                </div>
                            </div>

                            <div class="composition-7-image-3">
                                <div class="composition-7-border"></div>
                                <div class="composition-7-inner">
                                    <img src="<?php echo e(asset('themes/frontend/assets/images/work/1707924500-65ccdc1416466.webp')); ?>" alt="Image Description" />

                                </div>
                            </div>

                            <div class="composition-7-image-4">
                                <div class="composition-7-border"></div>
                                <div class="composition-7-inner">
                                    <img src="<?php echo e(asset('themes/frontend/assets/images/work/1711094783-65fd3bff26514.webp')); ?>" alt="Image Description" />
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Images Composition -->
    </section>
    <!-- End About Section -->
    <div class="container position-relative">
        <div class="row expand-custom">
            <div class="col-md-6">
                <div class="box-custom">
                    <h3>What Sets Colors Apart?</h3>
                    <ul class="list s1 section-descr">
                        <li>Passionate &amp; Experienced: Our team is driven by a love for visual storytelling and possesses the technical expertise to bring your vision to life.</li>
                        <li>Unwavering Quality: We believe in uncompromising quality, delivering pixel-perfect results that exceed your expectations.</li>
                        <li>Speed &amp; Efficiency: We understand your deadlines and provide fast turnaround times without compromising on craftsmanship.</li>
                        <li>Scalability &amp; Flexibility: Whether you need a single image edited or complex video production, we can adapt to your project's needs.</li>
                        <li>Client-Centric Approach: We collaborate closely with you throughout the process, ensuring your complete satisfaction.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box-custom section-descr">
                    <h3>As our skills evolved, so did our ambition.</h3>
                    <ul class="list s1">
                        <li>What drives us? The belief is that every image deserves a story. We're not just about pixels and polygons; we're about emotions, connections, and ultimately, success. We partner with clients to paint pictures that go beyond words, leaving a lasting impression and propelling them towards their visual aspirations.</li>
                    </ul>

                    <h3>Who We Are</h3>
                    <ul class="list s1">
                        <li>It all began a few years back. We have come across people who paid a lot of money for clipping path services, and image and video edits. However, they were not getting what they were supposed to get.
                            <br>
                            And that’s why we felt that we should make some changes by creating an agency. An agency that can create images and videos that MATTER.</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- WHAT’S NEW -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/photndbs/public_html/resources/views/frontend/about_us/about_us.blade.php ENDPATH**/ ?>