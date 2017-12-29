@extends('admin.app')

@section('main-content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Tag
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Tag</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" action="{{route('tag.store')}}" method="post">
            {{csrf_field()}}
              <div class="box-body">
               <div class="col-lg-offset-3 col-lg-6">
               @if ($errors->any())
                    @foreach ($errors->all() as $error)
                      <div class="alert alert-danger">
                            <p>{{ $error}}</p>
                      </div>
                    @endforeach
               @endif
                <div class="form-group">
                  <label for="name">Tag Title</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Title">
                </div>
                <div class="form-group">
                  <label for="slug">Tag Slug</label>
                  <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug">
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-warning" href="{{route('tag.index')}}">Back</a>
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

@endsection