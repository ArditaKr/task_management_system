@extends('backend.layouts.backend_master')

@section('title','Profile')

@push('css')
<link rel="stylesheet" href="{{ asset('backend') }}/plugins/toastr/toastr.min.css">
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{ asset('storage/profiles/'.$user->photo) }}"
                   alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ $user->name }}
            <small><i class="text-center">{{ $user->email }}</i></small></h3>

            <p class="text-muted text-center">{{ Str::title($user->role->name) }} 
            @if ($user->role_id != 1)
                ({{ Str::title($user->team->title) }})
            @endif
            </p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        {{-- <div class="card card-primary">
            >
          <!-- /.card-body -->
        </div> --}}
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
              <h2>{{__('language.update_profile')}}</h2>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              
                <form action="{{ route('profile.update',$user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name',$user->name) }}">
                      @error('name')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email',$user->email) }}">
                      @error('email')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password">Old Password</label>
                      <input type="password" name="password" class="form-control"  id="password" placeholder="Password" value="{{ old('password') }}" onchange="checkOldPassword(this.value)">
                      @error('password')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="new_password">New Password</label>
                      <input type="password" name="new_password" id="new_password" disabled class="form-control" placeholder="New Password">
                    </div>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    <div class="form-group">
                      <label for="password_confirm">Confirm Password</label>
                      <input type="password" name="password_confirm" class="form-control" id="password_confirm" placeholder="Confirm Password" disabled value="{{ old('password') }}">
                      @error('password_confirm')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="gender">Gender : </label>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" {{ $user->gender == 'male' ? 'checked' : '' }} name="gender" id="male" value="male">
                        <label class="form-check-label" for="male">Male</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" {{ $user->gender == 'female' ? 'checked' : '' }}  name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">Female</label>
                      </div>
                      @error('gender')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for=""></label>
                      <button type="submit" class="btn btn-success btn-block">Submit</button>
                    </div>
                  </form>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
@endsection

@push('js')
<script src="{{ asset('backend') }}/plugins/toastr/toastr.min.js"></script>
    <script>
        $(document).ready(function(){
            toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            };
        });
    
         
        function checkOldPassword(password){
            if(password){
                $.ajax({
                    method : 'post',
                    data : {password},
                    url : "{{ route('check_old_password') }}",
                    success : function(data){
                        if(data){
                            $('#new_password').attr('disabled',false);
                            $('#password_confirm').attr('disabled',false);
                            toastr.success('Password matched.')
                        }else{
                            $('#password').val("");
                            toastr.error('Old password does not match.')
                        }
                    }
                });
            }
        }
    </script>
@endpush