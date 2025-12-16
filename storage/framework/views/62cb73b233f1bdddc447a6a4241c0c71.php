

<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="pt-4 d-flex justify-content-end align-items-center">
                <h1 class="h2 mr-auto">
                    Info Jurusan <?php echo e($jurusan->nama_jurusan); ?>

                </h1>
                <a href="<?php echo e(url('/jurusans/'.$jurusan->id.'/edit')); ?>" class="btn btn-primary">
                    Edit
                </a>
                <form action="<?php echo e(url('/jurusans/'.$jurusan->id)); ?>" method="POST">
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger ml-3">Hapus</button>
                    <?php echo csrf_field(); ?>
                </form>
            </div>

            <hr>

            <?php if(session()->has('pesan')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session()->get('pesan')); ?>

                </div>
            <?php endif; ?>

            <ul>
                <li>Nama Jurusan: <?php echo e($jurusan->nama_jurusan); ?></li>
                <li>Nama Dekan: <?php echo e($jurusan->nama_dekan); ?></li>
                <li>Jumlah Mahasiswa: <?php echo e($jurusan->jumlah_mahasiswa); ?></li>
            </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\w12\resources\views/jurusan/show.blade.php ENDPATH**/ ?>