@extends('admin.app')
@section('main-css')
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap.css')}}">
@endsection
@section('main-content')
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
            @can('posts.create', Auth::user())
              <a href="{{route('post.create')}}" class="btn btn-primary">Add New</a>
            @endcan
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
              @can('posts.update', Auth::user())
              <th>Edit</th>
              @endcan
              @can('posts.delete', Auth::user())
              <th>Delete</th>
              @endcan

            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->subtitle}}</td>
                <td>{{str_limit($post->body, $limit = 200, $end = '...')}}</td>
                <td>Yes</td>

                @can('posts.update', Auth::user())
                <td><a href="{{route('post.edit',$post->id)}}" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                @endcan

                @can('posts.delete', Auth::user())
                <form action="{{route('post.destroy',$post->id)}}" id="delete-form-{{$post->id}}" method="post">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                </form>
                <td><a href="" onclick="
                          if (confirm('Are You Sure. This will be Deleted'))
                          {
                          event.preventDefault();
                          document.getElementById('delete-form-{{$post->id}}').submit();
                          }
                          else{
                          event.preventDefault();
                          }" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
                @endcan
              </tr>
            @endforeach



            </tbody>
            <tfoot>
            <tr>
              <th>Sr. No.</th>
              <th>Title</th>
              <th>Sub Title</th>
              <th>Body</th>
              <th>Publish</th>
              @can('posts.update', Auth::user())
                <th>Edit</th>
              @endcan
              @can('posts.delete', Auth::user())
                <th>Delete</th>
              @endcan

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
@endsection
@section('main-js')
  <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
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
@endsection

