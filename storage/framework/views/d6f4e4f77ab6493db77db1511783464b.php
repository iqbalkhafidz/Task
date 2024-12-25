

<?php $__env->startSection('content'); ?>
    <h1>Edit Task</h1>

    <!-- Tampilkan error jika ada -->
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('tasks.update', $task->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        
        <div class="form-group">
            <label for="title">Judul:</label>
            <input type="text" name="title" class="form-control" id="title" value="<?php echo e($task->title); ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea name="description" class="form-control" id="description" rows="3" required><?php echo e($task->description); ?></textarea>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" <?php echo e($task->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                <option value="in_progress" <?php echo e($task->status == 'in_progress' ? 'selected' : ''); ?>>In Progress</option>
                <option value="completed" <?php echo e($task->status == 'completed' ? 'selected' : ''); ?>>Completed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="due_date">Jatuh Tempo:</label>
            <input type="date" name="due_date" class="form-control" id="due_date" value="<?php echo e($task->due_date); ?>" required>
        </div>

        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" class="form-control" id="user_id" value="<?php echo e($task->user_id); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FAUZAN ZAKY\Documents\Semester 3\Web\TUGAS11\task-manager\resources\views/tasks/edit.blade.php ENDPATH**/ ?>