@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Navigation
                </div>
                <ul class="list-group list-group-flush token-navigation-menu">
                    <a class="list-group-item" href="#">Dashboard</a>
                    <a class="list-group-item" href="#">Team Management</a>
                    <a class="list-group-item" href="#">Billing</a>
                    <a class="list-group-item" href="#">Settings</a>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
