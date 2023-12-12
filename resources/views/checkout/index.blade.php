@extends('layouts.main')
@section('content')
    @include('components.navbar')
    <section class="checkout">
        <div class="container">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        YOUR FUTURE CAREER
                    </p>
                    <h2 class="primary-header">
                        Start Invest Today
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <div class="item-bootcamp">
                                <img src="{{ asset('images/item_bootcamp.png') }}" alt="" class="cover">
                                <h1 class="package">
                                    {{ $camp->title }}
                                </h1>
                                <p class="description">
                                    {{ $camp->description }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-1 col-12"></div>
                        <div class="col-lg-6 col-12">
                            <form action="{{ route('checkout.store', $camp->id) }}" method="POST" class="basic-form">
                                @csrf
                                <div class="mb-4">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="name"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        value="{{ Auth::user()->name }}">
                                    @if ($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" name="email"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        value="{{ Auth::user()->email }}">
                                    @if ($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Occupation</label>
                                    <input type="text" name="occupation"
                                        class="form-control {{ $errors->has('occupation') ? 'is-invalid' : '' }}"
                                        value="{{ old('occupation') ?: Auth::user()->occupation }}">
                                    @if ($errors->has('occupation'))
                                        <p class="text-danger">{{ $errors->first('occupation') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Card Number</label>
                                    <input type="number" name="card_number"
                                        class="form-control {{ $errors->has('card_number') ? 'is-invalid' : '' }}"
                                        value="{{ old('card_number') ?: '' }}">
                                    @if ($errors->has('card_number'))
                                        <p class="text-danger">{{ $errors->first('card_number') }}</p>
                                    @endif
                                </div>
                                <div class="mb-5">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <label class="form-label">Expired</label>
                                            <input type="month" name="expired_date"
                                                class="form-control {{ $errors->has('expired_date') ? 'is-invalid' : '' }}"
                                                value="{{ old('expired_date') ?: '' }}">
                                            @if ($errors->has('expired_date'))
                                                <p class="text-danger">{{ $errors->first('expired_date') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <label class="form-label">CVV</label>
                                            <input type="text" name="cvv" maxlength="3"
                                                class="form-control {{ $errors->has('cvv') ? 'is-invalid' : '' }}"
                                                value="{{ old('cvv') ?: '' }}">
                                            @if ($errors->has('cvv'))
                                                <p class="text-danger">{{ $errors->first('cvv') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="w-100 btn btn-primary">Pay Now</button>
                                <p class="text-center subheader mt-4">
                                    <img src="{{ asset('images/ic_secure.svg') }}" alt=""> Your payment is secure
                                    and
                                    encrypted.
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
