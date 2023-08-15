<?php $__env->startSection("styles"); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="card card-default">
        <div class="card-header lead text-center pb-5">
            <p><?php echo e(isset($product) ? "Edit post": "Create post"); ?></p>
        </div>
        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="list-group">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form class="m-1" class="mt-5"
              action="<?php echo e(isset($product) ? route('posts.update', $product->id) : route('posts.store')); ?>"
              method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(isset($product)): ?>
                <?php echo method_field("PUT"); ?>
            <?php endif; ?>
            <div class="mb-3">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">









                </select>
            </div>

















            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="<?php echo e(isset($product) ? $product->title : ''); ?>" name="title" type="text"
                       class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" type="text" class="form-control"
                          id="description"><?php echo e(isset($product) ? $product->description : ''); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input value="<?php echo e(isset($product) ? $product->content : ""); ?>" id="content" class="form-control trix-content"
                       type="hidden" name="content">
                <trix-editor class="trix-editor" input="content"></trix-editor>
            </div>
            <div class="mb-3">
                <label for="published_at" class="form-label">Published At</label>
                <input value="<?php echo e(isset($product) ? $product->published_at : ""); ?>" class="form-control" id="published_at"
                       name="published_at" type="text">
            </div>
            <div class="mb-3">
                <?php if(isset($product->image)): ?>
                    <img src="<?php echo e(asset('storage/'.$product->image)); ?>" style="width: 100%" alt="post image">
                    <label for="image" class="form-label">Image</label>
                    <input name="image" type="file" class="form-control" id="image">
                <?php else: ?>
                    <label for="image" class="form-label">Image</label>
                    <input name="image" type="file" class="form-control" id="image">
                <?php endif; ?>
            </div>
            <div>
                <button type="submit" class="btn btn-success btn-block">
                    <?php echo e(isset($product) ? 'Update' : 'Create'); ?> Post
                </button>
            </div>
        </form>
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection("scripts"); ?>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
      flatpickr("#published_at", {
        enableTime: true,
        enableSeconds: true,
      })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

    <script>
      $(document).ready(function() {
        $('.tags-selector').select2();
      });
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/forge/hyperapplabs.com/resources/views/products/create.blade.php ENDPATH**/ ?>