<?php $__env->startSection('title','Contact Us'); ?>
<?php $__env->startSection('content'); ?>
    <!-- Background Shape -->
    <div class="bg-shape-1 wow fadeIn">
        <img loading="lazy" src="https://cdn.livingcolors.studio/colors/images/background/bg-shape-1.svg" alt="background" />
    </div>
    <!-- End Background Shape -->
    <!-- Contact Section -->
    <section class="page-section" id="contact">
        <div class="container contact__us wow fadeInUp" data-wow-delay="0">
            <div class="row">
                <!-- Left Column -->
                <div class="col-md-6 mb-md-50 mb-sm-30 z-index-1 input__section">
                    <h1 class="hero-title-small mb-10 mb-sm-10 wow fadeInUp">Contact- The Living Colors Studio</h1>
                    <h2 class="section-title mb-50 mb-sm-30">
                        Let’s Create <span class="color-primary-1">Experiences!</span>
                    </h2>

                    <i style="display: none;" class="icon-arrow-left backButton"></i>
                    <div class="textSection">
                    </div>

                    <form id="contactForm" action="https://livingcolors.studio/contact-us" method="POST">
                        <input type="hidden" name="_token" value="vWSkE0yBgqohVdCbaLvojU1gg0XiieEAQxtMzvkQ" autocomplete="off">                        <div style="display:none;">
                            <input type="text" name="my_name" id="my_name" value="">
                        </div>
                        <div class="input-group">
                            <label for="name pr-3">Hi! I am Jumman</label>
                            <input class="contactInputCls" type="hidden" name="name" id="name" value="" placeholder=" MP. Martin" required>
                        </div>
                        <div class="input-group">
                            <label for="email">Reach me at  hello@gmail.com</label>
                            <input class="contactInputCls" type="hidden" name="email" id="email" value="" placeholder="  mp.hello@gmail.com" required>
                        </div>
                        <div class="additional-inputs" style="display: none;">
                            <!-- Additional inputs here -->
                            <div class="input-group">
                                <label for="country">Country </label>
                                <input class="contactInputCls" name="country" type="text" id="country" value="" placeholder="  Country" required>
                            </div>
                            <div class="input-group">
                                <label for="phone">Phone Number </label>
                                <input class="contactInputCls" type="text" name="phone" id="phone" value="" placeholder="  Phone Number" required>
                            </div>
                            <div class="input-group">
                                <label for="company_name">Company Name </label>
                                <input class="contactInputCls" type="text" name="company_name" id="company_name" value="" placeholder="  Company Name" required>
                            </div>
                            <div class="input-group">
                                <label for="message">Message </label>
                                <textarea class="contactInputCls" rows="5" id="message" name="message" placeholder="I want to know" style="width: 100%;" required></textarea>
                                <input class="contactInputCls" type="hidden" name="ip" id="ip" value="27.147.202.175">
                                <input type="hidden" name="datetime" value="1745167680">
                            </div>
                            <div class="input-group">
                                <label for="captcha">Enter the code shown below:</label>
                                <div style="display: flex; align-items: center; gap: 10px; margin-top: 5px;">
                                    <div id="captchaText" style="
                                        background: #f5f5f5;
                                        padding: 10px 20px;
                                        font-family: monospace;
                                        font-size: 18px;
                                        letter-spacing: 3px;
                                        border: 1px solid #ddd;
                                        border-radius: 4px;
                                        user-select: none;
                                        min-width: 100px;
                                        text-align: center;
                                    "></div>
                                    <button type="button" id="refreshCaptcha" style="background: none; border: none; cursor: pointer;">
                                        <i class="icon-refresh" style="font-size: 20px;"></i>
                                    </button>
                                </div>
                                <input type="text" id="captcha" name="captcha" class="contactInputCls" style="margin-top: 5px;" required>
                                <span id="captchaError" style="color: red; display: none; font-size: 12px;">Please enter the correct code.</span>
                            </div>
                        </div>
                        <h2 class="link-hover-anim">
                            <button type="submit" class="btn-getstarted btn btn-mod btn-color btn-small btn-circle scrollto request__demo__btn contact__us">Send</button>
                        </h2>
                    </form>
                </div>


                <!-- End Left Column -->
                <!-- Right Column -->
                <div class="col-md-6 mb-md-50 mb-sm-30">
                    <!-- Contact Information -->
                    <div class="row">
                        <div class="col-md-11">
                            <p class="description mb-5 mt-3 m-0">
                            <p>No fake promises. We know we can make changes in your business. We’ve helped businesses grow from scratch. This time, it’s going to be how you stopped by Colors and turned your business into a global symbol. Let us be a part of your success.</p>
                            </p>
                            <!-- Address -->
                            <div class="contact-item mb-30 mb-sm-20">
                                <div class="ci-icon">
                                    <i class="icon-map-marker"></i>
                                </div>
                                <h4 class="ci-title visually-hidden">
                                    Our Address
                                </h4>
                                <div class="ci-text">
                                    41-44, 75 Street, Suite# 1B, Elmhurst, New York – 11373, USA
                                </div>

                            </div>
                            <!-- End Address -->

                            <!-- Email -->
                            <div class="contact-item mb-30 mb-sm-20">
                                <div class="ci-icon">
                                    <i class="icon-send-o"></i>
                                </div>
                                <h4 class="ci-title visually-hidden">
                                    Our Email
                                </h4>
                                <div class="ci-text">
                                    cs@livingcolors.studio
                                </div>

                            </div>
                            <!-- End Email -->

                            <!-- Phone -->
                            <div class="contact-item">
                                <div class="ci-icon">
                                    <i class="icon-phone"></i>
                                </div>
                                <h4 class="ci-title visually-hidden">
                                    Call Us
                                </h4>
                                <div class="ci-text">
                                    +1 (718) 717 2362
                                </div>

                            </div>
                            <!-- End Phone -->

                        </div>
                    </div>
                    <!-- End Contact Information -->
                </div>
                <!-- End Right Column -->

            </div>
        </div>
        <div class="container contact__us">
            <div class="row align-items-end">
                <div class="col-lg-3 col-md-6 text-center"> <!-- Use col-md-6 for medium screens -->
                    <dotlottie-player
                        autoplay
                        mode="bounce"
                        loop
                        src="https://cdn.livingcolors.studio/colors/images/icons/json/others/us_pin.lottie"
                        style="width: 60%; margin: auto;"
                        subframe=""
                    >
                    </dotlottie-player>
                    <h4 class="local_time" id="usaTime">12:48 PM</h4>
                </div>
                <div class="col-lg-3 col-md-6"> <!-- Use col-md-6 for medium screens -->
                    <h3 class="location">USA Office</h3>
                    <p class="address">
                        41-44, 75 Street, Suite# 1B, Elmhurst, New York – 11373, USA
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 text-center"> <!-- Use col-md-6 for medium screens -->
                    <dotlottie-player
                        autoplay
                        mode="bounce"
                        loop
                        src="https://cdn.livingcolors.studio/colors/images/icons/json/others/bd_pin.lottie"
                        style="width: 60%; margin: auto;"
                        subframe=""
                    >
                    </dotlottie-player>
                    <h4 class="local_time" id="bangladeshTime">10:48 PM</h4>
                </div>
                <div class="col-lg-3 col-md-6"> <!-- Use col-md-6 for medium screens -->
                    <h3 class="location">Bangladesh Office</h3>
                    <p class="address">
                        Plot No. 833, Road No. 12, Avenue 4, Dhaka 1216
                    </p>
                </div>
            </div>
        </div>

        <div class="container mt-0 d-none d-lg-block d-xl-block">
            <div class="map">

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\clipping\resources\views/frontend/contact_us.blade.php ENDPATH**/ ?>