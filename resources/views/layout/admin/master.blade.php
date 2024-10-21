<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('public/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="d-flex">
    <div class="sidebar bg-dark flex-column p-3" id="sidebar">
        <h4 class="text-white text-center">To Do LIst </h4>
        <hr class="bg-light">
        <a href="{{route('admin.dashboard.index')}}">Dashboard</a>
        <a href="{{route('admin.logout')}}">Logout</a>
    </div>

    <div class="content">

        <div class="container-fluid">
           @yield('body')

{{--            <!-- Table Section -->--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <h4>User List</h4>--}}
{{--                    <table class="table table-striped table-hover">--}}
{{--                        <thead class="table-dark">--}}
{{--                        <tr>--}}
{{--                            <th>#</th>--}}
{{--                            <th>Name</th>--}}
{{--                            <th>Email</th>--}}
{{--                            <th>Role</th>--}}
{{--                            <th>Status</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <td>1</td>--}}
{{--                            <td>John Doe</td>--}}
{{--                            <td>john@example.com</td>--}}
{{--                            <td>Admin</td>--}}
{{--                            <td>Active</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>2</td>--}}
{{--                            <td>Jane Smith</td>--}}
{{--                            <td>jane@example.com</td>--}}
{{--                            <td>User</td>--}}
{{--                            <td>Inactive</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>3</td>--}}
{{--                            <td>Mark Lee</td>--}}
{{--                            <td>mark@example.com</td>--}}
{{--                            <td>Moderator</td>--}}
{{--                            <td>Active</td>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Form Section -->--}}
{{--            <div class="row mt-4">--}}
{{--                <div class="col-md-12">--}}
{{--                    <h4>Add New User</h4>--}}
{{--                    <form>--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="name" class="form-label">Name</label>--}}
{{--                            <input type="text" class="form-control" id="name" placeholder="Enter name">--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="email" class="form-label">Email</label>--}}
{{--                            <input type="email" class="form-control" id="email" placeholder="Enter email">--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="role" class="form-label">Role</label>--}}
{{--                            <select class="form-control" id="role">--}}
{{--                                <option value="user">User</option>--}}
{{--                                <option value="admin">Admin</option>--}}
{{--                                <option value="moderator">Moderator</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="status" class="form-label">Status</label>--}}
{{--                            <select class="form-control" id="status">--}}
{{--                                <option value="active">Active</option>--}}
{{--                                <option value="inactive">Inactive</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </div>
</div>

<script src="{{ asset('public/assets/js/jquery-3.7.1.min.js') }}"></script>
</body>
</html>
