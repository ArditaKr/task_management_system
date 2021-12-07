@extends('layouts.app')

@section('title','Create Team')

@section('content')

<div class="container">
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title d-inline">All Teams</h3>
                <a href="{{route('admin.teams.create')}}" class="btn btn-success float-right">Add New Team</a>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <form action="{{route('admin.teams.store')}}" method="post">
                  @csrf 
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                    @error('title') 
                      <small class="text-danger">{{$message}}</small>
                    @enderror 
                  </div>
                  <div class="form-group">
                    <label for="members">Team Members</label>
                    <input type="number" name="members" class="form-control" placeholder="Members">
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