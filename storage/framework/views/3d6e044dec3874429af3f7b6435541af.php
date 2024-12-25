

<?php $__env->startSection('content'); ?>
    <h1>Daftar Task</h1>
    <a href="<?php echo e(route('tasks.create')); ?>" class="btn btn-primary">Tambah Task</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Jatuh Tempo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($task->id); ?></td>
                    <td><?php echo e($task->title); ?></td>
                    <td><?php echo e($task->status); ?></td>
                    <td><?php echo e($task->due_date); ?></td>
                    <td>
                        <a href="<?php echo e(route('tasks.show', $task->id)); ?>" class="btn btn-info">Detail</a>
                        <a href="<?php echo e(route('tasks.edit', $task->id)); ?>" class="btn btn-warning">Edit</a>
                        <form action="<?php echo e(route('tasks.destroy', $task->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FAUZAN ZAKY\Documents\Semester 3\Web\TUGAS11\task-manager\resources\views/tasks/index.blade.php ENDPATH**/ ?>