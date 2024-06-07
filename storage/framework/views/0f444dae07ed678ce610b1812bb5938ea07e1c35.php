

<?php $__env->startSection('content'); ?>
    <h1>Edit Person</h1>
    <form method="POST" action="<?php echo e(route('people.update', ['people'=> $people->id])); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e($people->name); ?>">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo e($people->last_name); ?>">
        </div>

        <div class="form-group">
            <label for="img">Image</label>
            <input type="text" class="form-control" id="img" name="img" value="<?php echo e($people->img); ?>">
        </div>

        <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="text" class="form-control" id="birth_date" name="birth_date" value="<?php echo e($people->birth_date); ?>">
        </div>
        <div class="form-group">
            <label for="birth_place">Birth Place</label>
            <input type="text" class="form-control" id="birth_place" name="birth_place" value="<?php echo e($people->birth_place); ?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e($people->email); ?>">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo e($people->phone); ?>">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo e($people->address); ?>">
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" value="<?php echo e($people->city); ?>">
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="country" name="country" value="<?php echo e($people->country); ?>">
        </div>

        <div class="form-group">
            <label for="postal_code">Postcode</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" value="<?php echo e($people->postal_code); ?>">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\nikit\OneDrive\Bureaublad\gezin\gezin\resources\views/people/edit.blade.php ENDPATH**/ ?>