

<?php $__env->startSection('content'); ?>
    <h1>Buat Task Baru</h1>

    <form action="<?php echo e(route('tasks.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="due_date">Tanggal Jatuh Tempo</label>
            <input type="date" name="due_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="number" name="user_id" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Downloads\TUGAS11\TUGAS11\task-manager\resources\views/tasks/show.blade.php ENDPATH**/ ?>