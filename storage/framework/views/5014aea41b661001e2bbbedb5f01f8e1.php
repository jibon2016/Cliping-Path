<?php $__env->startSection('title','Profile Update'); ?>
<?php $__env->startSection('content'); ?>
  <div class="card card-default">
        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('profile.edit_post')); ?>" class="mt-6 space-y-6">
            <?php echo csrf_field(); ?>
            <div class="card-header">
                <div class="card-title">Profile Information</div>
            </div>
            <div class="card-body">
                <div class="form-group row <?php echo e($errors->has('name') ? 'has-error' :''); ?>">
                    <label for="name" class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" value="<?php echo e(old('name',$user->name)); ?>" name="name" class="form-control" id="name"
                               placeholder="Enter Name">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="help-block"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="form-group row <?php echo e($errors->has('email') ? 'has-error' :''); ?>">
                    <label for="email" class="col-sm-2 col-form-label">Email  <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="email" value="<?php echo e(old('email',$user->email)); ?>" name="email" class="form-control"
                               id="email" placeholder="Enter Email">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="help-block"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="form-group row <?php echo e($errors->has('username') ? 'has-error' :''); ?>">
                    <label for="username" class="col-sm-2 col-form-label">Username  <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" value="<?php echo e(old('username',$user->username)); ?>" name="username" class="form-control"
                               id="username" placeholder="Enter Username">
                        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="help-block"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="form-group row <?php echo e($errors->has('mobile_no') ? 'has-error' :''); ?>">
                    <label for="mobile_no" class="col-sm-2 col-form-label">Mobile No.</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?php echo e(old('mobile_no',$user->mobile_no)); ?>" name="mobile_no" class="form-control"
                               id="mobile_no" placeholder="Enter Mobile No.">
                        <?php $__errorArgs = ['mobile_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="help-block"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div  class="form-group row <?php echo e($errors->has('profile_photo') ? 'has-error' :''); ?>">
                    <label for="profile_photo" class="col-sm-2 col-form-label">Profile Photo</label>
                    <div class="col-sm-10">
                        <input type="file" name="profile_photo" class="form-control"
                               id="profile_photo">
                        <?php if($user->profile_photo): ?>
                            <br>
                            <img height="80px" src="<?php echo e(asset($user->profile_photo)); ?>" alt="">
                        <?php endif; ?>
                        <?php $__errorArgs = ['profile_photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="help-block"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary bg-gradient-primary btn-sm">Save</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\surjeralo\resources\views/profile/profile_edit.blade.php ENDPATH**/ ?>