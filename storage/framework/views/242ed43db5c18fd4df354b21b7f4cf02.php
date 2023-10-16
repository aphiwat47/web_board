<?php $__env->startSection('content'); ?>
<div class="container">
            <div class="card">
                <div class="card-header" style="background-color: #B0578D; color: white; " align="center" ><h5><b><?php echo e(__('Search')); ?>

                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                        <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
                        <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
                    </svg></b></h5>
                </div>
                <div class="card">
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

                    <div class="card">
                        <div class="card-header" style="background-color: #D988B9; color: white; " align="left" >
                        <p align="center"><b>Search through the topic name</b></p><hr>
                        <p align="center"><b>Search through the creator name</b></p><hr>
                        <p align="center"><b>Search through the categories name</b></p><hr>
                            <form action="<?php echo e(route('home.search')); ?>" method="GET" align="center">
                                <input type="search" name="search" placeholder="Search Kratooh ....." class="form-control w-100">
                                <button class="btn btn-dark mt-2 " type="submit"><b>Search</b></button>
                            </form> 
                        <br>
                    <?php if(isset($posts)): ?>
                        <?php if($posts != '[]'): ?>
                            <br>
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card">
                                <div class="position-relative">
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
                                                    <img src="<?php echo asset($post->path_image); ?>"  style="width: 30%; height: 30%; border: solid 1px #CCC;" alt="Post Picture">
                                            <?php }?>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                    <i class="bi bi-body-text">
                                        <a class='btn btn-dark' style=" width: 100%; height: 100%; text-align:center; color: white;" href = "<?php echo e(route ('comment.index',$post->id_post)); ?>"><b>
                                        Comment
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-square-dots-fill" viewBox="0 0 16 16">
                                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                            </svg>
                                        </b>
                                        </a>
                                    </i>
                                    </div>
                                </div>
                            </div>
                            <br>                    
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div align="center"style="background-color: ; width: 100%; height: 100%; text-align:center; color: white;">
                                <h3><b>No Information Found.</b></h3>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/myProject/resources/views/search.blade.php ENDPATH**/ ?>