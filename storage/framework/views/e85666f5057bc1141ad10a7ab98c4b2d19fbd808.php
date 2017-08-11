<?php $__env->startSection('bg-img','site/img/home-bg.jpg'); ?>
<?php $__env->startSection('heading','Clean Blog'); ?>
<?php $__env->startSection('main-content'); ?>
<!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="post-preview">

                    <a href="<?php echo e(url('posts/'.$post->slug)); ?>">
                        <h2 class="post-title">
                            <?php echo e($post->title); ?>

                        </h2>
                        <h3 class="post-subtitle">
                            <?php echo e($post->subtitle); ?>

                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> <?php echo e($post->created_at->diffForHumans()); ?></p>
                </div>
                <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <?php echo e($posts->links()); ?>

                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <hr>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>