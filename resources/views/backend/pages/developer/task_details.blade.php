@extends('backend.layouts.backend_master')

@section('title','Task Details')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-inline">Task Details</h3>
                    {{-- <a href="{{ route('team-leader.tasks.create') }}" class="btn btn-success btn-sm
                    float-right">New Task</a> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td>{{$task->title}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{$task->description}}</td>
                        </tr>
                        <tr>
                            <th>Level</th>
                            <td>{{$task->level}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$task->status}}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><a href="{{asset('storage/tasks/'.$task->image)}}" target="_blank"><img src="{{asset('storage/tasks/'.$task->image)}}" width="20%" height="20%" alt=""></a></td>
                        </tr>
                    </table>
                </div>
                <!-- /.card-body -->
                {{-- <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
          </div> --}}
            </div>
        </div>
    </div>

</div>

@endsection
