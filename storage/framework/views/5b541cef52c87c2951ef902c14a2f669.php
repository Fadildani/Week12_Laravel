

<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">

            <div class="py-4 d-flex justify-content-end align-items-center">
                <h1 class="h2 mr-auto">Tabel Foto</h1>
                <a href="<?php echo e(route('photos.create')); ?>" class="btn btn-primary">
                    Tambah Foto
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
                        <th>Judul Foto</th>
                        <th>Gambar</th>
                        <th>Tanggal Upload</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th><?php echo e($loop->iteration); ?></th>

                            <td>
                                <a href="<?php echo e(route('photos.show', $photo->id)); ?>">
                                    <?php echo e($photo->title); ?>

                                </a>
                            </td>

                            <td>
                                <?php
                                    $path = public_path('uploads/'.$photo->image);
                                ?>

                                <?php if(file_exists($path)): ?>
                                    <img src="<?php echo e(asset('uploads/'.$photo->image)); ?>"
                                         class="img-thumbnail"
                                         style="max-width: 100px;">
                                <?php else: ?>
                                    <span class="text-danger">File tidak ditemukan</span>
                                <?php endif; ?>
                            </td>

                            <td><?php echo e($photo->created_at->format('d M Y')); ?></td>
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\w12\resources\views/photos/index.blade.php ENDPATH**/ ?>