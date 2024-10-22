@extends('layout.admin.master')
@section('title')Update @endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <h2>Update Task</h2>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <form action="{{route('admin.task.update',['id'=>$task['id']])}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$task['title']}}" placeholder="Enter Title">
                    @error('title')
                    <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Description</label>
                    <textarea  class="form-control" name="description"  placeholder="Enter Description">{{$task['description']}}</textarea>
                    @error('description')
                    <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Assign To</label>
                    <select class="form-control" id="role" name="assign_to">
                        @foreach($allEmployee as $key=>$employee)
                            <option value=""  disabled>-- select --</option>
                            <option value="{{$employee['id']}}"{{$task['assign_to'] == $employee['id'] ? 'selected':''}}>{{$employee['name']}}</option>
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
                        <option value="0" {{$task['priority'] == 0 ? 'selected' : ''}}>Low</option>
                        <option value="1" {{$task['priority'] == 1 ? 'selected' : ''}}>Medium</option>
                        <option value="2" {{$task['priority'] == 2 ? 'selected' : ''}}>High</option>
                    </select>
                    @error('priority')
                    <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Start Date</label>
                    <input type="date" class="form-control" name="start_date" value="{{ $task->start_date->format('Y-m-d') }}" placeholder="Select Start Date">
                    @error('start_date')
                    <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">End Date</label>
                    <input type="date" class="form-control" name="end_date"  value="{{ $task->end_date->format('Y-m-d') }}"  placeholder="Select End Date">
                    @error('end_date')
                    <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Status</label>
                    <select class="form-control" id="role" name="status">
                        <option value="0" {{$task['status'] == 0 ? 'selected' : ''}}>Pending</option>
                        <option value="1" {{$task['status'] == 1 ? 'selected' : ''}}>Complete</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
