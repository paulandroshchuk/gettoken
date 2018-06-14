@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('assets.sidebar')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                <div class="card-body">
                    body is here
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
