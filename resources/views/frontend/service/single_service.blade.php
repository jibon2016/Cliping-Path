@extends('layouts.front')
@push('style')
    <link rel="stylesheet" href="{{asset('themes/frontend/assets/css/work.css')}}">
@endpush
@section('title','Clipping Path '.config('app.name'))
@section('content')
    <!-- Service Hero Section -->
    <section data-bgimage="url(https://cdn.livingcolors.studio/colors/images/background/1P.svg) bottom" class="hero-section full-height vertical-center">
        <div class="container servicex">
            <div class="row">
                <!-- First Column -->
                <div class="col-lg-6 service-text">
                    <!-- Div 1: Title and Text -->
                    <div class="hero-content">
                        <h1 class="title-45 mb-40 mb-sm-20 wow fadeInUp">
                            <span class="color-primary-1">Clipping</span> <span class="color-primary-1">Path</span> Services
                        </h1>
                        <div class="col-lg-10">
                    <span class="sub-title wow fadeInUp" data-wow-delay="0.15s">
                        Hand-Drawn Clipping Path That Makes a Difference
                    </span>
                            <p class="section-descr mb-50 mb-sm-40 wow fadeInUp" data-wow-delay="0.15s">
                                Sell stories, not backgrounds. Let our clipping artistry turn your images into powerful product narratives.
                            </p>
                        </div>
                    </div>
                    <!-- Div 2: Button (Aligned to bottom) -->
                    <div class="hero-button">
                        <a href="{{ url('/') }}" class="btn btn-mod btn-circle btn-color btn-large mb-xs-10" data-btn-animate="y">Snag Free Samples</a>
                    </div>
                </div>
                <!-- Second Column -->
                <div class="col-lg-6 justify-content-center text-center">
                    <!-- Div 1: Service Background -->
                    <div class="service-hero-image-combination">
                        <div class="service-bg">
                            <dotlottie-player class="center-xy" autoplay loop playMode="normal" src="{{ asset('/img/cir_ani_purple.lottie') }}"></dotlottie-player>
                        </div>
                        <!-- Div 2: Service Hero Image -->
                        <div class="service-hero-img">
                            <img loading="lazy" src="https://livingcolors.studio/uploads/clipping-path/1714451998-6630761ebb2de.webp" class="img-fluid animated" alt="clipping-path">
                        </div>
                        <!-- Div 3: Service Decoration -->
                        <div class="service-deco">
                            <!-- Content for service decoration -->

                        </div>
                    </div>
                    <div class="service-price-title">
                        <h5 class="price-title">Starting at $0.39 Per Image</h5>
                    </div>
                </div>
            </div>

        </div>
        <!-- Scroll Down -->
        <div class="local-scroll scroll-down-wrap-type-1 wow fadeInUp" data-wow-offset="0">
            <div class="container text-center text-lg-start">
                <a href="#about" class="scroll-down-1">
                    <div class="scroll-down-1-icon">
                        <i class="icon-arrow-down"></i>
                    </div>
                    <div class="scroll-down-1-text">Scroll Down</div>
                </a>
            </div>
        </div>
        <!-- End Scroll Down -->

    </section>
    <!-- End Service Hero Section -->
    <!-- work-->
    <!-- Our Work Section -->
    <section class="page-section bg-light-alpha-10 bg-scroll" style="background-image: url(colors/images/background/3P.svg)">
        <div class="container position-relative">

            <!-- Grid -->
            <div class="row mt-n30 wow fadeInUp">

                <div class="col-md-12 wow fadeInLeft text-center" data-wow-delay="0s">
                    <h3 class="section-title-service mb-30 mb-xs-20 wow fadeInUp">
                        Leave Your <span class="color-primary-1">Project</span> To Us and <span class="color-primary-1">Relax</span>
                    </h3>
                    <p class="section-descr">
                        Don&#039;t settle for generic. We turn each curve, each edge breathtaking.
                    </p>
                </div>

                <div class="col-md-12 wow fadeInUp center-xy" data-wow-delay="0s">
                    <div class="Work pb-0 text-center">
                        <h3 class="section-title-tiny">Explore Our Latest Work</h3>
                        <div class="spacer-single"></div>
                        <div class="work-item-carousel black owl-carousel mb-0">
                            @foreach($service->serviceDetails->attachments->sortBy('sort') as $attachment)
                                <div>
                                    <div class="item {{ $loop->iteration++ % 2 == 0 ? 'even' : 'odd' }}">
                                        <div class="col-sm-12 wow fadeInUp delay-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <a href="{{ asset($attachment->file) }}" class="work-lightbox-link mfp-image">
                                                        <img loading="lazy" src="{{ asset($attachment->file) }}" width="100" height="100" alt="clipping-path Image" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div>
                                <div class="item odd">
                                    <div class="col-sm-12 wow fadeInUp delay-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="" class="work-lightbox-link mfp-image">
                                                    <img loading="lazy" src="https://livingcolors.studio/uploads/clipping-path-slider/1710303823-65f12a4f37537.webp" width="100" height="100" alt="clipping-path Image" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="item even">
                                    <div class="col-sm-12 wow fadeInUp delay-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="" class="work-lightbox-link mfp-image">
                                                    <img loading="lazy" src="https://livingcolors.studio/uploads/clipping-path-slider/1710303838-65f12a5eec3f3.webp" width="100" height="100" alt="clipping-path Image" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="item odd">
                                    <div class="col-sm-12 wow fadeInUp delay-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="" class="work-lightbox-link mfp-image">
                                                    <img loading="lazy" src="https://livingcolors.studio/uploads/clipping-path-slider/1710303823-65f12a4f37537.webp" width="100" height="100" alt="clipping-path Image" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="item even">
                                    <div class="c*ol-sm-12 wow fadeInUp delay-3">
                                        <div class*="card">
                                            <div cl*ass="card-body">
                                                <a h*ref="" class="work-lightbox-link mfp-image">
                                                    <img loading="lazy" src="https://livingcolors.studio/uploads/clipping-path-slider/1710303838-65f12a5eec3f3.webp" width="100" height="100" alt="clipping-path Image" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="item odd">
                                    <div class="col-sm-12 wow fadeInUp delay-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="" class="work-lightbox-link mfp-image">
                                                    <img loading="lazy" src="https://livingcolors.studio/uploads/clipping-path-slider/1710303823-65f12a4f37537.webp" width="100" height="100" alt="clipping-path Image" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="item even">
                                    <div class="col-sm-12 wow fadeInUp delay-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="" class="work-lightbox-link mfp-image">
                                                    <img loading="lazy" src="https://livingcolors.studio/uploads/clipping-path-slider/1710303838-65f12a5eec3f3.webp" width="100" height="100" alt="clipping-path Image" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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
    <!-- End  Our Work Section -->

    <!-- Human / AI Section -->
    <section class="wow fadeInRight animated" data-bgimage="url(https://cdn.livingcolors.studio/colors/images/background/3abc.png) bottom" class="hero-section full-height vertical-center">
        <div class="container position-relative" data-aos="zoom-out">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <h3 class="section-title-service"><span class="color-primary-1">Experience</span> a New Breed of <span class="color-primary-1">Human</span> Creatives!</h3>
                    <p><p>Don’t fall for the average Ctrl+X.&nbsp; While AI can give you ‘somewhat’ of a good image, it still is not enough to bring money to the table.&nbsp;</p><p>If you want images that look professional and bear a symbol of artistic craftsmanship, you need years of experience, creativity, and brainwork PUT TOGETHER.&nbsp;</p><p>After all, it’s ART you’re talking about; something humans are better at.</p></p>
                </div>
            </div>
            <div class="container d-none d-lg-block d-xl-block wow fadeIn infinite">
                <div class="row wow fadeInUp justify-content-center">
                    <!-- Services Tabs -->
                    <div class="col-lg-6 col-xl-4 mb-md-50 mb-sm-30">
                        <ul class="nav nav-tabs services-7-tabs" role="tablist">
                            <li>
                                <a href="#services-item-1a" class="active" aria-controls="services-item-1a" role="tab" aria-selected="true" data-bs-toggle="tab">
                                    <h4 class="services-7-title">
                                        Original Image
                                    </h4>
                                    <div class="services-7-text">
                                        Capture your vision&#039;s essence with the raw, unedited image. Unleash boundless creativity.

                                    </div>
                                    <div class="services-7-arrow"><i class="icon-arrow-right size-24"></i></div>
                                </a>
                            </li>
                            <li>
                                <a href="#services-item-2a" aria-controls="services-item-2a" role="tab" aria-selected="false" data-bs-toggle="tab">
                                    <h4 class="services-7-title">
                                        Color Edit Image
                                    </h4>
                                    <div class="services-7-text">
                                        Elevate visuals with our Color Edit Image. Experience transformative color enhancement.

                                    </div>
                                    <div class="services-7-arrow"><i class="icon-arrow-right size-24"></i></div>
                                </a>
                            </li>
                            <li>
                                <a href="#services-item-3a" aria-controls="services-item-3a" role="tab" aria-selected="false" data-bs-toggle="tab">
                                    <h4 class="services-7-title">
                                        AI Edit Image
                                    </h4>
                                    <div class="services-7-text">
                                        AI enhances visuals, but human experiences and emotions remain irreplaceable.

                                    </div>
                                    <div class="services-7-arrow"><i class="icon-arrow-right size-24"></i></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Services Tabs -->
                    <!-- Services Images  offset-xl-1 -->
                    <div class="col-lg-5 offset-xl-1x">
                        <div class="tab-content position-sticky">
                            <!-- Tab Image -->
                            <div class="tab-pane show fade active" id="services-item-1a" role="tabpanel">
                                <div class="services-7-content">
                                    <div class="services-7-image">
                                        <img loading="lazy" src="https://livingcolors.studio/uploads/clipping-path/1708930110-65dc343eda8d1.webp" alt="Original Image" class="placeholder-image">
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab Image -->

                            <!-- Tab Image -->
                            <div class="tab-pane show fade" id="services-item-2a" role="tabpanel">
                                <div class="services-7-content">
                                    <div class="services-7-image">
                                        <img loading="lazy" src="https://cdn.livingcolors.studio/uploads/clipping-path/1708930449-65dc3591c6601.webp" alt="Color Edit Image" class="placeholder-image">
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab Image -->

                            <!-- Tab Image -->
                            <div class="tab-pane show fade" id="services-item-3a" role="tabpanel">
                                <div class="services-7-content">
                                    <div class="services-7-image">
                                        <img loading="lazy" src="https://cdn.livingcolors.studio/uploads/clipping-path/1708930449-65dc3591c66dc.webp" alt="AI Edit Image" class="placeholder-image">
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab Image -->
                        </div>
                    </div>
                    <!-- End Services Images -->
                </div>
            </div>
            <div class="container d-block d-sm-none  d-md-none">
                <div class="row mt-30 editor-container">
                    <div class="col-md-12">
                        <div class="ai-buttons">
                            <a href="#" class="ai-button active" data-tab="#original">
                                Original
                            </a>
                            <a href="#" class="ai-button" data-tab="#color-edit">
                                Color Edit
                            </a>
                            <a href="#" class="ai-button" data-tab="#ai-edit">
                                AI Edit
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 ai-image-content">
                        <div class="ai-content">
                            <div class="ai-pane fade show active" id="original" role="tabpanel" aria-labelledby="original-tab">
                                <!-- Original image content -->
                                <img loading="lazy" src="https://cdn.livingcolors.studio/uploads/clipping-path/1708930110-65dc343eda8d1.webp" alt="Original Image" class="placeholder-image">
                            </div>
                            <div class="ai-pane fade" id="color-edit" role="tabpanel" aria-labelledby="color-edit-tab">
                                <!-- Color Edit image content -->
                                <img loading="lazy" src="https://cdn.livingcolors.studio/uploads/clipping-path/1708930449-65dc3591c6601.webp" alt="Color Edit Image" class="placeholder-image">
                            </div>
                            <div class="ai-pane fade" id="ai-edit" role="tabpanel" aria-labelledby="ai-edit-tab">
                                <!-- AI Edit image content -->
                                <img loading="lazy" src="https://cdn.livingcolors.studio/uploads/clipping-path/1708930449-65dc3591c66dc.webp" alt="AI Edit Image" class="placeholder-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Human / AI Section -->

    <!-- First Offer Section -->
    <!-- Expart Section -->
    <section class="section-highlight bg-gray-light-1 overflow-hidden">

        <!-- Decoration Circles -->
        <div class="decoration-14"></div>
        <div class="decoration-15"></div>
        <!-- End Decoration Circles -->

        <!-- Decoration Dots -->

        <!-- End Decoration Dots -->

        <div class="container position-relative">

            <div class="row">
                <div class="col-md-12">
                    <div class="expand-custom">
                        <div class="row align-items-center">
                            <div class="col-lg-8  wow fadeInLeft" data-wow-delay="0s">
                                <h4 class="offer-section">
                                    <span class="color-primary-1">Order</span> Your First <span class="color-primary-1">3</span> Edits- It’s On the House!
                                </h4>
                                <p class="section-descr">
                                    Consider this a welcoming gift – We won’t ask you about your Credit Card.
                                </p>
                                <!-- <div class="spacer-half"></div> -->
                                <div class="spacer-double"></div>

                                <div>
                                    <a class="btn btn-mod btn-color btn-small btn-circle" href="index.html">
                                        Upload Photos
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 d-none d-lg-block d-xl-block text-center wow fadeInRight gallery zoom" data-wow-delay="0s">
                                <div class="text-center">
                                    <dotlottie-player class="icon-lottie" autoplay loop playMode="normal"
                                                      src="{{ asset('/img/upload.lottie') }}">
                                    </dotlottie-player>
                                </div>
                            </div>
                            <div class="col-lg-1 d-none d-lg-block d-xl-block text-center wow fadeInTop" data-wow-delay="0s">
                                <span class="toggle"></span>
                            </div>
                        </div>
                        <div class="details">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box-custom">
                                        <h2 class='offer-section-h2 mt-4'>Highlight Your Images with Expert Clipping Path Services</h2><p class='section-descr'>Unlock the full potential of your photos with our professional clipping path services. Whether it's for e-commerce, product catalogs, or marketing materials, our detailed image clipping process ensures that every picture looks crisp and focused. By removing distracting backgrounds and emphasizing your main subject, we help your visuals shine and capture attention.</p><h2 class='offer-section-h2 mt-4'>Precision Object Isolation and Multi Path Techniques</h2><p class='section-descr'>Obtain the clarity and impact of your images with our object isolation and multi path services. We meticulously separate the desired elements from the rest of the photo, allowing for detailed edits and adaptations. This technique is perfect for complex images where precision is crucial, such as in technical illustrations, complex product shots, and creative compositions.</p><h2 class='offer-section-h2 mt-4'>Photo Cut Out and Object Outlining for Clearer Visuals</h2><p class='section-descr'>Make your images pop with our photo cut out and object outlining services. Ideal for professional portfolios, online stores, and promotional content, this service highlights the essential parts of your images by trimming away the excess. Our skilled editors ensure that every cut is clean and every outline is precise, enhancing the overall presentation and effectiveness of your visuals.</p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <a class="btn btn-mod btn-color btn-small btn-circle" href="#">Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- End Expart Section -->    <!-- End First 3 Edits Section -->

    <!-- 3 Steps -->
{{--    <section id="section-highlight" data-bgimage="url(colors/images/background/2P.svg) top">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="text-center">--}}
{{--                        <h3  class="section-title mb-30 mb-xs-20 wow fadeInUp" style="text-align: left;">Multiple <span class="color-primary-1">Clipping Path Services</span> to Meet All Your Editing Needs</h3>--}}
{{--                        <p class="section-descr mb-50 mb-sm-40 wow fadeInUp animated text-left">Multi clipping path services use potent tools. And the visual content of your products can be significantly enhanced with the help of these tools. Complex image multi clipping services are the ones that your business product photos need. It can have a significant impact on your online presence. Multiple clipping path services help increase engagement, conversion rates, and overall business success. You can maximize your business’s development and profitability with high-quality clipping path services.</p>--}}
{{--                        <p class="section-descr mb-50 mb-sm-40 wow fadeInUp animated text-left">We Living Colors is a professional multiple-clipping path provider in the USA. Our experts can quickly turn any picture into a realistic and attractive image. A high-quality image can easily capture the hearts and attention of your audience.</p>--}}
{{--                        <div class="spacer-20"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="spacer-20"></div>--}}
{{--            <div class="col-md-12 text-center">--}}
{{--                <a class="btn btn-mod btn-color btn-large btn-circle scrollto" href="index.html">Get Your Quote</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <!-- End 3 Steps -->
    <!-- FAQ Section -->
    <section class="page-section z-index-1">
        <div class="container position-relative">
            <div class="row position-relative">

                <div class="col-md-4 mb-md-50 mb-sm-30 wow fadeInLeft infinite">

                    <h3 class="section-title mb-30">
                        Frequently Asked <span class="color-primary-1">Questions</span>
                    </h3>

                    <p class="text-gray mb-0">
                        Explore Answers to Common Queries about Our Services.
                    </p>

                </div>

                <div class="col-md-8 mb-md-50 mb-sm-30">
                    <!-- Accordion -->
                    <div class="accordion accordion-flush" id="faqlist">
                        <div class="accordion-item wow fadeInUp infinite" data-wow-delay="200">
                            <h3 class="accordion-header">
                                <button class="accordion-button text-start text-dark fw-medium collapsed sub-title" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                    Do you do deep etching?                            </button>
                            </h3>
                            <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body text-muted">
                                    <p>Yes. We use Photoshop and pen tools for deep etching. First, we create a path around the object and refine it. Then, we remove all the background.</p>                            </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInUp infinite" data-wow-delay="300">
                            <h3 class="accordion-header">
                                <button class="accordion-button text-start text-dark fw-medium collapsed sub-title" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                                    Are my images safe with Living Colors Studio?                            </button>
                            </h3>
                            <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body text-muted">
                                    Yes. Our personnel will sign an NDA (non-disclosure agreement) that your images won’t go outside the workplace. Moreover, we protect all the equipment with a strong firewall.                            </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInUp infinite" data-wow-delay="400">
                            <h3 class="accordion-header">
                                <button class="accordion-button text-start text-dark fw-medium collapsed sub-title" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                                    Is there any minimum order requirement?                            </button>
                            </h3>
                            <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body text-muted">
                                    It doesn’t matter whether you order just 1 image or 1000. We can do either. However, we charge $0.39 per image.                            </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInUp infinite" data-wow-delay="500">
                            <h3 class="accordion-header">
                                <button class="accordion-button text-start text-dark fw-medium collapsed sub-title" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                                    Can I pay weekly/monthly?                            </button>
                            </h3>
                            <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body text-muted">
                                    We take every charge in advance. However, we can make some changes to the discussion, depending on the project we’ll work for.                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Accordion -->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
