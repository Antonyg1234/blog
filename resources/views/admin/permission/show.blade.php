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
        Permissions
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Permissions Detail</h3>
          <div class="pull-right">
            <a href="{{route('permission.create')}}" class="btn btn-primary">Add New</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Permission</th>
              <th>Permission For</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$permission->name}}</td>
              <td>{{$permission->for}}</td>
              <td><a href="{{route('permission.edit',$permission->id)}}" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
              <form action="{{route('permission.destroy',$permission->id)}}" id="delete-form-{{$permission->id}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
              </form>
              <td><a href="" onclick="
                        if (confirm('Are You Sure. This will be Deleted'))
                        {
                        event.preventDefault();
                        document.getElementById('delete-form-{{$permission->id}}').submit();
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
              <th>Permission</th>
              <th>Permission For</th>
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
