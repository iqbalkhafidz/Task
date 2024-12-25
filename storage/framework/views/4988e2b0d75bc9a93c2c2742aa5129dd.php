

<?php $__env->startSection('content'); ?>
    <h1>Daftar Kategori</h1>
    <a href="<?php echo e(route('task.create')); ?>" class="btn btn-success">Tambah Kategori</a> Green button

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <!-- Logout Form -->
    <!-- <form action="<?php echo e(route('logout')); ?>" method="POST" style="display: inline;"> -->
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-danger float-end">Logout</button> <!-- Red button -->
    </form>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Button</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($task->id); ?></td>
                    <td><?php echo e($task->name); ?></td>
                    <td><?php echo e($task->slug); ?></td>
                    <td><?php echo e($task->description); ?></td>
                    <td>
                        <a href="<?php echo e(route('category', $task->id)); ?>" class="btn btn-info">Detail</a>

                        <!-- Check if the logged-in user is the owner of the task -->
                        <?php if(Auth::id() === $task->user_id): ?>
                            <a href="<?php echo e(route('category.edit', $task->id)); ?>" class="btn btn-warning">Edit</a>
                            <form action="<?php echo e(route('category.delete', $task->id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEMESTER 3\Pemrograman Berbasis Web 2\Program\task-manager\resources\views/categories/index.blade.php ENDPATH**/ ?>