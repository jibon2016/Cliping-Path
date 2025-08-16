@extends('layouts.front')
@section('title','Contact Us')
@section('style')
    <style>
        @media (max-width: 767.98px) {
            /* Apply styles for screens smaller than or equal to 991.98px (sm, md, and lg) */
            .contact__us .col-lg-3 {
                text-align: center; /* Center-align text within col-lg-3 columns */
            }
            .local_time {
                margin-top: 0px !important;
            }
        }
        .location {
            font-weight: 600 !important;
        }
        /*.local_time {*/
        /*    margin-top: -35px;*/
        /*    color:indigo;*/
        /*}*/

        .contact__us .container {
            /* display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 110px; */
        }
        /* .contact__us .input-group input, textarea {
            border-left: none;
            border-right: none;
            border-top: none;
            border-bottom: 1px solid #cfcfcf !important;
        }
        .contact__us .input-group {
            margin: 0;
            font-size: 25px;
            width: 100%;
            font-weight: 700;
        } */
        /* CSS */
        .contact__us .input-group {
            margin: 0;
            font-size: 20px;
            width: 100%;
            font-weight: 700;
        }
        .contact__us .input-group input,
        .contact__us .input-group textarea {
            /* margin: 0; */
            /* font-size: 25px; */
            border: none; /* Remove all borders */
            border-bottom: 1px solid transparent; /* Add transparent bottom border */
            outline: none; /* Remove default focus outline */
        }

        .contact__us .input-group input:focus,
        .contact__us .input-group textarea:focus {
            border-bottom: 1px solid #cfcfcf; /* Add bottom border on focus */
        }
        @media (max-width: 760px) {
            .local_time {
                margin-top: -70px !important;
            }
        }
        @media (max-width: 120px) {
            .local_time {
                margin-top: -30px !important;
            }
        }
    </style>
