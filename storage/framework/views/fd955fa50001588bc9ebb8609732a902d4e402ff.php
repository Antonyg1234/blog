<?php $__env->startSection('main-content'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit USer
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit User</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form role="form" action="<?php echo e(route('user.update',$user->id)); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>

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
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php if(old('name')): ?><?php echo e(old('name')); ?><?php else: ?><?php echo e($user->name); ?><?php endif; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php if(old('email')): ?><?php echo e(old('email')); ?><?php else: ?><?php echo e($user->email); ?><?php endif; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="confirmation_password">Contact</label>
                                            <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="<?php if(old('contact')): ?><?php echo e(old('contact')); ?><?php else: ?><?php echo e($user->contact); ?><?php endif; ?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="slug">Status</label>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="status" value="1"
                                                              <?php if((old('status')==1||$user->status)==1): ?>
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
                                                            <label><input type="checkbox" name="role[]" value="<?php echo e($role->id); ?>"
                                                                <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userRole): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                  <?php if((old('role')==1)||($userRole->id == $role->id)): ?>
                                                                      checked
                                                                  <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                ><?php echo e($role->role); ?></label>
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
            </div>
                <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>