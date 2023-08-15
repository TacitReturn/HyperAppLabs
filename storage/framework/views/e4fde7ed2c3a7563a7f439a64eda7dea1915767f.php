<?php $__env->startSection("title"); ?>
    Hyper App Labs
<?php $__env->stopSection(); ?>
<?php $__env->startSection("header"); ?>
    <!-- Header -->
    <header class="header text-center text-white"
            style="background-image: linear-gradient(to right top, #051937, #14203b, #1f273f, #292e44, #333648);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <p class="lead-5">Welcome to Hyper App Labs</p>
                    <p class="lead-2 opacity-90 mt-6">
                        Learn web development,  CI/CD and more..
                    </p>
                </div>
                <div class="col-md-8 mx-auto">
                    <p class="lead-2 opacity-90 mt-6">
                        Join our email list to get updated when we create new material.
                    </p>
                    <?php if(session("message")): ?>
                        <p class="text-muted">
                            <?php echo e(session("message")); ?>

                        </p>
                    <?php endif; ?>
                    <?php if($errors->any()): ?>
                        <div>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="text-muted">
                                        <?php echo e($error); ?>

                                    </p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('emails.store')); ?>" class="input-group" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="text"
                               class="form-control"
                               name="email"
                               placeholder="email address"
                        >
                        <button type="submit" class="btn btn-success btn-sm">
                            Join
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header><!-- /.header -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
    <!-- Main Content -->
    <main class="main-content">
        <?php echo $__env->make("partials.success", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make("partials.errors", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="section bg-gray">
            <div class="container">
                <div class="m-3">
                    <h6 class="sidebar-title">Search</h6>
                    <form class="input-group" target="#" method="GET">
                        <input type="text"
                               class="form-control"
                               name="client-search"
                               placeholder="Enter a blog title here.."
                               value="<?php echo e(request("client-search")); ?>"
                        >
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-8 col-xl-9">
                        <div class="row gap-y">
                            <?php if($posts->count() > 0): ?>
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6">
                                        <div class="card border hover-shadow-6 mb-6 d-block">
                                            <?php if($post->is_premium): ?>
                                                <div class="m-3">
                                                   <a
                                                   href="<?php echo e(route("blog-post.show", $post->id)); ?>"
                                                   class="m-2 float-right badge badge-pill badge-success">
                                                        Premium
                                                   </a>
                                                </div>
                                            <?php endif; ?>
                                            <img class="card-img-top" src="<?php echo e(secure_asset("storage/{$post->image}")); ?>"
                                                 alt="post image cap">
                                            <div class="p-6 text-center">
                                                <p>
                                                    <a class="small-5 text-lighter text-uppercase ls-2 fw-400"
                                                       href="">
                                                        <?php echo e($post->category->name); ?>

                                                    </a>
                                                </p>
                                                <p class="mb-0 lead-3">
                                                    <a class="text-dark"
                                                       href="<?php echo e(route("blog-post.show", $post->id)); ?>">
                                                        <?php echo e(\Illuminate\Support\Str::limit($post->title, 35)); ?>

                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <p class="lead">
                                    No Posts
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div>
                                <?php echo e($posts->links()); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <div class="sidebar px-4 py-md-0">




                            <hr/>
                            <h6 class="sidebar-title">About</h6>
                            <p class="small-3">
                                <img src="<?php echo e(asset("img/bio-min.jpg")); ?>" alt="bio">
                                <?php echo e($bio->bio); ?>

                            </p>
                            <hr/>
                            <h6 class="sidebar-title">Categories</h6>
                            <div class="row link-color-default fs-14 lh-24">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-6"><a href="<?php echo e(route('blog.index')); ?>">
                                            <?php echo e($category->name); ?>

                                        </a></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <hr>
                            <h6 class="sidebar-title">Tags</h6>
                            <div class="row link-color-default fs-14 lh-24">
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12">
                                        <a href="<?php echo e(route('blog.index')); ?>">
                                            <?php echo e($tag->name); ?>

                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <hr>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.blog", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/forge/hyperapplabs.com/resources/views/welcome.blade.php ENDPATH**/ ?>