<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
    <style>
         .button {
            position: absolute;
            top:50%;
            background-color:#0a0a23;
            color: #fff;
            border:none; 
            border-radius:10px; 
            padding:15px;
            min-height:30px; 
            min-width: 120px;
        }
        .button:hover {
            background-color:#002ead;
            transition: 0.7s;
        }
        .circle {
            width: 200px;
            height: 200px;
            background-color: #ccc;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .circle img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 50%;
        }
</style>
</head>
<body style="background-color: #DAFFFB; color: white;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-green shadow-sm">
            <div class="container">
                <?php if(auth()->guard()->guest()): ?>
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <b>
                            <font color='blue'>
                                <?php echo e(config('app.name', 'Laravel')); ?>

                            </font>
                        </b>
                    </a>
                <?php elseif(Auth::user()->is_admin == 1): ?>
                    <a class="navbar-brand" href="<?php echo e(url('/admin/home')); ?>">
                        <b>
                            <font color='blue'>
                                <?php echo e(config('app.name', 'Laravel')); ?>

                            </font>
                        </b>
                    </a>
                <?php else: ?>
                    <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
                        <b>
                            <font color='blue'>
                                <?php echo e(config('app.name', 'Laravel')); ?>

                            </font>
                        </b>
                    </a>
                <?php endif; ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><font color='blue'><b><?php echo e(__('Login')); ?></b></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><font color='blue'><b><?php echo e(__('Register')); ?></b></font></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="d-flex">
                                    <img src="<?php echo asset(Auth::user()->path_pic_profile); ?>" style="width: 40px; height: 40px; border: solid 1px #CCC;" alt="Post Picture">
                            </div>
                                
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                 aria-expanded="false" v-pre><font color='blue'><b><?php echo e(Auth::user()->name); ?>

                                </font></b></a>
                                    <div class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="navbarDropdown" >
                                        <a class="dropdown-item" href="<?php echo e(route('profile.show',Auth::user()->id)); ?>" >
                                        <font color='blue'><b><?php echo e(__('Profile')); ?></b></font</a>

                                        <a class="dropdown-item" href="<?php echo e(route('password.reset')); ?>" >
                                        <font color='blue'><b><?php echo e(__('Change Password')); ?></b></font</a>

                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <font color='blue'>
                                                <b>
                                                    <?php echo e(__('Logout')); ?>

                                                </b>
                                            </font>
                                        </a>
                                    

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-3">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/layouts/app.blade.php ENDPATH**/ ?>