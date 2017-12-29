<?php $__env->startSection('main-css'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('admin/plugins/datatables/dataTables.bootstrap.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Category Detail</h3>
          <div class="pull-right">
            <a href="<?php echo e(route('category.create')); ?>" class="btn btn-primary">Add New</a>
          </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($loop->index+1); ?></td>
                <td><?php echo e($category->name); ?></td>
                <td><?php echo e($category->slug); ?></td>
                <td><a href="<?php echo e(route('category.edit',$category->id)); ?>" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                <form action="<?php echo e(route('category.destroy',$category->id)); ?>" id="delete-form-<?php echo e($category->id); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('DELETE')); ?>

                </form>
                <td><a href="" onclick="
                          if (confirm('Are You Sure. This will be Deleted'))
                          {
                          event.preventDefault();
                          document.getElementById('delete-form-<?php echo e($category->id); ?>').submit();
                          }
                          else{
                          event.preventDefault();
                          }" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            </tbody>
            <tfoot>
            <tr>
              <th>Sr. No.</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-js'); ?>
  <script src="<?php echo e(asset('admin/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>
  <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>