<?php $__env->startSection('title','Contact Us'); ?>
<?php $__env->startSection('content'); ?>
    <!-- ==== banner section start ==== -->
    <section class="common-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="common-banner__content text-center">
                        <h2 class="title-animation">Contact Us</h2>
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
                    Contact Us
                </li>
            </ol>
        </nav>
    </section>

    <section class="contact contact-main volunteer pt-120 pb-80">
        <div class="container">
            <div class="row gutter-40">
                <div class="col-12 col-lg-5 col-xl-4">
                    <div class="contact__content">
                        <div class="section__header mb-55" data-aos="fade-up" data-aos-duration="1000">
                            <span>Get In Touch</span>
                            <h2 class="title-animation">Contact Us</h2>
                        </div>
                        <div class="topbar__item mt-60">
                            <div class="topbar__item-single" data-aos="fade-up" data-aos-duration="1000">
                                <div class="topbar__item-single__icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="topbar__item-single__content">
                                    <span>Call Us:</span>
                                    <p><a href="tel:<?php echo e($contactInformation->mobile_no ?? ''); ?>"><?php echo e($contactInformation->mobile_no ?? ''); ?></a></p>
                                </div>
                            </div>
                            <div class="topbar__item-single" data-aos="fade-up" data-aos-duration="1000"
                                 data-aos-delay="200">
                                <div class="topbar__item-single__icon">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="topbar__item-single__content">
                                 <span>E-Mail us:
                                 </span>
                                    <p><a href="mailto:<?php echo e($contactInformation->email ?? ''); ?>"><?php echo e($contactInformation->email ?? ''); ?></a></p>
                                </div>
                            </div>
                            <div class="topbar__item-single" data-aos="fade-up" data-aos-duration="1000"
                                 data-aos-delay="400">
                                <div class="topbar__item-single__icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div class="topbar__item-single__content">
                                <span>Address</span>
                                    <p><a href="https://maps.app.goo.gl/1PQ1JmL7HUYEvQvq7" target="_blank">380
                                            <?php echo e($contactInformation->address ?? ''); ?></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7 offset-xl-1 col-xl-7">
                    <div class="contact__form volunteer__form checkout__form" data-aos="fade-up"
                         data-aos-duration="1000" data-aos-delay="100">
                        <div class="volunteer__form-content">
                            <h4 class="title-animation">Fill Up The Form</h4>
                            <?php if(Session::has('message')): ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><?php echo e(Session::get('message')); ?>

                                </div>
                            <?php endif; ?>
                            <?php if(Session::has('error')): ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><?php echo e(Session::get('error')); ?>

                                </div>
                            <?php endif; ?>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="text-danger"><?php echo e($error); ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <form enctype="multipart/form-data" class="mt-60" action="<?php echo e(route('contact_us')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="input-single">
                                <input type="text" value="<?php echo e(old('name')); ?>" name="name" id="name" placeholder="Enter Name" required>
                                <i class="fa-solid fa-user"></i>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger with-errors"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="input-single">
                                <input type="text" value="<?php echo e(old('subject')); ?>" name="subject" id="subject" placeholder="Enter Subject" required>
                                <i class="fa-solid fa-info"></i>
                                <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger with-errors"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="input-single">
                                <input type="email" value="<?php echo e(old('email')); ?>" name="email" id="email" placeholder="Enter Email" required>
                                <i class="fa-solid fa-envelope"></i>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger with-errors"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="input-single">
                                <input type="text" value="<?php echo e(old('mobile_no')); ?>" name="mobile_no" id="mobile_no" placeholder="Mobile Number"
                                       required>
                                <i class="fa-solid fa-phone"></i>
                                <?php $__errorArgs = ['mobile_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger with-errors"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="input-single alter-input">
                              <textarea name="message" id="message"
                                        placeholder="Your Message..."><?php echo e(old('message')); ?></textarea>
                                <i class="fa-solid fa-comments"></i>
                                <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger with-errors"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-cta">
                                <button type="submit" aria-label="submit message" title="submit message"
                                        class="btn--secondary" data-text="Send Message"><span>Send Message</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="contact-map pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="map-inner" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1079.981752500218!2d88.39911438563281!3d24.4295735175144!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fbc7741686b0dd%3A0x890657249fe306d!2sBasudebpur%20%2C%20godagari%20%2CRajshahi!5e0!3m2!1sen!2sbd!4v1739854504018!5m2!1sen!2sbd"
                            width="100" height="800" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\surjeralo\resources\views/frontend/contact_us.blade.php ENDPATH**/ ?>