

<?php $__env->startSection('content'); ?>
<div class="creare  max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold mb-6 py-10" >Create User</h1>

    <?php if($errors->any()): ?>
        <div>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <form action="<?php echo e(route('people.store', ['parent_id' =>  $parent_id])); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-4">
            <label for="name"class="block text-gray-700 font-medium">Name</label>
            <input type="text"class="w-full p-2 border border-gray-300 rounded mt-1" id="name" name="name" placeholder="name" require>
        </div>
        
        <div class="mb-4">
            <label for="lastname"class="block text-gray-700 font-medium">Last Name</label>
            <input type="text"class="w-full p-2 border border-gray-300 rounded mt-1" id="lastname" name="last_name" placeholder="last_name"require>
        </div>
        <div class="mb-4">
            <label for="img"class="block text-gray-700 font-medium">foto</label>
            <input type="text"class="w-full p-2 border border-gray-300 rounded mt-1" id="img" name="img" placeholder="img"require>
        </div>

        <div class="mb-4">
            <label for="birth_date"class="block text-gray-700 font-medium">Birth Date</label>
            <input type="date"class="w-full p-2 border border-gray-300 rounded mt-1" id="birth_date" name="birth_date" placeholder="birth_date"require>
        </div>
        <div class="mb-4">
            <label for="birth_place"class="block text-gray-700 font-medium">Birth Place</label>
            <input type="text"class="w-full p-2 border border-gray-300 rounded mt-1" id="birth_place" name="birth_place" placeholder="birth_place"require>
        </div>

        <div class="mb-4">
            <label for="email"class="block text-gray-700 font-medium">Email</label>
            <input type="email"class="w-full p-2 border border-gray-300 rounded mt-1" id="email" name="email" placeholder="email"require>
        </div>
        <div class="mb-4">
            <label for="phone"class="block text-gray-700 font-medium">Phone</label>
            <input type="text"class="w-full p-2 border border-gray-300 rounded mt-1" id="phone" name="phone" placeholder="phone"require>
        </div>
        <div class="mb-4">
            <label for="address"class="block text-gray-700 font-medium">Address</label>
            <input type="text"class="w-full p-2 border border-gray-300 rounded mt-1" id="address" name="address" placeholder="address" require>
        </div>
        <div class="mb-4">
            <label for="city"class="block text-gray-700 font-medium">City</label>
            <input type="text"class="w-full p-2 border border-gray-300 rounded mt-1"id="city" name="city" placeholder="city"require>
        </div>
        <div class="mb-4">
            <label for="country"class="block text-gray-700 font-medium">Contry</label>
            <input type="text" class="w-full p-2 border border-gray-300 rounded mt-1"id="country" name="country" placeholder="country"require>
        </div>
        <div class="mb-4">
            <label for="postal_code"class="block text-gray-700 font-medium">Postal code </label>
            <input type="text"class="w-full p-2 border border-gray-300 rounded mt-1" id="postal_code" name="postal_code" placeholder="postal code"require>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded mt-4">Create</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\nikit\OneDrive\Bureaublad\gezin\gezin\resources\views/people/create.blade.php ENDPATH**/ ?>