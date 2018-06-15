@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('assets.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">API</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-dark" role="alert">
                                    <i class="far fa-lightbulb"></i>
                                    Your rate limit is {{ $user->rate_limit }} requests/minute.
                                    <a href="javascript:void(0)" class="alert-link">Learn more</a>.
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">API Key</h5>
                                        <hr>
                                        <p class="card-text">
                                            Authentication is handled by using API keys.
                                            <br> You can find documentation of usage <a href="javascript:void(0)">here</a>.
                                        </p>
                                        <a href="#" class="btn btn-outline-dark">Regenerate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
