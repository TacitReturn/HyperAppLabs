<?php if(session()->has("error")): ?>
    <div class="alert alert-danger">
        <p class="text-center">
            <?php echo e(session()->get("error")); ?>

        </p>
    </div>
<?php endif; ?>
<?php /**PATH /home/forge/hyperapplabs.com/resources/views/partials/errors.blade.php ENDPATH**/ ?>