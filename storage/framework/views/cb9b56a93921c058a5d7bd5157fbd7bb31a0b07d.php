<?php $__env->startSection('bg-img',Storage::disk('local')->url($slug->image)); ?>
<?php $__env->startSection('heading',$slug->title); ?>
<?php $__env->startSection('sub-title',$slug->subtitle); ?>
<?php $__env->startSection('main-content'); ?>
<article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                  <small>Created at <?php echo e($slug->created_at->diffForHumans()); ?></small>
                    <?php $__currentLoopData = $slug->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <small class="pull-right" style="margin:10px">
                        <?php echo e($category->name); ?>

                        </small>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php echo htmlspecialchars_decode($slug->body); ?>

                    <h3>Cloud Tags</h3>
                    <?php $__currentLoopData = $slug->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <small class="pull-left" style="margin:10px; border-radius:5px; border:1px solid gray; padding:5px">
                            <?php echo e($tag->name); ?>

                        </small>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
</article>

    <hr>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>