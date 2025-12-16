

<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="py-4 d-flex justify-content-end align-items-center">
                <h1 class="h2 mr-auto">Tabel Jurusan</h1>
                <a href="<?php echo e(url('/jurusans/create')); ?>" class="btn btn-primary">
                    Tambah Jurusan
                </a>
            </div>

            <?php if(session()->has('pesan')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session()->get('pesan')); ?>

                </div>
            <?php endif; ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Jurusan</th>
                        <th>Nama Dekan</th>
                        <th>Jumlah Mahasiswa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $jurusans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jurusan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th><?php echo e($loop->iteration); ?></th>
                            <td>
                                <a href="<?php echo e(url('/jurusans/'.$jurusan->id)); ?>">
                                    <?php echo e($jurusan->nama_jurusan); ?>

                                </a>
                            </td>
                            <td><?php echo e($jurusan->nama_dekan); ?></td>
                            <td><?php echo e($jurusan->jumlah_mahasiswa); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <td colspan="6" class="text-center">Tidak ada data...</td>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\w12\resources\views/jurusan/index.blade.php ENDPATH**/ ?>