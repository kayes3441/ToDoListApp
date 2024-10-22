@extends('layout.admin.master')
@section('title')Dashboard @endsection
@section('body')
    <div class="row">
        <form action="{{route('admin.task.list',['status'=>request('status')])}}" id="form-data" method="GET">
            <div class="col-md-12 d-flex gap-3">
                <h2>Task List</h2>
                <div class="input-group mb-3 w-25">
                        <input type="text" class="form-control" name="search" placeholder="search" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-outline-secondary" id="basic-addon1">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <div class="col-md-12">
            <table class="table  table-striped table-hover">
                <thead class="table-dark text-nowrap ">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Assign To</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $key=>$task)
                    <tr>
                        <td>{{$tasks->firstItem()+$key}}</td>
                        <td>{{$task['title']}}</td>
                        <td>{{$task['description']}}</td>
                        <td>{{$task->assignTo?->name}}</td>
                        <td>{{date('d M Y h:i A',strtotime($task['start_date']))}}</td>
                        <td>{{date('d M Y h:i A',strtotime($task['end_date']))}}</td>
                        <td>
                            <span class="{{$task['status'] == 0 ? 'text-danger': 'text-success'}}">
                                {{$task['status'] == 0 ? 'Pending' : 'Complete'}}
                            </span>

                        </td>
                        <td>
                            <span class="{{$task['priority'] == 0 ? 'text-dark': ($task['priority'] == 1 ? 'text-success':'text-danger')}}">
                                {{$task['priority'] == 0 ? 'Low' : ($task['priority'] == 1 ? 'Medium' : 'High')}}
                            </span>

                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{route('admin.task.update',['id'=>$task['id']])}}" class="btn btn-info btn-sm">Update</a>
                                <a href="{{route('admin.task.delete',['id'=>$task['id']])}}" class="btn btn-warning btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="table-responsive mt-4">
            <div class="d-flex justify-content-lg-end">
                {!! $tasks->links() !!}
            </div>
        </div>
        @if(count($tasks) == 0)
            <span>No data Found</span>
        @endif
    </div>
@endsection
