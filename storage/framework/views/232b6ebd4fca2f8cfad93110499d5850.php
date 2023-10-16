<?php $__env->startSection('content'); ?>
<div class="container">
    <!-- <div class="row justify-content-center"> -->
        <!-- <div class="col-md-8"> -->
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <div class="card-header" style="background-color: #73B9D7; color: white;" align="center" ><h3><b><?php echo e(__('Admin Edit Category ')); ?></b></h3></div>
                <div class="container"  style="background-color: #9DE6E8;">
                <form method='POST' action="<?php echo e(route('category.update',($category->id_category))); ?>" ><br>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("PUT"); ?>
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
                        <b>&nbsp;Edit Category</b>
                        <b style="color: red;">*</b>
                    </div>
                    <div class="form-floating mb-3 ">
                        <input type="text" class="form-control w-100 " id="floatingInput" required name="category" placeholder="" value="<?php echo e($category->name_category); ?>" >
                        <label for="floatingInput">category</label>
                    </div>
                    
                    <!-- <button class="btn btn-danger" type='reset'>ยกเลิก</button>&nbsp;&nbsp;<button class="btn btn-success" type='บันทึก'>ยกเลิก</button>-->
                    <div align="center">
                        <input class="btn btn-danger btn-ls " type='reset' value="ยกเลิก">&nbsp;&nbsp;
                        <input class="btn btn-success btn-ls " type='submit' value="บันทึก">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/myProject/resources/views/admin/edit_categories.blade.php ENDPATH**/ ?>