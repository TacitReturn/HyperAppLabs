<link rel="stylesheet" type="text/css" href="trix.css">
<style>
    table {
        table-layout: fixed;
        over-flow: break-word;
        width: 100%;
    }
</style>
<?php $__env->startSection("content"); ?>
    <div class="d-flex justify-content-end mb-2">
        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success">Create Product</a>
    </div>
    <div class="card card-default">
        <div class="card-header">Products</div>
        <div class="card-body">
            <?php if($products->count() > 0): ?>
                <table class="table w-full">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Published Date</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($product->title); ?></th>
                            <td colspan="1">
                                <?php echo e($product->published_at); ?>

                            </td>
                            <td colspan="1">
                                <img
                                        src="<?php echo e(secure_asset('storage/'.$product->image)); ?>"
                                        alt="post image"
                                        height="60" width="60">
                            </td>
                            <td class="text-sm" colspan="1">
                                <a class="btn btn-success btn-sm" href="#"><?php echo e($product->title); ?></a>
                            </td>














                            <td colspan="">
                                <button onclick="handleDelete(<?php echo e($product->id); ?>)" type="button"
                                        class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal">

                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete post</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this post?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">No</button>
                                        <form method="POST" id="formProductId">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field("DELETE"); ?>
                                            <button type="submit" class="btn btn-danger">

                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="text-center">
                    <p class="lead">No Products</p>
                </div>
        <?php endif; ?>
        <!-- Button trigger modal -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("scripts"); ?>
    <script>
      function handleDelete (id) {
        let form = document.getElementById("formProductId")
        form.action = "/products/" + id
      }
    </script>
    <script type="text/javascript" src="trix.js" defer></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/forge/hyperapplabs.com/resources/views/products/index.blade.php ENDPATH**/ ?>