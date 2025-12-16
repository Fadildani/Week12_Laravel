

<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="pt-4 d-flex justify-content-end align-items-center">
                <h1 class="h2 mr-auto">
                    Info Foto: <?php echo e($photo->title); ?>

                </h1>

                <a href="<?php echo e(url('/photos/'.$photo->id.'/edit')); ?>" class="btn btn-primary">
                    Edit
                </a>

                <form action="<?php echo e(url('/photos/'.$photo->id)); ?>" method="POST">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-danger ml-3">Hapus</button>
                </form>
            </div>

            <hr>

            <?php if(session()->has('pesan')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session()->get('pesan')); ?>

                </div>
            <?php endif; ?>

            <ul>
                <li>Judul Foto: <?php echo e($photo->title); ?></li>
                <li>
                    Gambar:
                    <br>
                    <img 
                        src="<?php echo e(asset('uploads/'.$photo->image)); ?>" 
                        alt="<?php echo e($photo->title); ?>" 
                        width="300"
                        class="img-thumbnail mt-2"
                    >
                </li>
            </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\w12\resources\views/photos/show.blade.php ENDPATH**/ ?>