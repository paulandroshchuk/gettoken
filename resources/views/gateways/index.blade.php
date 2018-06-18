@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('assets.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Gateways</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between align-items-center">
                                            SMS
                                            <span class="badge badge-secondary">Coming soon</span></span>
                                        </h5>
                                        <hr>
                                        <p class="card-text">Send a confirmation token via SMS message.</p>
                                        <button class="btn btn-outline-dark" disabled>Connect</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between align-items-center">
                                            E-mail
                                            <span class="badge badge-secondary">Coming soon</span></span>
                                        </h5>
                                        <hr>
                                        <p class="card-text">Send a confirmation token via E-mail.</p>
                                        <button class="btn btn-outline-dark" disabled>Connect</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-1">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between align-items-center">
                                            Telegram
                                            <span class="badge badge-secondary">Coming soon</span></span>
                                        </h5>
                                        <hr>
                                        <p class="card-text">Send a confirmation token via your telegram bot for free.</p>
                                        <button class="btn btn-outline-dark" disabled>Connect</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-1">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between align-items-center">
                                            Viber
                                            <span class="badge badge-secondary">Coming soon</span></span>
                                        </h5>
                                        <hr>
                                        <p class="card-text">Send a confirmation token via your Viber bot for free.</p>
                                        <button class="btn btn-outline-dark" disabled>Connect</button>
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
