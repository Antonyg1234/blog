<!DOCTYPE html>
<html lang="en">

<head>

    <?php echo $__env->make('site.layouts.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</head>

<body>

   <?php echo $__env->make('site.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php $__env->startSection('main-content'); ?>
    <?php echo $__env->yieldSection(); ?>

    
    <?php echo $__env->make('site.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    

</body>

</html>
