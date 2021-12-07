@extends('layouts.app')

@section('title','Edit Team')

@section('content')

<div class="container">
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title d-inline">Edit Team</h3>
                <a href="{{route('admin.teams.index')}}" class="btn btn-success float-right">Back</a>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <form action="{{route('admin.teams.update',$team->id)}}" method="post">
                  @csrf 
                  @method('put')
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{old('title',$team->title)}}" placeholder="Title">
                    @error('title') 
                      <small class="text-danger">{{$message}}</small>
                    @enderror 
                  </div>
                  <div class="form-group">
                    <label for="members">Team Members</label>
                    <input type="number" name="members"  value="{{old('members',$team->members)}}" class="form-control" placeholder="Members">
                    @error('members') 
                      <small class="text-danger">{{$message}}</small>
                    @enderror 
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