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
        Users
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Users Detail</h3>
          <div class="pull-right">
            <a href="{{route('user.create')}}" class="btn btn-primary">Add New</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Name</th>
              <th>Email</th>
              <th>Status</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->status? 'Active':'Inactive'}}</td>
              <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
              <form action="{{route('user.destroy',$user->id)}}" id="delete-form-{{$user->id}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
              </form>
              <td><a href="" onclick="
                        if (confirm('Are You Sure. This will be Deleted'))
                        {
                        event.preventDefault();
                        document.getElementById('delete-form-{{$user->id}}').submit();
                        }
                        else{
                        event.preventDefault();
                        }" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
              </td>

            </tr>
            @endforeach

            </tbody>
            <tfoot>
            <tr>
              <th>Sr. No.</th>
              <th>Name</th>
              <th>Email</th>
              <th>Status</th>
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
