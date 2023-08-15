<?php if(session()->has("status")): ?>
    <div class="alert alert-success">
        <p class="text-center">
            <?php echo e(session()->get("status")); ?>

        </p>
    </div>
<?php endif; ?>
<?php /**PATH /home/forge/hyperapplabs.com/resources/views/partials/success.blade.php ENDPATH**/ ?>