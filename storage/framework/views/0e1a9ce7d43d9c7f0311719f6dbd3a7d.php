<?php $__env->startSection('content'); ?>
<div class="container">
    <!-- <div class="row justify-content-center">
        <div class="col-md-8"> -->
            <div class="card" style="background-color: #9D76C1;">
            <div cass="card-header" style="background-color: #713ABE; color: white;" align="center">
                <h3><b><?php echo e(__('Admin Manage Comment')); ?></b></h3>
            </div>
                <div class="card-body" >
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if($message = Session::get('success')): ?>  
                        <div class="alert alert-success alert-block">     
                            <strong><?php echo e($message); ?></strong>  
                        </div>  
                    <?php endif; ?>
                    <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <div class="">
                        <div class="card-header" style="background-color: #E5BEEC;" align="left" >
                             <h5><img src="<?php echo e(asset($post->path_pic_profile)); ?>"  style=" width: 100px; height: 100px; border: solid 1px #CCC" alt="Profile Picture"/></h5>
                        </div>
                    </div>
                    <div class="position-absolute top-0 end-0">
                        <div class="card-header" style="background-color: #917FB3; color: white;">
                             <b>Creater : </b> <?php echo e($post->name); ?> <br> 
                             <b>Create On : </b>  <?php echo e($post->time_update); ?> <br> 
                             <b>Category : </b> <?php echo e($post->name_category); ?>

                        </div>
                    </div>
                    <div class="">
                        <div class="card-body" style="background-color: #FDE2F3;" >
                            <h5> <b>Title : </b> <?php echo e($post->title); ?></h5>
                            <hr>
                            <h5> <b>Content : </b> <?php echo e($post->content); ?></h5>
                            <hr>
                            <div align='center'>
                            <?php if ($post->path_image != '') { ?>
                                <img src="<?php echo asset($post->path_image); ?>"style="width: 30%; height: 30%; border: solid 1px #CCC;" alt="Post Picture">
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
            <br>
            <div class="card">
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card-header" style="background-color: #9EDDFF;"><b><?php echo e(__('From')); ?></b></div>
                    <div class="position-relative">
                        <div class="">
                                <div class="card-header" style="background-color: #A6F6FF;" align="left" >
                                    <h5><img src="<?php echo e(asset($comment->path_pic_profile)); ?>"  style=" width: 100px; height: 100px; border: solid 1px #CCC" alt="Profile Picture"/></h5>
                                </div>
                        </div>
                        <div class="position-absolute top-0 end-0">
                                <div class="card-header" style="background-color: #917FB3; color: white;">
                                    <b>Commenter : </b> <?php echo e($comment->name); ?> <br>
                                    <b>Create On : </b>  <?php echo e($comment->time_update); ?> <br> 
                                </div>
                        </div>
                        <div class="">
                            <div class="card-header" style="background-color: #BEFFF7;">
                            <h5><b><?php echo e(__('Comment :')); ?> </b> <?php echo e($comment->comment); ?> </h5>
                                <hr>
                                <div align='center'>
                                <?php if ($comment->path_pic_comm != '') { ?>
                                    <img src="<?php echo asset($comment->path_pic_comm); ?>"
                                    style="width: 30%; height: 30%; border: solid 1px #CCC;" alt="Post Picture">
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                            <div class="" style="background-color: #BEFFF7;" align="center">
                                
                                <form method="POST" action="<?php echo e(route('ad.delete.comm', $comment->id_comment)); ?>" class="delete-comment-form">
                                    <a class='btn btn-warning btn-md' style="color: white; width: 600px;" href="<?php echo e(route('ad.edit.comm', $comment->id_comment)); ?>"><b>Edit</b></a>
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field("DELETE"); ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-danger btn-md delete-comment-btn" style="color: white; width: 600px;" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var deleteButtons = document.querySelectorAll(".delete-comment-btn");
        deleteButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                if (confirm("Are you sure you want to delete this comment?")) {
                    var form = button.closest(".delete-comment-form");
                    form.submit();
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/myProject/resources/views/admin/ad_manage_comm.blade.php ENDPATH**/ ?>