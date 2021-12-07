@extends('layouts.app')

@section('title','Create Project')

@section('content')

<div class="container">
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title d-inline">Add New Project</h3>
                <a href="{{route('team_leader.projects.index')}}" class="btn btn-success float-right">Back</a>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <form action="{{route('team_leader.projects.store')}}" method="post">
                  @csrf 
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                    @error('name') 
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
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" class="form-control" placeholder="start_date">
                    @error('start_date') 
                      <small class="text-danger">{{$message}}</small>
                    @enderror 
                  </div>
                  <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" class="form-control" placeholder="end_date">
                    @error('end_date') 
                      <small class="text-danger">{{$message}}</small>
                    @enderror 
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