@extends('layouts.app')

@section('title','Edit User')

@section('content')

<div class="container">
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title d-inline">Edit User</h3>
                <a href="{{route('admin.users.index')}}" class="btn btn-success float-right">Back</a>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <form action="{{route('admin.users.store')}}" method="post">
                  @csrf 
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{old('name',$user->name)}}" class="form-control" placeholder="Name">
                    @error('name') 
                      <small class="text-danger">{{$message}}</small>
                    @enderror 
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email"  value="{{old('email',$user->email)}}" class="form-control" placeholder="Email">
                    @error('email') 
                      <small class="text-danger">{{$message}}</small>
                    @enderror 
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    @error('password') 
                      <small class="text-danger">{{$message}}</small>
                    @enderror 
                  </div>
                  <div class="form-group">
                      <label for="type">type</label>
                      <select name="type" id="type" class="form-control" onchange="showHideTeam(this.value)" required>
                            <option value="">Select type</option>
                          <option value="team_leader" {{$user->type == 'team_leader' ? 'selected':''}}>Team Leader</option>
                          <option value="developer" {{$user->type == 'developer' ? 'selected':''}}>Developer</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="team_id">Team</label>
                      <select name="team_id" id="team_id" class="form-control">
                          @forelse($teams as $key=>$team) 
                            <option value="{{$team->id}}">{{$team->title}}</option>
                          @empty 

                          @endforelse
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="title"></label>
                    <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        </div>
        @endsection

        @push('js') 
            <script>
                function showHideTeam(type){
                    if(type == 'developer'){
                        $('#team_id').hide();
                    }else{
                        $('#team_id').show();
                    }
                }
            </script>
        @endpush