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
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">1,245</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Active Sessions</h5>
                    <p class="card-text">985</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Pending Issues</h5>
                    <p class="card-text">42</p>
                </div>
            </div>
        </div>
    </div>
@endsection
