@extends('layout.admin.master')
@section('title')List @endsection
@section('body')
    <div class="row">
        <div class="col-md-12 d-flex gap-3">
            <h2>Task List</h2>
        </div>
    </div>
    <div class="table-responsive">
        <div class="col-md-12">
            <table class="table  table-striped table-hover">
                <thead class="table-dark text-nowrap ">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allEmployee as $key=>$employee)
                    <tr>
                        <td>{{$allEmployee->firstItem()+$key}}</td>
                        <td>{{$employee['name']}}</td>
                        <td>{{$employee['email']}}</td>
                        <td>{{$employee->role?->name}}</td>
                        <td>
                            <span class="{{$employee['status'] == 0 ? 'text-danger': 'text-success'}}">
                                {{$employee['status'] == 0 ? 'Inactive' : 'Active'}}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{route('admin.employee.update',['id'=>$employee['id']])}}" class="btn btn-info btn-sm">Update</a>
                                <a href="{{route('admin.employee.delete',['id'=>$employee['id']])}}" class="btn btn-warning btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="table-responsive mt-4">
            <div class="d-flex justify-content-lg-end">
                {!! $allEmployee->links() !!}
            </div>
        </div>
        @if(count($allEmployee) == 0)
            <span>No data Found</span>
        @endif
    </div>
@endsection
