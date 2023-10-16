<?php $__env->startSection('content'); ?>
<div class="container">
            <div class="card">
                <div class="card-header" style="background-color: #4B527E; color: white; " align="center" ><h5><b><?php echo e(__('Change Password')); ?></div>
                <div class="card">
                        <div class="card-header" style="background-color: #7C81AD; color: white; " align="left" >
                        <form method="POST" action="<?php echo e(route('password.update')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <label for="old_password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Current Password : ')); ?> <b style="color: red;">*</b></label>
                                <div class="col-md-6">
                                    <input id="old_password" type="password" class="form-control <?php $__errorArgs = ['old_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="old_password"  autocomplete="old_password">

                                    <?php $__errorArgs = ['old_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <br>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('New Password : ')); ?> <b style="color: red;">*</b></label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"  autocomplete="new-password">

                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <br>

                            <div class="form-group row">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password : ')); ?> <b style="color: red;">*</b></label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password_confirmation"  autocomplete="password_confirmation">
                                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="card-body" style="background-color: #7C81AD; color: white; " align="center" >
                                    <button type="submit" class="btn btn-dark" align="center">
                                        <b><?php echo e(__('Reset Password')); ?></b>
                                </button>
                                <br>
                                </div> 
                                <?php if($message = Session::get('error')): ?>
                                    <div class="alert alert-danger alert-block" style="color: red;">
                                        <strong><?php echo e($message); ?></strong>
                                    </div>
                                <?php endif; ?>
                            
                         </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/auth/passwords/reset1.blade.php ENDPATH**/ ?>