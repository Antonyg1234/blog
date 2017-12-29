<?php $__env->startSection('main-css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('admin/plugins/select2/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Post
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Post</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" action="<?php echo e(route('post.store')); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

              <div class="box-body">
              <?php if($errors->any()): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="alert alert-danger">
                            <p><?php echo e($error); ?></p>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?>
               <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control" name="title" id="title" onKeyPress="KeyPress()" placeholder="Title">
                 
                </div>
                <div class="form-group">
                  <label for="sub_title">Post Sub Title</label>
                  <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Sub Title">
                </div>
                <div class="form-group">
                  <label for="slug">Post Slug</label>
                  <input type="text" class="form-control" name="slug" id="slug" placeholder="Post Slug">
                </div>
                
              </div>
              <div class="col-lg-6">
               <br>
              	<div class="form-group">
                    <div class="checkbox pull-left">
                        <label>
                            <input type="checkbox" name="status" value="1" id="image">Publish
                        </label>
                    </div>

                    <div class="pull-right">
                  <label for="image">File input</label>
                  <input type="file" name="image" id="image">
                    </div>
                </div>

                <br>


                  <div class="form-group" style="margin-top:18px">
                      <label>Select Tags</label>
                      <select class="form-control select2 select2-hidden-accessible" name="tags[]" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">
                          <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </select>
                  </div>

                  <div class="form-group" style="margin-top:18px">
                      <label>Select Categories</label>
                      <select class="form-control select2 select2-hidden-accessible" name="categories[]"  multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">
                          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                  </div>
              </div>
             </div>

             <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Write your post here!
	                <small>Simple and fast</small>
	              </h3>
	              <!-- tools box -->
	              <div class="pull-right box-tools">
	                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	                  <i class="fa fa-minus"></i></button>
	              </div>
	              <!-- /. tools -->
	            </div>
            
	            <div class="box-body pad">
	              <textarea id="editor1" name="body" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
	              
	            </div>
             </div>

             <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                 <a class="btn btn-warning" href="<?php echo e(route('post.index')); ?>">Back</a>
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

<?php $__env->startSection('main-js'); ?>
    <script src="<?php echo e(asset('admin/plugins/select2/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('site/js/likes.js')); ?>"></script>
    <script src="//cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
    <script>
        $(document).ready(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
        });

        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>