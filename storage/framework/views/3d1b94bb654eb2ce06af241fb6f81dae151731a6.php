

<?php $__env->startSection('content'); ?>
<div class="creare  max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold mb-6 py-10" >Create Gallery</h1>

    <?php if($errors->any()): ?>
        <div>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <form action="<?php echo e(route('people.gallery.store', ['people' => $people_id])); ?>" multiple enctype="multipart/form-data" method="POST">
        <?php echo csrf_field(); ?>
        
        <div class="mb-4">
            <label for="images"class="block text-gray-700 font-medium">foto</label>
            <input type="hidden" name="people_id" value="<?php echo e($people_id); ?>">
            <input type="file"class="w-full p-2 border border-gray-300 rounded mt-1" id="images" name="images[]"  multiple require>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded mt-4">Create</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\nikit\OneDrive\Bureaublad\gezin\gezin\resources\views/people_gallery/create.blade.php ENDPATH**/ ?>