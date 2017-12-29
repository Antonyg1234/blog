@extends('admin.app')

@section('main-content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Role
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Role</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form role="form" action="{{route('role.update',$role->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
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
                                        <label for="name">Role Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Title" value="{{$role->role}}">
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="name">Post Permissions</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for=='post')
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="permission[]" value="{{$permission->id}}"
                                                             @foreach($role['permissions'] as $rolePermit)
                                                                 @if($rolePermit->id == $permission->id)
                                                                     checked
                                                                 @endif
                                                              @endforeach
                                                            >{{$permission->name}}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="name">User Permissions</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for=='user')
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="permission[]" value="{{$permission->id}}"
                                                            @foreach($role['permissions'] as $rolePermit)
                                                               @if($rolePermit->id == $permission->id)
                                                                   checked
                                                               @endif
                                                            @endforeach
                                                            >{{$permission->name}}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="name">Other Permissions</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for=='other')
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="permission[]" value="{{$permission->id}}"
                                                            @foreach($role['permissions'] as $rolePermit)
                                                                @if($rolePermit->id == $permission->id)
                                                                  checked
                                                                @endif
                                                            @endforeach

                                                            >{{$permission->name}}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-warning" href="{{route('role.index')}}">Back</a>
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

@endsection