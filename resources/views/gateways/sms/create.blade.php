@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('assets.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create SMS Gateway</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('gateways.store') }}">
                                            @csrf
                                            <input type="hidden" name="type" value="sms">
                                            <div class="form-group">
                                                <label for="name">Gateway Name</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                       value="{{ old('name') }}" aria-describedby="nameHelp"
                                                       placeholder="Enter name">
                                                <small id="nameHelp" class="form-text text-muted">
                                                    You'll use this slug to define a gateway making your API requests.
                                                </small>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Phone Number</label>
                                                <input type="text" class="form-control" name="address" id="phone_number"
                                                       aria-describedby="phoneNumberHelp" placeholder="Enter name"
                                                       value="{{ config('app.default_sms_address') }}" readonly>
                                                <small id="phoneNumberHelp" class="form-text text-muted">
                                                    Tokens are being sent using this number.
                                                </small>
                                            </div>
                                            <div class="alert alert-dark" role="alert">
                                                <i class="far fa-lightbulb"></i>
                                                <span>Very soon you'll be able to buy your own phone numbers.</span>
                                            </div>
                                            @include('assets.errors')
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </form>
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