@endsection
@section('content')
    <!-- Background Shape -->
    <div class="bg-shape-1 wow fadeIn">
        <img loading="lazy" src="https://livingcolors.studio/colors/images/background/bg-shape-1.svg" alt="background" />
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
                        Please verify our <span class="color-primary-1">skills!</span>
                    </h2>

                    <i style="display: none;" class="icon-arrow-left backButton"></i>
                    <div class="textSection">
                    </div>
                    <form id="contactForm" action="{{ route('contact_us.post') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <label for="name pr-3">Hi! I am </label>
                            <input class="contactInputCls" type="text" name="name" id="name" placeholder=" MP. Martin" required>
                        </div>
                        <div class="input-group">
                            <label for="email">Reach me at </label>
                            <input class="contactInputCls" type="email" name="email" id="email" placeholder=" mp.hello@gmail.com" required>
                        </div>
                        <div class="additional-inputs" style="display: none;">
                            <!-- Additional inputs here -->
                            <div class="input-group">
                                <label for="phone">Country </label>
                                <input class="contactInputCls" name="country" type="text" id="country" placeholder=" Country" required>
                            </div>
                            <div class="input-group">
                                <label for="phone">Phone Number </label>
                                <input class="contactInputCls" type="text" name="phone" id="phone" placeholder=" Phone Number" required>
                            </div>
                            <div class="input-group">
                                <label for="phone">Company Name </label>
                                <input class="contactInputCls" type="text" name="company_name" id="company_name" placeholder=" Company Name" required>
                            </div>
                            <div class="input-group">
                                <label for="message">Message </label>
                                <textarea class="contactInputCls" rows="5" id="message" name="message" placeholder="I want to know" style="width: 100%;" required></textarea>
                            </div>
                            <div class="input-group">
                                <label for="captcha">What is 7 - 10?</label>
                                <span style="display: inline-block; width: 20px;"></span>
                                <input type="number" placeholder="Answer" id="captcha" name="captcha" class="contactInputCls" required>
                                <input type="hidden" name="expected_result" value="-3">
                                <span id="captchaError" style="color: red; display: none; font-size: 12px;">Incorrect CAPTCHA value.</span>
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
                            We don't make Empty promises? We don't just talk; we deliver. We've helped businesses rise from the ground up, and now it's your turn. You can start working with us if you're interested, or send us two files to verify our skills, and watch your business evolve into a global symbol. Let us help you achieve success.
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
                                    {{ $contactInformation->address }}
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
                                    {{ $contactInformation->email }}
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
                                    {{ $contactInformation->mobile_no }}
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
        <div class="container contact__us mt-5">
            <div class="row align-items-end">
                <div class="col-lg-2 col-md-6 text-center"> <!-- Use col-md-6 for medium screens -->
                    <dotlottie-player
                        autoplay
                        mode="bounce"
                        loop
                        src="{{ asset('/json/usa.json') }}"
                        style="width: 60%; margin: auto;"
                        subframe=""
                    >
                    </dotlottie-player>
                    <h4 class="local_time" id="usaTime">12:48 PM</h4>
                </div>
                <div class="col-lg-2 col-md-6"> <!-- Use col-md-6 for medium screens -->
                    <h3 class="location">USA Office</h3>
                    <p class="address">
                        7405 S 45th Dr Laveen, Arizona, USA 85339
                    </p>
                </div>
                <div class="col-lg-2 col-md-6 text-center"> <!-- Use col-md-6 for medium screens -->
                    <img src="{{ asset('/json/qatat.jpeg') }}" alt="qatar">
                    <h4 class="local_time" id="qatarTime">10:48 PM</h4>
                </div>
                <div class="col-lg-2 col-md-6"> <!-- Use col-md-6 for medium screens -->
                    <h3 class="location">Qatar Office</h3>
                    <p class="address">
                        Umm Al Amad, Line-01, Vila-06, Unit-45, Flat-F4, Doha, Qatar
                    </p>
                </div>
                <div class="col-lg-2 col-md-6 text-center"> <!-- Use col-md-6 for medium screens -->
                    <dotlottie-player
                        autoplay
                        mode="bounce"
                        loop
                        src="{{ asset('/json/bd.json') }}"
                        style="width: 60%; margin: auto;"
                        subframe=""
                    >
                    </dotlottie-player>
                    <h4 class="local_time" id="bangladeshTime">10:48 PM</h4>
                </div>
                <div class="col-lg-2 col-md-6"> <!-- Use col-md-6 for medium screens -->
                    <h3 class="location">Bangladesh Office</h3>
                    <p class="address">
                        {{ $contactInformation->address }}
                    </p>
                </div>
            </div>
        </div>

        <div class="container mt-0 d-none d-lg-block d-xl-block">
            <div class="map">
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>

        $('body').on('click', '.contactInputCls', function () {
            $('.textSection').slideUp('slow', function() {
                $('.additional-inputs').slideDown('slow');
                $('.backButton').slideDown('slow');

                // Increase font size of placeholder text
                $('#name').css('font-size', '16px');
            });
        });

        $('body').on('click', '.backButton', function () {
            $('.additional-inputs').slideUp('slow', function() {
                $('.textSection').slideDown('slow');
                $(this).hide();
                $('.backButton').hide();

                // Reset font size of placeholder text
                $('#name').css('font-size', ''); // Reset to default
            });
        });

        // document.getElementById('contactForm').addEventListener('submit', function(event) {
        //     // Get user's input for CAPTCHA
        //     var captchaValue = parseInt(document.getElementById('captcha').value);
        //
        //     // Get expected result
        //     var expectedValue = parseInt("-3"); // Pass expected result from backend
        //
        //     // Check if CAPTCHA is correct
        //     if (captchaValue !== expectedValue) {
        //         // Prevent form submission
        //         event.preventDefault();
        //
        //         // Show error message
        //         document.getElementById('captchaError').style.display = 'block';
        //     }
        // });
        // JavaScript
        function updateTime() {
            // Get the current time for USA
            var usaTime = new Date().toLocaleString('en-US', { timeZone: 'America/New_York', hour12: true, month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' });

            // Get the current time for Bangladesh
            var bdTime = new Date().toLocaleString('en-US', { timeZone: 'Asia/Dhaka', hour12: true, month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' });
            var qatarTime = new Date().toLocaleString('en-US', { timeZone: 'Asia/Qatar', hour12: true, month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' });

            // Log raw date values and formatted times
            // console.log("Raw USA Time:", usaTime);
            // console.log("Raw Bangladesh Time:", bdTime);

            // Update the time elements
            document.getElementById('usaTime').textContent = usaTime;
            document.getElementById('bangladeshTime').textContent = bdTime;
            document.getElementById('qatarTime').textContent = qatarTime;
        }
        // Call updateTime function initially
        updateTime();
        // Update time every second
        setInterval(updateTime, 1000);
    </script>
@endsection
