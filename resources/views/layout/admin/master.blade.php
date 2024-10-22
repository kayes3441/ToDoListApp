<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link href="{{ dynamicAsset('public/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ dynamicAsset('public/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ dynamicAsset('public/assets/css/toastr.css') }}" rel="stylesheet">

</head>
<body>
<div class="main-div">
    <div class="sidebar bg-dark flex-column p-3" id="sidebar">
        <h4 class="text-white text-center">To Do LIst </h4>
        <hr class="bg-light">
        <a href="{{route('admin.dashboard.index')}}">Dashboard</a>
        <a href="#submenu1" data-bs-toggle="collapse" class="dropdown-toggle">Task</a>
        <ul class="collapse" id="submenu1">
            <li><a href="{{route('admin.task.index')}}" class="pl-4">Add Task</a></li>
            <li><a href="{{route('admin.task.list',['status'=>'all'])}}" class="pl-4"> All</a></li>
            <li><a href="{{route('admin.task.list',['status'=>'pending'])}}" class="pl-4">Pending</a></li>
            <li><a href="{{route('admin.task.list',['status'=>'complete'])}}" class="pl-4">Complete</a></li>
        </ul>
        <a href="#submenu2" data-bs-toggle="collapse" class="dropdown-toggle">Employee</a>
        <ul class="collapse" id="submenu2">
            <li><a href="{{route('admin.employee.index')}}" class="pl-4">Add Employee</a></li>
            <li><a href="{{route('admin.employee.list')}}" class="pl-4"> All Employee</a></li>
        </ul>
        <a href="{{route('admin.logout')}}">Logout</a>
    </div>

    <div class="content">

        <div class="container-fluid">
            @yield('body')
        </div>
    </div>
</div>

<script src="{{ dynamicAsset('public/assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ dynamicAsset('public/assets/js/bootstrap.js') }}"></script>
<script src="{{ dynamicAsset('public/assets/js/toastr.js') }}"></script>
{!! \Brian2694\Toastr\Facades\Toastr::message() !!}
</body>
</html>
