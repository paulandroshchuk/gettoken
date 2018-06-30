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
                                    <a href="https://documenter.getpostman.com/view/2088799/RWEfLeZ9#rate-limits" target="_blank" class="alert-link">Learn more</a>.
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">API Token</h5>
                                        <hr>
                                        <p class="card-text">
                                            Authentication is handled by using API tokens.
                                            <br> You can find documentation of usage
                                            <a href="https://documenter.getpostman.com/view/2088799/RWEfLeZ9#authentication" target="_blank">here</a>.
                                        </p>
                                        <div class="form-group">
                                            <button class="btn btn-outline-dark" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                Show API token
                                            </button>
                                        </div>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body">
                                                <span>{{ $user->api_token }}</span>
                                            </div>
                                        </div>
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
