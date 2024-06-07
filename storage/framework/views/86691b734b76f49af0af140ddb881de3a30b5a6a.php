

<?php $__env->startSection('content'); ?>
    <div class="detail max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="detail--back">
            <a href="<?php echo e(route('people.index')); ?>">Back</a>
        </div>
      <div class="detail--img">
        <img src="<?php echo e($people->img); ?>" alt="" class="h-80  rounded">
      </div>

      <div class="detail--info">
        <h1>
            <?php echo e($people->name); ?>

            <?php echo e($people->last_name); ?>

        </h1>


        <ul class="flex p-1 gap-1">
            <li>
                <span>
                    Country:
                    <?php echo e($people->country); ?>, 
                    <?php echo e($people->city); ?>,
                    <?php echo e($people->address); ?>,
                </span>
            </li>
            <li>
                <span>
                    Brith Day:
                    <?php echo e($people->birth_day); ?>

                </span>
            </li>
        </ul>

        <ul>
            <li>
                <span>
                    Email:
                    <?php echo e($people->email); ?>

                </span>
            </li>
            <li>
                <span>
                    Phone:
                    <?php echo e($people->phone); ?>

                </span>
            </li>
        </ul>

        <h2>
            History
        </h2>

        <ul>
            <li>
                <span>
                    School:
                    <?php echo e($people->school); ?>

                </span>
            </li>
            <li>
                <span>
                    High School:
                    <?php echo e($people->high_school); ?>

                </span>
            </li>
            <li>
                <span>
                    University:
                    <?php echo e($people->university); ?>

                </span>
            </li>
            <li>
                <span>
                    Job:
                    <?php echo e($people->job); ?>

                </span>
            </li>
            <li>
                <span>
                    Marry:
                    <?php echo e($people->marry); ?>

                </span>
            </li>
        </ul>
      </div>

      <div class="detail__gallery">
        <h2 class="py-4 text-xl	">
            Gallery
        </h2>
       
        <div class="gallery__buttom">
    
            
            <a href="<?php echo e(route('people.gallery.create', ['people' => $people->id])); ?>" class="bg-blue-500 text-white p-2 rounded mt-4">Create Gallery</a>
           
            <ul class="gallery py-4">
                <?php $__currentLoopData = $people->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <img src="<?php echo e($image->images); ?>" alt="" class="h-40 w-40 p-2 rounded-xl	">
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
           

        </div>
      </div>

        
            
    </div>
    
   

   
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\nikit\OneDrive\Bureaublad\gezin\gezin\resources\views/people/show.blade.php ENDPATH**/ ?>