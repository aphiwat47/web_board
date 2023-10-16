<?php $__env->startSection('content'); ?>

<div class="container">
    <!-- <div ass="row justify-content-center">
        <div class="col-md-8"> -->
    <div class="card">
        <div cass="card-header" style="background-color: #FFB7B7; color: white;" align="center">
            <h3><b><?php echo e(__('Profile')); ?></b></h3>
        </div>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php if($message = Session::get('success')): ?>
            <div align="center" style="color: green;" class="alert-alert-success alert-block" >
                <strong><?php echo e($message); ?></strong>
            </div>
        <?php endif; ?>
        <?php if($message = Session::get('error')): ?>
            <div align="center" style="color: red;" class="alert-alert-error alert-block">
                <strong><?php echo e($message); ?></strong>
            </div>
        <?php endif; ?>

        <br>

        <div align="center">
            <div class="circle" >
                <img src="<?php echo e(asset($data1->path_pic_profile)); ?>" style=" width: 100%; height: 100%; border: solid 1px #CCC" alt="Profile Picture" />
            </div>
        </div>
            <div class="card-body" align="center">
                <hr>
                <h4> <B>Username :</B> <?php echo e($data1->name); ?></h4>
                <h4> <B>First Name :</B> <?php echo e($data1->first_name); ?></h4>
                <h4> <B>Last Name :</B> <?php echo e($data1->last_name); ?></h4>
                <h4> <B>Email :</B> <?php echo e($data1->email); ?></h4>
                <h4> <B>Date of birth :</B> <?php echo e($data1->date_of_birth); ?></h4>
                <hr>

                <a class='btn btn-secondary' href="<?php echo e(route('profile.edit',Auth::user()->id)); ?>" style="width: 100%; background-color: #FFB7B7; color: white;" >
                    <h5><b>Edit Profile</b></h5>
                </a>
            </div>
        </div>

<br>
    <div class="card header" style="background-color: #9EDDFF; color: white;" align="center">
            <h3><b><?php echo e(__('MyKratooh')); ?></b></h3>
    </div>
    <div class="card">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card">
            <div class="">
                <div class="card-header" style="background-color: #BEFFF7; color: black;" align="left" >
                    <hr>
                    <h5> <b>Title : </b> <?php echo e($post->title); ?></h5>
                    <hr>
                    <h5> <b>Content : </b> <?php echo e($post->content); ?></h5>
                    <hr>
                    <div align='center'>
                    <?php if ($post->path_image != '') { ?>
                        <img src="<?php echo asset($post->path_image); ?>"
                            style="width: 30%; height: 30%; border: solid 1px #CCC;" alt="Post Picture">
                    <?php } ?>
                    </div>
                </div>
            </div>

            <div class="position-absolute top-0 end-0">
                <div class="card-header" style="background-color: #917FB3; color: white;" align="left">
                    <b>Create On : </b>  <?php echo e($post->time_update); ?> <br>
                    <b>Category : </b>  <?php echo e($post->name_category); ?> 
                </div>
            </div>

            <div>
                <div class="" style="background-color: #BEFFF7;" align="center">
                    <form method="POST" action="<?php echo e(route('post.delete',$post->id_post)); ?>" class="delete-post-form">
                        <a class='btn btn-warning btn-md' style="color: white; width: 600px;" href = "<?php echo e(route ('post.edit',$post->id_post)); ?>" ><b>Edit</b></a>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger btn-md delete-post-btn" style="color: white; width: 600px;" type='submit'><b>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </b></button>
                    </form>
                </div>
            </div>

        </div>
        <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var deleteButtons = document.querySelectorAll(".delete-post-btn");
        deleteButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                if (confirm("Are you sure you want to delete Kratooh? All information will be deleted including every comment under this post?")) {
                    var form = button.closest(".delete-post-form");
                    form.submit();
                }else{
                    event.preventDefault();
                }
            });
        });
    });
</script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/profile.blade.php ENDPATH**/ ?>