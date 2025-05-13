@extends('layouts.front')
@section('title','All Our Services '.config('app.name'))
@section('content')
    <section data-bgimage="url(https://cdn.livingcolors.studio/colors/images/background/4P.svg) bottom" class="hero-section full-height vertical-center" id="section400">
        <div class="container servicex">
            <div class="row">
                <!-- First Column -->
                <div class="col-lg-6 service-text">
                    <!-- Div 1: Title and Text -->
                    <div class="hero-content">
                    <span class="sub-title-span mb-40 mb-sm-20 wow fadeInUp">
                                                Starting at 0.39$ Per Image
                                            </span>
                        <div class="col-lg-10">
                            <h1 class="hero-title-small mb-10 mb-sm-10 wow fadeInUp">Services - The Living Colors Studio</h1>
                            <h2 class="title-45 wow fadeInUp" data-wow-delay="0.15s">
                                Colors Editing <span class="color-primary-1">Studio</span> Where Visual Meets Versatility
                            </h2>
                            <p class="section-descr mb-50 mb-sm-40 wow fadeInUp" data-wow-delay="0.15s">
                                Simply upload your image, give us a few hours, and Voila! You’ll have the ready-to-sell  picture that brings money to the table.
                            </p>
                        </div>
                    </div>
                    <!-- Div 2: Button (Aligned to bottom) -->
                    <div class="hero-button">
                        <a class="btn-getstarted scrollto pricing__upload-photos" href="index.html">
                            Claim Your Free Trial
                        </a>
                    </div>
                </div>
                <!-- Second Column -->
                <div class="col-lg-6 justify-content-center text-center">
                    <!-- Div 1: Service Background -->
                    <div class="service-hero-image-combination">
                        <div class="service-bg">
                            <dotlottie-player class="center-xy" autoplay loop playMode="normal" src="https://cdn.livingcolors.studio/colors/images/icons/json/BG/cir_ani_green.lottie"></dotlottie-player>
                        </div>
                        <!-- Div 2: Service Hero Image -->
                        <div class="service-hero-img">
                            <img loading="lazy" src="https://cdn.livingcolors.studio/uploads/service-landing/1715751347-664449b375c56.webp" style="z-index: 1;" class="hero--img" width="100%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Service Hero Section -->

    <section class="featured-services items-wrapper">
        <div class="container">
            <div class="row bg-white">

                <div class="row col-md-8 mt-2 services--items" style="background: #b1b1b138; margin-right: 12px;">
                    <div class="col-md-6 p-5">
                        <img loading="lazy" src="https://cdn.livingcolors.studio/uploads/service/landing/item/1708948028-65dc7a3c03d87.webp" alt="">
                    </div>
                    <div class="col-md-6 service__info__section">
                        <h3>Clipping Path</h3>
                        <p>With our hand-drawn clipping paths, you’ll have the perfect picture.</p>

                        <div class="btn__section">
                            <a class="btn-getstarted scrollto view__details__button" target="_blank" href="clipping-path.html">View Details</a>
                            <a class="btn-getstarted scrollto order__now__btn" target="_blank" href="https://order.livingcolors.studio/">Order Now</a>
                        </div>
                    </div>
                </div>












                <div class="col-md-4 text-center mt-2 services--items" style="background: #b1b1b138;">
                    <img loading="lazy" style="width: 60%;" src="https://cdn.livingcolors.studio/uploads/service/landing/item/1710926097-65faa9117a6b8.webp" alt="">

                    <div class="service__info__section">
                        <h3>Background Remove</h3>
                        <p>We’ll remove the background of your image, attach a new one, and make sure it blends.</p>

                        <div class="btn__section">
                            <a class="btn-getstarted scrollto view__details__button" target="_blank" href="background-removal.html">View Details</a>
                            <a class="btn-getstarted scrollto order__now__btn" target="_blank" href="https://order.livingcolors.studio/">Order Now</a>
                        </div>
                    </div>
                </div>












                <div class="row col-md-4 text-center services--items" style="background: #b1b1b138; margin-right: 12px; justify-content: center; margin-top: 13px;">
                    <img loading="lazy" style="width: 60%;" src="https://cdn.livingcolors.studio/uploads/service/landing/item/1710926077-65faa8fdc7959.webp" alt="">

                    <div class="col-md-12 service__info__section">
                        <h3>Photo Retouching</h3>
                        <p>We’ll add the shine your photo has been missing.</p>

                        <div class="btn__section">
                            <a class="btn-getstarted scrollto view__details__button" target="_blank" href="photo-retouching.html">View Details</a>
                            <a class="btn-getstarted scrollto order__now__btn" target="_blank" href="https://order.livingcolors.studio/">Order Now</a>
                        </div>
                    </div>
                </div>












                <div class="row col-md-8  services--items" style="background: #b1b1b138; margin-left: 1px; margin-top: 13px;">
                    <div class="col-md-6 p-5">
                        <img loading="lazy" src="https://cdn.livingcolors.studio/uploads/service/landing/item/1710144257-65eebb01b3c5e.webp" alt="">
                    </div>
                    <div class="col-md-6 service__info__section">
                        <h3>Product Photo Editing</h3>
                        <p>We’ll edit your product photos and make sure they grab customers.</p>

                        <div class="btn__section">
                            <a class="btn-getstarted scrollto view__details__button" target="_blank" href="product-photo-editing.html">View Details</a>
                            <a class="btn-getstarted scrollto order__now__btn" target="_blank" href="https://order.livingcolors.studio/">Order Now</a>
                        </div>
                    </div>
                </div>











                <div class="row col-md-4 text-center mr-5 services--items" style="background: #b1b1b138; justify-content: center; margin-top: 13px;">
                    <img loading="lazy" style="width: 60%;" src="https://cdn.livingcolors.studio/uploads/service/landing/item/1710144204-65eebacc8c6e4.webp" alt="">

                    <div class="col-md-12 service__info__section">
                        <h3>Shadow Creation</h3>
                        <p>With shadow creation, we can make your product photo look more realistic.</p>

                        <div class="btn__section">
                            <a class="btn-getstarted scrollto view__details__button" target="_blank" href="shadow-creation.html">View Details</a>
                            <a class="btn-getstarted scrollto order__now__btn" target="_blank" href="https://order.livingcolors.studio/">Order Now</a>
                        </div>
                    </div>
                </div>











                <div class="row col-md-4 text-center services--items" style="background: #b1b1b138; justify-content: center; margin-top: 13px; margin-left: 20px; margin-right: 20px;">
                    <img loading="lazy" style="width: 60%;" src="https://cdn.livingcolors.studio/uploads/service/landing/item/1710830363-65f9331bc21e9.webp" alt="">

                    <div class="col-md-12 service__info__section">
                        <h3>Ghost Mannequin</h3>
                        <p>Time to give your garments the perfect human shape without buying an actual mannequin.</p>

                        <div class="btn__section">
                            <a class="btn-getstarted scrollto view__details__button" target="_blank" href="ghost-mannequin.html">View Details</a>
                            <a class="btn-getstarted scrollto order__now__btn" target="_blank" href="https://order.livingcolors.studio/">Order Now</a>
                        </div>
                    </div>
                </div>











                <div class="row col-md-4 text-center services--items" style="background: #b1b1b138; justify-content: center; margin-top: 13px;">
                    <img loading="lazy" style="width: 60%;" src="https://cdn.livingcolors.studio/uploads/service/landing/item/1710830382-65f9332e55268.webp" alt="">

                    <div class="col-md-12 service__info__section">
                        <h3>Color Correction</h3>
                        <p>You don’t have to buy the same product with different color variations. We’ll change the color for you.</p>

                        <div class="btn__section">
                            <a class="btn-getstarted scrollto view__details__button" target="_blank" href="color-adjustment.html">View Details</a>
                            <a class="btn-getstarted scrollto order__now__btn" target="_blank" href="https://order.livingcolors.studio/">Order Now</a>
                        </div>
                    </div>
                </div>

                <div class="row col-md-8 mt-2 services--items" style="background: #b1b1b138; margin-right: 12px;">
                    <div class="col-md-6 p-5">
                        <img loading="lazy" src="../cdn.livingcolors.studio/uploads/service/landing/item/1713941823-6628ad3f19dda.html" alt="">
                    </div>
                    <div class="col-md-6 service__info__section">
                        <h3>Video Editing</h3>
                        <p>Get the cinematic effect to your videos that will grab everyone’s attention.</p>

                        <div class="btn__section">
                            <a class="btn-getstarted scrollto view__details__button" target="_blank" href="video-editing.html">View Details</a>
                            <a class="btn-getstarted scrollto order__now__btn" target="_blank" href="https://order.livingcolors.studio/">Order Now</a>
                        </div>
                    </div>
                </div>












                <div class="col-md-4 text-center mt-2 services--items" style="background: #b1b1b138;">
                    <img loading="lazy" style="width: 60%;" src="https://cdn.livingcolors.studio/uploads/service/landing/item/1710144780-65eebd0c814dc.webp" alt="">

                    <div class="service__info__section">
                        <h3>3D modeling</h3>
                        <p>We’ll create a 3D model of your product as realistic as possible.</p>

                        <div class="btn__section">
                            <a class="btn-getstarted scrollto view__details__button" target="_blank" href="3d-modeling.html">View Details</a>
                            <a class="btn-getstarted scrollto order__now__btn" target="_blank" href="https://order.livingcolors.studio/">Order Now</a>
                        </div>
                    </div>
                </div>







            </div>
        </div>
    </section>
    <!-- First 3 Edits Section -->
    <section class="section-highlight bg-gray-light-1 overflow-hidden">

        <!-- Decoration Circles -->
        <div class="decoration-14"></div>
        <div class="decoration-15"></div>
        <!-- End Decoration Circles -->

        <!-- Decoration Dots -->
        <div class="decoration-16 opacity-015 d-none d-md-block">
            <img loading="lazy" src="colors/images/background/decoration-11.svg" alt="Image Description" />
        </div>
        <div class="decoration-17 opacity-035 d-none d-md-block">
            <img loading="lazy" src="colors/images/background/decoration-11.svg" alt="Image Description" />
        </div>
        <!-- End Decoration Dots -->

        <div class="container position-relative">

            <div class="row">
                <div class="col-md-12">
                    <div class="expand-custom">
                        <div class="row align-items-center">
                            <div class="col-lg-8 offset-md-1 align-items-center wow fadeInLeft" data-wow-delay="0.5s">
                                <h3 class="offer-section"><span class="color-primary-1">3</span> <span class="color-primary-1">Images</span> Are <span class="color-primary-1">Free</span> <span class="color-primary-1">Images</span></h3>
                                <p class="section-descr">
                                    As a welcoming gift, we’ll get you the first 3 image edits for free. No, we won’t be needing your credit card details. All you need to do is Sign Up.
                                </p>
                            </div>
                            <div class="col-lg-2 d-none d-lg-block d-xl-block text-center wow fadeInRight zoom" data-wow-delay="0s">
                                <dotlottie-player class="icon-lottie" autoplay loop playMode="normal"
                                                  src="https://cdn.livingcolors.studio/colors/images/icons/json/others/upload.lottie">
                                </dotlottie-player>
                                <a class="btn btn-mod btn-color btn-small btn-circle" href="index.html">
                                    Snag Free Samples
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End First 3 Edits Section -->
    <!-- Why Choose Us Section -->
    <section class="page-section bg-light-alpha-10 bg-scroll" style="background-image: url(colors/images/background/3x.svg)">
        <div class="container position-relative">

            <!-- Grid -->
            <div class="row mt-n30 wow fadeInUp">

                <div class="col-md-12 wow fadeInLeft text-center" data-wow-delay="0s">
                    <h3 class="section-title-service mb-30 mb-xs-20 wow fadeInUp">
                        Why <span class="color-primary-1">Choose</span> Us
                    </h3>
                    <p class="section-descr">

                    </p>
                </div>
                <div class="spacer-full"></div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card border-0 mb-4" style="min-height: 350px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div style="width: 40%; margin-left: auto; margin-right: auto;; position: relative; overflow: hidden;" class="">
                                            <div class="lottie-loader" id="loader-lottieContainer624051305"></div>
                                            <div id="lottieContainer624051305" style="height: 100%; min-height: 100px;"></div>
                                        </div>

                                        <h4>Faster Delivery</h4>
                                        <p class="description txt-lim4">
                                            Our TAT is flexible— 24 hours to 48 hours MAX for no race against time. For emergencies, WE LET YOU CHOOSE.  Urgent deliveries within ASAP 1 hour, 4 hours, and 10 hours; you demand it, we do it.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 mb-4" style="min-height: 350px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div style="width: 40%; margin-left: auto; margin-right: auto;; position: relative; overflow: hidden;" class="">
                                            <div class="lottie-loader" id="loader-lottieContainer144625252"></div>
                                            <div id="lottieContainer144625252" style="height: 100%; min-height: 100px;"></div>
                                        </div>

                                        <h4>No Mediocre AI</h4>
                                        <p class="description txt-lim4">
                                            Every project is closely carried out, monitored, and edited by HUMANS. We don’t hate AI; we simply prioritize hand-crafted works to make your images ‘picture perfect’.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 mb-4" style="min-height: 350px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div style="width: 40%; margin-left: auto; margin-right: auto;; position: relative; overflow: hidden;" class="">
                                            <div class="lottie-loader" id="loader-lottieContainer413871719"></div>
                                            <div id="lottieContainer413871719" style="height: 100%; min-height: 100px;"></div>
                                        </div>

                                        <h4>24/7 Support</h4>
                                        <p class="description txt-lim4">
                                            Rest assured, our dedicated team is always available to swiftly address your queries. Just reach out, and we&#039;ll provide immediate assistance round the clock.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 mb-4" style="min-height: 350px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div style="width: 40%; margin-left: auto; margin-right: auto;; position: relative; overflow: hidden;" class="">
                                            <div class="lottie-loader" id="loader-lottieContainer1003129756"></div>
                                            <div id="lottieContainer1003129756" style="height: 100%; min-height: 100px;"></div>
                                        </div>

                                        <h4>Dedicated Team</h4>
                                        <p class="description txt-lim4">
                                            Picture this!  A team working solely for your project. We make sure, the team we assign your project to focuses on you and your project alone. They don’t bat an eye about other project deadlines.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 mb-4" style="min-height: 350px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div style="width: 40%; margin-left: auto; margin-right: auto;; position: relative; overflow: hidden;" class="">
                                            <div class="lottie-loader" id="loader-lottieContainer1281402732"></div>
                                            <div id="lottieContainer1281402732" style="height: 100%; min-height: 100px;"></div>
                                        </div>

                                        <h4>Competitive Price</h4>
                                        <p class="description txt-lim4">
                                            We’re not cheap; we EARN the price even you’ll agree we deserve. We just make sure you don’t have to break your bank to afford us.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 mb-4" style="min-height: 350px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div style="width: 40%; margin-left: auto; margin-right: auto;; position: relative; overflow: hidden;" class="">
                                            <div class="lottie-loader" id="loader-lottieContainer199192893"></div>
                                            <div id="lottieContainer199192893" style="height: 100%; min-height: 100px;"></div>
                                        </div>

                                        <h4>Secured Data</h4>
                                        <p class="description txt-lim4">
                                            Your images are always secured with us. We use firewalls and security that are strong enough to stop all types of unwanted breaches.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Grid -->

        </div>
    </section>
@endsection
