<?php $__env->startSection("content"); ?>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><?php echo e(__("Dashboard")); ?></div>

                <div class="card-body d-flex justify-content-between">

                    <form action="admin/deploy-code" method="GET">
                        <button type="submit" class="btn btn-success">Deploy Code</button>
                    </form>
                    <a href="<?php echo e(route("admin.create-user")); ?>" class="btn btn-success">Create User</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/forge/hyperapplabs.com/resources/views/home.blade.php ENDPATH**/ ?>