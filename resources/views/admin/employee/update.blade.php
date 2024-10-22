@extends('layout.admin.master')
@section('title')Update @endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <h2>Update Employee</h2>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <form action="{{route('admin.employee.update',['id'=>$employee['id']])}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$employee['name']}}"  placeholder="Enter Title">
                    @error('name')
                    <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$employee['email']}}" placeholder="Enter Email">
                    @error('email')
                    <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" value="" placeholder="Enter passowrd">
                    @error('password')
                    <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Role Name</label>
                    <input type="text" class="form-control" name="role" value="{{$employee?->role?->name}}" placeholder="Enter Role">
                    @error('role')
                    <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    @php($module = $employee?->role?->module_access)
                    <label for="name" class="form-label">Role Permission</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  name="modules[]" value="task_management" {{ in_array("task_management", $module) ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineCheckbox1">Task Management</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="modules[]" value="employee_management"  {{ in_array("employee_management", $module) ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineCheckbox2">Employee Management</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Status</label>
                    <select class="form-control" id="role" name="status">
                        <option value="0" {{$employee['status'] == 0 ? 'selected' : ''}}>Inactive</option>
                        <option value="1"  {{$employee['status'] == 1 ? 'selected' : ''}}>Active</option>
                    </select>
                    @error('priority')
                    <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
