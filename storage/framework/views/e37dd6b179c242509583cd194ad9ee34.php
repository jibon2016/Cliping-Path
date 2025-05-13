<?php $__env->startSection('title','User Edit'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">User Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" action="<?php echo e(route('user.update',['user'=>$user->id])); ?>" class="form-horizontal" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card-body">
                        <div class="form-group row <?php echo e($errors->has('name') ? 'has-error' :''); ?>">
                            <label for="name" class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="<?php echo e(old('name',$user->name)); ?>" name="name" class="form-control" id="name" placeholder="Enter Name">
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
                        <div class="form-group row <?php echo e($errors->has('username') ? 'has-error' :''); ?>">
                            <label for="username" class="col-sm-2 col-form-label">Username <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="<?php echo e(old('username',$user->username)); ?>" name="username" class="form-control" id="username" placeholder="Enter Username">
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
                        <div class="form-group row <?php echo e($errors->has('email') ? 'has-error' :''); ?>">
                            <label for="email" class="col-sm-2 col-form-label">Email  <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="email" value="<?php echo e(old('email',$user->email)); ?>" name="email" class="form-control" id="email" placeholder="Enter Email">
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
                        <div class="form-group row <?php echo e($errors->has('mobile_no') ? 'has-error' :''); ?>">
                            <label for="mobile_no" class="col-sm-2 col-form-label">Mobile No.</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?php echo e(old('mobile_no',$user->mobile_no)); ?>" name="mobile_no" class="form-control" id="mobile_no" placeholder="Enter Mobile No.">
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
                        <div class="form-group row <?php echo e($errors->has('password') ? 'has-error' :''); ?>">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password"  autocomplete="off" name="password" class="form-control" id="password" placeholder="Enter Password">
                                <?php $__errorArgs = ['password'];
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
                        <div class="form-group row <?php echo e($errors->has('password_confirmation') ? 'has-error' :''); ?>">
                            <label for="password_confirmation" class="col-sm-2 col-form-label">Password Confirmation</label>
                            <div class="col-sm-10">
                                <input type="password"  name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Enter Password Confirmation">
                                <?php $__errorArgs = ['password_confirmation'];
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

                        <div class="form-group row <?php echo e($errors->has('status') ? 'has-error' :''); ?>">
                            <label class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>

                            <div class="col-sm-10">

                                <div class="icheck-success d-inline">
                                    <input checked type="radio" id="active" name="status" value="1" <?php echo e(empty(old('status')) ? ($errors->has('status') ? '' : ($user->status == '1' ? 'checked' : '')) :
                                            (old('status') == '1' ? 'checked' : '')); ?>>
                                    <label for="active">
                                        Active
                                    </label>
                                </div>

                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="inactive" name="status" value="0" <?php echo e(empty(old('status')) ? ($errors->has('status') ? '' : ($user->status == '0' ? 'checked' : '')) :
                                            (old('status') == '0' ? 'checked' : '')); ?>>
                                    <label for="inactive">
                                        Inactive
                                    </label>
                                </div>

                                <?php $__errorArgs = ['status'];
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
                        <button type="submit" class="btn btn-primary bg-gradient-primary">Save</button>
                        <a href="<?php echo e(route('user.index')); ?>" class="btn btn-danger bg-gradient-danger float-right btn-sm">Cancel</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP-8.2.4\htdocs\surjeralo\resources\views/user/edit.blade.php ENDPATH**/ ?>