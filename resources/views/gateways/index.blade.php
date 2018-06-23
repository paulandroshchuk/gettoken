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
                                        <button class="btn btn-outline-dark" data-toggle="modal" data-target="#telegramModal">Connect</button>
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

    <!-- Modal -->
    <div class="modal fade" id="telegramModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Connect Telegram Gateway</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('gateways.store') }}">
                    @csrf
                    <input type="hidden" name="type" value="telegram">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="name" placeholder="Gateway Name">
                            <small id="nameHelp" class="form-text text-muted">Must be unique.</small>
                        </div>
                        <div class="form-group">
                            <label for="address">Bot Token</label>
                            <input type="text" class="form-control" id="address" name="address" aria-describedby="addressHelp" placeholder="Token">
                            <small id="addressHelp" class="form-text text-muted">Hashed.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
