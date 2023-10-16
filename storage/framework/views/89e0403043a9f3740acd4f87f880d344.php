<?php $__env->startSection('content'); ?>

<div class="container">
    <!-- <div class="row justify-content-center">
        <div class="col-md-8"> -->
            <div class="card">
                <!--<div class="card-header"><?php echo e(__('Create Post')); ?></div>-->
                    <div class="container" style="background-color: #FFADAD; color: white;" align="center" >
                        <h3><b>Admin Edit Profile</b></h3>
                    </div>
                    <div class="container">
                    <div class="row justify-content-center">
                        <div class="card">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <form method='POST' action="<?php echo e(route('ad.update.profile',$data1->id)); ?>"  enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field("PUT"); ?>
                                <br>
                                <?php $__errorArgs = ['image_profile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="my-2" >
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                
                                <div align="center">
                                    <div class="circle" >
                                        <img src="<?php echo e(asset($data1->path_pic_profile)); ?>"  style=" width: 100%; height:100%; border: solid 1px #CCC" alt="Profile Picture"/>
                                    </div>
                                </div>
                                <br>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="my-2">
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <div class="form-floating mb-3 ">
                                    <input type="text" class="form-control w-100 " id="floatingInput"  name="name" placeholder="" value="<?php echo e($data1->name); ?>">
                                    <label for="floatingInput">Alias / Username <b style="color: red;">*</b></label>
                                </div>
                                <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="my-2">
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <div class="form-floating mb-3 ">
                                    <input type="text" class="form-control w-100 " id="floatingInput"  name="fname" placeholder="" value="<?php echo e($data1->first_name); ?>">
                                    <label for="floatingInput">Firstname <b style="color: red;">*</b></label>
                                </div>
                                <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="my-2">
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <div class="form-floating mb-3 ">
                                    <input type="text" class="form-control w-100 " id="floatingInput"  name="lname" placeholder="" value="<?php echo e($data1->last_name); ?>">
                                    <label for="floatingInput">Lastname <b style="color: red;">*</b></label>
                                </div>
                                <?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="my-2">
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <div class="form-floating mb-3 ">
                                    <input type="date" class="form-control w-100 " id="floatingInput"  name="date_of_birth" placeholder="" value="<?php echo e($data1->date_of_birth); ?>">
                                    <label for="floatingInput">Date of birth <b style="color: red;">*</b></label>
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">&nbsp;Input Your Image Profile.</label>
                                    <input class="form-control" type="file" id="formFile" name="image_profile" >
                                </div>

                                <div align="center">
                                <br>
                                <input class="btn btn-danger btn-md " type='reset' value="ยกเลิก">&nbsp;&nbsp;
                                <input class="btn btn-success btn-md " type='submit' value="บันทึก">
                                </div>
                            </form>
                            <br>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/myProject/resources/views/admin/ad_edit_profile.blade.php ENDPATH**/ ?>