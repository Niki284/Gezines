

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Nieuwe Persoon Toevoegen</h1>
        <?php if($errors->any()): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('stamboom.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-4">
                <label for="naam" class="block text-gray-700">Naam</label>
                <input type="text" name="naam" id="naam" class="mt-1 block w-full" value="<?php echo e(old('naam')); ?>" required>
            </div>
            <div class="mb-4">
                <label for="achternaam" class="block text
                -gray-700">Achternaam</label>
                <input type="text" name="achternaam" id="achternaam" class="mt-1 block w-full" value="<?php echo e(old('achternaam')); ?>" required>
            </div>
            <div class="mb-4">
                <label for="achternaam" class="block text
                -gray-700">Achternaam</label>
                <input type="text" name="achternaam" id="achternaam" class="mt-1 block w-full" value="<?php echo e(old('achternaam')); ?>" required>
            </div>
            <div class="mb-4">
                <label for="achternaam" class="block text
                -gray-700">Achternaam</label>
                <input type="text" name="achternaam" id="achternaam" class="mt-1 block w-full" value="<?php echo e(old('achternaam')); ?>" required>
            </div>
           
            <div class="mb-4">
                <label for="geboortedatum" class="block text-gray-700">Geboortedatum</label>
                <input type="date" name="geboortedatum" id="geboortedatum" class="mt-1 block w-full" value="<?php echo e(old('geboortedatum')); ?>" required>
            </div>
            <div class="mb-4">
                <label for="geslacht" class="block text-gray-700">Geslacht</label>
                <select name="geslacht" id="geslacht" class="mt-1 block w-full" required>
                    <option value="Man" <?php echo e(old('geslacht') == 'Man' ? 'selected' : ''); ?>>Man</option>
                    <option value="Vrouw" <?php echo e(old('geslacht') == 'Vrouw' ? 'selected' : ''); ?>>Vrouw</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="vader_id" class="block text-gray-700">Vader</label>
                <select name="vader_id" id="vader_id" class="mt-1 block w-full">
                    <option value="">Geen</option>
                    
                </select>
            </div>
            <div class="mb-4">
                <label for="moeder_id" class="block text-gray-700">Moeder</label>
                <select name="moeder_id" id="moeder_id" class="mt-1 block w-full">
                    <option value="">Geen</option>
                    
                   
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Opslaan
            </button>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\nikit\OneDrive\Bureaublad\gezin\gezin\resources\views/stamboom/create.blade.php ENDPATH**/ ?>