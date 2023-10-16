<?php $__env->startSection('content'); ?>
<div class="container"></div>

            <div class="card">
                <div class="card-header" style="background-color: #141E46; color: white; ">
                <center>
                    <h3>
                        <b>
                            <font color= white>A D M I N @ K r a t o o h B y G r o u p 1</font>
                        </b>
                    </h3>
                </center>
                </div>

                <div class="card-body" style="background-color: #1F4172; color: white;"><b> 
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

                    <!-- <?php echo e(__('You are logged in!')); ?>


                    You are admin user. -->
                    <div class="card-header" align="center">
                        <a class='btn btn-secondary btn-md' style="background-color: #6499E9; width: 30%;color: white;" href="<?php echo e(route('home')); ?>"><b>User home</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class='btn btn-secondary btn-md' style="background-color: #A084E8; width: 30%;color: white;" href="<?php echo e(route('category.home')); ?>"><b>Categories</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class='btn btn-secondary btn-md' style="background-color: #33BBC5; width: 30%;color: white;" href="<?php echo e(route('admin.search')); ?>"><b>Search</b></a>
                    </div>
                    <?php $i=1;?>
                </b>
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover table-bordereds">
                        <thead>
                            <tr>
                                <th style="text-align:center" scope="col" class="table-dark">#</th>
                                <th style="text-align:center" scope="col" class="table-dark">Pic Profile</th>
                                <th scope="col" class="table-dark">Username</th>
                                <th scope="col" class="table-dark">Name</th>
                                <th scope="col" class="table-dark">Email</th>
                                <th style="text-align:center" scope="col" class="table-dark">Create at</th>
                                <th style="text-align:center" scope="col" class="table-dark">Manage</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="">
                            <th style="text-align:center" scope="row" width="40"><b><?php echo e($i++); ?></b></th>
                                <td style="text-align:center" width="20%"> <img src="<?php echo e(asset($user->path_pic_profile)); ?>"  style=" width: 15%; height: 15%; border: solid 1px #CCC" alt="Profile Picture" /></td>
                                <td><b><?php echo e($user->name); ?></b></td>
                                <?php if($user->first_name != null||$user->last_name != null): ?>
                                    <td><b><?php echo e($user->first_name); ?>&nbsp;<?php echo e($user->last_name); ?></td>
                                <?php else: ?>
                                    <td><b><?php echo e('ไม่มีชื่อ'); ?></b></td>
                                <?php endif; ?>
                                <td><b><?php echo e($user->email); ?></b></td>
                                <td style="text-align:center"><b><?php echo e($user->created_at); ?></b></td>
                                <td style="text-align:center">
                                    <a class='btn btn-outline-primary btn-md' style="color: black; width: 100%;" href="<?php echo e(route('manage.profile', $user->id)); ?>"><b>Data</b></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/adminHome.blade.php ENDPATH**/ ?>