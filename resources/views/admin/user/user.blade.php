@extends('admin.app')

@section('main-content')

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
            
            <form role="form" action="{{route('user.store')}}" method="post">
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
                  <label for="name">User Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{old('name')}}">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email')}}">
                </div>

                <div class="form-group">
                    <label for="confirmation_password">Contact</label>
                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="{{old('contact')}}">
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{old('password')}}">
                </div>

                 <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                 </div>

                 <div class="form-group">
                     <label for="slug">Status</label>
                     <div class="checkbox">
                         <label><input type="checkbox" name="status" value="1"
                         @if(old('status')==1)
                            checked
                         @endif
                         >status</label>
                     </div>
                 </div>

                 <div class="form-group">
                 <label>Assign Role</label>
                     <div class="row">
                     @foreach($roles as $role)
                     <div class="col-lg-3">
                         <div class="checkbox">
                             <label><input type="checkbox" name="role[]" value="{{$role->id}}">{{$role->role}}</label>
                         </div>
                     </div>
                     @endforeach
                     </div>
                 </div>

                <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-warning" href="{{route('user.index')}}">Back</a>
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