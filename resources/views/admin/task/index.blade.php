@extends('layout.admin.master')
@section('title')Add Task @endsection
@section('body')
<div class="row">
    <div class="col-md-12">
        <h2>Add Task</h2>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <form action="{{route('admin.task.index')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter Title">
                @error('title')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Description</label>
                <textarea  class="form-control" name="description"  placeholder="Enter Description"></textarea>
                @error('description')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror

            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Assign To</label>
                <select class="form-control" id="role" name="assign_to">
                <option value="" selected disabled>-- select --</option>
                @foreach($allEmployee as $key=>$employee)
                        <option value="{{$employee['id']}}">{{$employee['name']}}</option>
                    @endforeach
                </select>
                @error('assign_to')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Priority</label>
                <select class="form-control" id="role" name="priority">
                    <option value="" selected disabled>-- select --</option>
                    <option value="0">Low</option>
                    <option value="1">Medium</option>
                    <option value="2">High</option>
                </select>
                @error('priority')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Start Date</label>
                <input type="date" class="form-control" name="start_date" placeholder="Select Start Date">
                @error('start_date')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">End Date</label>
                <input type="date" class="form-control" name="end_date" placeholder="Select End Date">
                @error('end_date')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
