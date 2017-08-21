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
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> <?php echo e($post->created_at->diffForHumans()); ?>

                        <a href="javascript:void(0)" class="likes" data-id="<?php echo e($post->id); ?>"
                                data-user_id="<?php echo e(Auth::id()); ?>"
                                data-liked="<?php $__currentLoopData = $likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if(($like->post_id==$post->id) && ($like->user_id==Auth::id())): ?>
                                    <?php echo e(1); ?>

                                  <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"
                                ><i id="like_color<?php echo e($post->id); ?>"

                                style="color:<?php $__currentLoopData = $likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <?php if(($like->post_id==$post->id) && ($like->user_id==Auth::id())): ?>
                                                     <?php echo e('green'); ?>

                                                 <?php endif; ?>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" class="fa fa-thumbs-up" aria-hidden="true"><span id="likes<?php echo e($post->id); ?>">(<?php echo e($post->likes); ?>)</span></i>
                        </a>
                    </p>

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