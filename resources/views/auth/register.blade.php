@extends('layouts.base')

@section('content')

 <!-- Checkout Section Begin -->
 <section class="checkout spad">
    <div class="container">
        <form method="POST" action="{{ route('register') }}" class="checkout__form">
                @csrf
            <div class="row">
                <div class="col-lg-8">
                    <h5 class="">Create Account</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Name<span>*</span></p>
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="checkout__form__input">
                                <p>Email Address<span>*</span></p>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                             <div class="checkout__form__input">
                                <p>Password<span>*</span></p>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                             <div class="checkout__form__input">
                                <p>Confirm Password<span>*</span></p>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" value="{{ old('password') }}" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="col-lg-12">
                            <div class="checkout__form__checkbox">
                                <p>Already have an Account? <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__order">
                            <h5>Your order</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    <li>
                                        <span class="top__text">Product</span>
                                        <span class="top__text__right">Total</span>
                                    </li>
                                    <li>01. Chain buck bag <span>$ 300.0</span></li>
                                    <li>02. Zip-pockets pebbled<br /> tote briefcase <span>$ 170.0</span></li>
                                </ul>
                            </div>

                            <button type="submit" class="site-btn">Register</button>
                        </div>
                    </div>
                </div>
            </form>
    </div>

    <!-- Checkout Section End -->

    
</section>
@endsection
