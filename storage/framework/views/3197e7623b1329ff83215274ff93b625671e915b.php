<?php

/**
 * @var array $people
 */

?>
 <?php if(Auth::check()): ?>
<ul>
   
    <?php $__currentLoopData = $people; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="">
            <a href="<?php echo e(route('people.show', $member->id)); ?>" class="relative  <?php echo e($member->gender == 'M' ? 'M' : 'F'); ?>">
                <img src="<?php echo e($member->img); ?>" alt="" class="h-40 w-40 p-2 rounded-xl">
                <h1 class="font-sans text-lg">
                    <?php echo e($member->name); ?> is <?php echo e($member->last_name); ?>

                </h1>
                <data>
                    Birth Date
                    <?php echo e($member->birth_date); ?>

                </data>
               
                
            </a>
            <?php if($member->children->count()): ?>
                <?php echo e(View::make('people.people', ['people' => $member->children])); ?>

            <?php endif; ?>
            <div class="flex items-center gap-0	forme absolute">
                    <a href="<?php echo e(route('people.create', ['parent_id' => $member->id])); ?>">+</a>
                    <a href="<?php echo e(route('people.edit', $member->id)); ?>">Edit</a>
                <form method="post" action="<?php echo e(route('people.destroy', $member->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <input type="submit" value="X" class="cursor-pointer bg-red-500 hover:bg-red-700 text-white font-bold p-1 m-0 rounded">
                </form>
                </div>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
</ul>  <?php endif; ?><?php /**PATH C:\Users\nikit\OneDrive\Bureaublad\TesteGezene\stamboom\resources\views/people/people.blade.php ENDPATH**/ ?>