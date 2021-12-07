@extends('layouts.app')

@section('title','All Teams')

@section('content')

<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title d-inline">All Teams</h3>
                <a href="{{route('admin.teams.create')}}" class="btn btn-success float-right">Add New Team</a>
               
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
                    @forelse($teams as $key=>$team) 
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$team->title}}</td>
                        <td>{{$team->members}}</td>
                        <td>{{$team->created_at->diffForHumans()}}</td>
                        <td>
                          <a href="{{route('admin.teams.edit',$team->id)}}" class="btn btn-warning btn-sm">Edit</a>
                          <form action="{{route('admin.teams.destroy',$team->id)}}" class="d-inline" method="post" id="my-form{{$team->id}}">
                            @csrf 
                            @method('delete')
                            <button class="btn btn-danger btn-sm" onclick="event.preventDefault();document.getElementById('my-form{{$team->id}}').submit()">Delete</button>
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