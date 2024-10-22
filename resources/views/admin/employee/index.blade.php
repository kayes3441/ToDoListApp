@extends('layout.admin.master')
@section('title')Add Employee @endsection
@section('body')
<div class="row">
    <div class="col-md-12">
        <h2>Add Employee</h2>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <form action="{{route('admin.employee.index')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Title">
                @error('name')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Title">
                @error('email')
                    <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Title">
                @error('password')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Role Name</label>
                <input type="text" class="form-control" name="role" placeholder="Enter Title">
                @error('role')
                    <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Role Permission</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"  name="modules[]" value="task_management">
                    <label class="form-check-label" for="inlineCheckbox1">Task Management</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="modules[]" value="employee_management">
                    <label class="form-check-label" for="inlineCheckbox2">Employee Management</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
