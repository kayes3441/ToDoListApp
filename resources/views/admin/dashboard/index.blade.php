@extends('layout.admin.master')
@section('title')Dashboard @endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <h2>Dashboard Overview</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Task</h5>
                    <p class="card-text">{{$totalTask}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Pending Task</h5>
                    <p class="card-text">{{$pendingTask}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Complete Task</h5>
                    <p class="card-text">{{$completeTask}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12 d-flex gap-3">
            <h2>My Task</h2>
        </div>
    </div>
    <div class="table-responsive">
        <div class="col-md-12">
            <table class="table  table-striped table-hover">
                <thead class="table-dark text-nowrap ">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $key=>$task)
                    <tr>
                        <td>{{$tasks->firstItem()+$key}}</td>
                        <td>{{$task['title']}}</td>
                        <td>{{$task['description']}}</td>
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
        <div class="d-flex justify-content-center">
            @if(count($tasks) == 0)
                <span>No data Found</span>
            @endif
        </div>
    </div>
@endsection
