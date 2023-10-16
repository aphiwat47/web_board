<?php $__env->startSection('content'); ?>
<div class="container">
    <!-- <div class="row justify-content-center"> -->
        <!-- <div class="col-md-8"> -->
            <div class="card">
                <!--<div class="card-header"><?php echo e(__('Create Post')); ?></div>-->
                    <div class="container" style="background-color: #FFADAD; color: white;" align="center" >
                        <h3><b>Edit Kratooh</b></h3>
                    </div>
                        <div class="container">
                        <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <form method='POST' action="<?php echo e(route('post.update',$post1->id_post)); ?>" enctype="multipart/form-data"><br>
                                <?php echo csrf_field(); ?>
                                <?php $__errorArgs = ['category'];
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
                                <div>
                                    <b>&nbsp;Categories</b>
                                    <b style="color: red;">*</b>
                                <div>
                                <div class="col-3">
                                    <select class="form-select" name="category" style="width: 400%">
                                        <option value="<?php echo e($post1->id_category); ?>" align="center" selected ><?php echo e($post1->name_category); ?></option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id_category); ?>" align="center"><?php echo e($category->name_category); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <br>
                                <?php echo method_field("PUT"); ?>
                                <?php $__errorArgs = ['title'];
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
                                <div>
                                    <b>&nbsp;Specify the name of your topic, for example, when was the Faculty of Information Science founded? Who knows?</b>
                                    <b style="color: red;">*</b>
                                </div>
                                <div class="form-floating mb-3 ">
                                    <input type="text" class="form-control w-100 " id="floatingInput"  name="title" value="<?php echo e($post1->title); ?>" placeholder="">
                                    <label for="floatingInput">title</label>
                                </div>
                                <?php $__errorArgs = ['content'];
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
                                <div>
                                    <b>&nbsp;Details of your Kratoo</b>
                                    <b style="color: red;">*</b>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="" id="floatingTextarea2" name="content" style="height: 100px" required autocomplete="content" autofocus><?php echo e(old('content', $post1->content)); ?></textarea>
                                    <label for="floatingTextarea2">Content</label>
                                </div>
                                <?php $__errorArgs = ['category'];
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
                                <?php $__errorArgs = ['image_post'];
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
                                <div>
                                    <b>&nbsp;Input Your Image.</b><br>
                                    <b>&nbsp;Ex. .jpeg, .jpg, .png, .gif</b>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile" name="image_post" >
                                    <div align="center">
                                    <br>
                                    <?php if ($post1->path_image == '') { ?>
                                            <p>No pictures in post</p>
                                    <?php }else{ ?>
                                        <img src="<?php echo asset($post1->path_image); ?>" style="width: 30%; height: 30%; border: solid 1px #CCC;" alt="Post Picture">
                                    <?php }?>
                                    </div>
                                </div>
                                <!-- <button class="btn btn-danger" type='reset'>ยกเลิก</button>&nbsp;&nbsp;<button class="btn btn-success" type='บันทึก'>ยกเลิก</button>-->
                                <div align="center">
                                <input class="btn btn-danger btn-ls " type='reset' value="ยกเลิก">&nbsp;&nbsp;
                                <input class="btn btn-success btn-ls " type='submit' value="บันทึก">
                                </div>
                            </form>
                    </div> 
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/myProject/resources/views/edit_post.blade.php ENDPATH**/ ?>