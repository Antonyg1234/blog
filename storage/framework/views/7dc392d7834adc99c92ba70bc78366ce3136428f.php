<?php $__env->startSection('main-content'); ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Role
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Role</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" action="<?php echo e(route('role.store')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

              <div class="box-body">
               <div class="col-lg-offset-3 col-lg-6">
               <?php if($errors->any()): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="alert alert-danger">
                            <p><?php echo e($error); ?></p>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?>
                <div class="form-group">
                  <label for="name">User Role</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Role">
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <label for="name">Post Permissions</label>
                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($permission->for=='post'): ?>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="permission[]" value="<?php echo e($permission->id); ?>"><?php echo e($permission->name); ?></label>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="col-lg-4">
                        <label for="name">User Permissions</label>
                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($permission->for=='user'): ?>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="permission[]" value="<?php echo e($permission->id); ?>"><?php echo e($permission->name); ?></label>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="col-lg-4">
                       <label for="name">Other Permissions</label>
                       <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($permission->for=='other'): ?>
                               <div class="checkbox">
                                   <label><input type="checkbox" name="permission[]" value="<?php echo e($permission->id); ?>"><?php echo e($permission->name); ?></label>
                               </div>
                           <?php endif; ?>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>

               <div class="form-group">
                   <button type="submit" class="btn btn-primary">Submit</button>
                   <a class="btn btn-warning" href="<?php echo e(route('role.index')); ?>">Back</a>
               </div>

                </div>
              </div>

             </form>
              <!-- /.box-body -->
            
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
      </div>
    </section>
    <!-- /.content -->
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>