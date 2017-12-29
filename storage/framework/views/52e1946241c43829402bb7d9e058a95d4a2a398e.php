<?php $__env->startSection('bg-img',asset('site/img/contact-bg.jpg')); ?>
<?php $__env->startSection('heading','Welcome'); ?>
<?php $__env->startSection('sub-title',''); ?>
<?php $__env->startSection('main-content'); ?>
    <article>
        <div class="container">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>
                    <div class="panel-body">
                        <h1 style="text-align: center">Welcome To Clean Post</h1>
                    </div>
                </div>

            </div>
        </div>
    </article>

    <hr>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('site.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>