<?php $__env->startSection('main-content'); ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add User
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" action="<?php echo e(route('user.store')); ?>" method="post">
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
                  <label for="name">User Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo e(old('name')); ?>">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo e(old('email')); ?>">
                </div>

                <div class="form-group">
                    <label for="confirmation_password">Contact</label>
                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="<?php echo e(old('contact')); ?>">
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo e(old('password')); ?>">
                </div>

                 <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                 </div>

                 <div class="form-group">
                     <label for="slug">Status</label>
                     <div class="checkbox">
                         <label><input type="checkbox" name="status" value="1"
                         <?php if(old('status')==1): ?>
                            checked
                         <?php endif; ?>
                         >status</label>
                     </div>
                 </div>

                 <div class="form-group">
                 <label>Assign Role</label>
                     <div class="row">
                     <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="col-lg-3">
                         <div class="checkbox">
                             <label><input type="checkbox" name="role[]" value="<?php echo e($role->id); ?>"><?php echo e($role->role); ?></label>
                         </div>
                     </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                 </div>

                <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-warning" href="<?php echo e(route('user.index')); ?>">Back</a>
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