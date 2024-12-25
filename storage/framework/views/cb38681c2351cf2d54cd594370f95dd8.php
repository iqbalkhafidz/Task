

<?php $__env->startSection('content'); ?>
    <h1>Detail Task</h1>

    <div class="card">
        <div class="card-header">
            <h2><?php echo e($task->title); ?></h2>
        </div>
        <div class="card-body">
            <p><strong>Deskripsi:</strong> <?php echo e($task->description); ?></p>
            <p><strong>Status:</strong> <?php echo e(ucfirst($task->status)); ?></p>
            <p><strong>Tanggal Jatuh Tempo:</strong> 
    <?php echo e(\Carbon\Carbon::parse($task->due_date)->format('Y-m-d')); ?>

</p>
            <p><strong>Kategori:</strong> <?php echo e($task->category->name ?? 'Tidak Ada Kategori'); ?></p>
            <p><strong>User ID:</strong> <?php echo e($task->user_id); ?></p>
        </div>
    </div>

    <h2>Riwayat Perubahan Status</h2>
    <ul>
        <?php $__empty_1 = true; $__currentLoopData = $task->histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li>
                <strong>Status:</strong> <?php echo e(ucfirst($history->status)); ?> <br>
                <strong>Tanggal Perubahan:</strong> <?php echo e($history->created_at->format('Y-m-d H:i')); ?> <br>
                <strong>Deskripsi:</strong> <?php echo e($history->description ?? 'Tidak ada deskripsi'); ?>

            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <li>Belum ada riwayat perubahan status.</li>
        <?php endif; ?>
    </ul>

    <a href="<?php echo e(route('tasks.index')); ?>" class="btn btn-secondary">Kembali ke Daftar Task</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\task-manager\resources\views/tasks/show.blade.php ENDPATH**/ ?>