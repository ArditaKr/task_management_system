@extends('layouts.app')

@section('title','All Users')

@section('content')
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title d-inline">All Team Leaders/Developers</h3>

                <a href="{{route('admin.users.create')}}" class="btn btn-success float-right">Add New</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#SL</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($users as $key=>$user) 
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->type}}</td>
                        <td>
                          <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                      </tr>
                    @empty 

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