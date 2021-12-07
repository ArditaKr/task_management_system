@extends('layouts.app')

@section('title','All Proejcts')

@section('content')

<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title d-inline">All Projects</h3>
                <a href="{{route('team_leader.projects.create')}}" class="btn btn-success float-right">Add New Team</a>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Members</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($projects as $key=>$project) 
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$project->name}}</td>
                        <td>{{$project->members}}</td>
                        <td>{{$project->created_at->diffForHumans()}}</td>
                        <td>
                          <a href="{{route('team_leader.projects.edit',$project->id)}}" class="btn btn-warning btn-sm">Edit</a>
                          <form action="{{route('team_leader.projects.destroy',$project->id)}}" class="d-inline" method="post" id="my-form{{$project->id}}">
                            @csrf 
                            @method('delete')
                            <button class="btn btn-danger btn-sm" onclick="event.preventDefault();document.getElementById('my-form{{$project->id}}').submit()">Delete</button>
                          </form>
                        </td>
                      </tr>
                    @empty 
                      <h1>No Team Available</h1>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    
        @endsection