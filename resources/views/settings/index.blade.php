@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('assets.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Settings</div>
                    <div class="card-body">
                        @include('assets.success')
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Change Password</h3>
                                <hr>
                                <form method="POST" action="{{ route('password.change') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input type="password" class="form-control" name="current_password"
                                               id="current_password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                               placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm New Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                               id="password_confirmation" placeholder="Password">
                                    </div>
                                    @include('assets.errors')
                                    <button type="submit" class="btn btn-primary">Change</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title">Billing Details</h3>
                                <hr>
                                <form>
                                    <div class="form-group">
                                        <label>Card Number</label>
                                        <input type="text" class="form-control" placeholder="Card Number" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Expiration</label>
                                                <input id="cc-exp" name="cc-exp" type="tel"
                                                       class="form-control" placeholder="MM / YY" readonly>
                                                <span class="invalid-feedback">Enter the expiration date</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="cvv" class="control-label mb-1">Security code</label>
                                            <div class="input-group">
                                                <input id="cvv" type="tel" class="form-control" readonly>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fa fa-question-circle fa-lg"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" disabled>Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
