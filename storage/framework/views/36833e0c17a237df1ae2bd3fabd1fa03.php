

<?php $__env->startSection('content'); ?>
    <h1>Tambah Task</h1>

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

    <form action="<?php echo e(route('tasks.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="title">Judul:</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="due_date">Jatuh Tempo:</label>
            <input type="date" name="due_date" class="form-control" id="due_date" required>
        </div>

        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" class="form-control" id="user_id" required>
        </div>

        <!-- Dropdown untuk kategori -->
        <div class="form-group">
            <label for="category_id">Kategori:</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Pilih Kategori</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Task</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEMESTER 3\Pemrograman Berbasis Web 2\Laporan Praktikum\task-manager\resources\views/tasks/create.blade.php ENDPATH**/ ?>