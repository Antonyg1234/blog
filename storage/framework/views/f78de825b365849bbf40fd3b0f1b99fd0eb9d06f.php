<?php $__env->startSection('main-css'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('admin/plugins/datatables/dataTables.bootstrap.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Posts
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Post Detail</h3>
          <div class="pull-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('posts.create', Auth::user())): ?>
              <a href="<?php echo e(route('post.create')); ?>" class="btn btn-primary">Add New</a>
            <?php endif; ?>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Title</th>
              <th>Sub Title</th>
              <th>Body</th>
              <th>Publish</th>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('posts.update', Auth::user())): ?>
              <th>Edit</th>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('posts.update', Auth::user())): ?>
              <th>Delete</th>
              <?php endif; ?>

            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($loop->index+1); ?></td>
                <td><?php echo e($post->title); ?></td>
                <td><?php echo e($post->subtitle); ?></td>
                <td><?php echo e(str_limit($post->body, $limit = 200, $end = '...')); ?></td>
                <td>Yes</td>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('posts.update', Auth::user())): ?>
                <td><a href="<?php echo e(route('post.edit',$post->id)); ?>" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('posts.delete', Auth::user())): ?>
                <form action="<?php echo e(route('post.destroy',$post->id)); ?>" id="delete-form-<?php echo e($post->id); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('DELETE')); ?>

                </form>
                <td><a href="" onclick="
                          if (confirm('Are You Sure. This will be Deleted'))
                          {
                          event.preventDefault();
                          document.getElementById('delete-form-<?php echo e($post->id); ?>').submit();
                          }
                          else{
                          event.preventDefault();
                          }" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
                <?php endif; ?>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            </tbody>
            <tfoot>
            <tr>
              <th>Sr. No.</th>
              <th>Title</th>
              <th>Sub Title</th>
              <th>Body</th>
              <th>Publish</th>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('posts.update', Auth::user())): ?>
                <th>Edit</th>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('posts.update', Auth::user())): ?>
                <th>Delete</th>
              <?php endif; ?>

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