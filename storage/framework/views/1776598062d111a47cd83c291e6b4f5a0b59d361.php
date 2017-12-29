<?php $__env->startSection('bg-img','site/img/about-bg.jpg'); ?>
<?php $__env->startSection('heading','Contact Me'); ?>
<?php $__env->startSection('subtitle','This is what we do!'); ?>
<?php $__env->startSection('main-content'); ?>


<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum molestiae debitis nobis, quod sapiente qui voluptatum, placeat magni repudiandae accusantium fugit quas labore non rerum possimus, corrupti enim modi! Et.</p>
        </div>
    </div>
</div>

<hr>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>