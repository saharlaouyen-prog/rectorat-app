@extends('user.layouts.app')

@section('content')
    <div class="section section-header">
        <div class="parallax filter filter-color-black">
            <div class="image"
                 style="background-image: url(https://images.unsplash.com/photo-1516308354296-1c9c5b561e0b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80)">
            </div>
            <div class="container" style="padding-bottom: 400px; padding-left: 200px;">

                        <div class="row">
                            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="margin-left: 200px;">
                                <div class="card card-signin my-5">
                                    <div class="card-header bg-success">{{ __('Login') }}</div>
                                    <div class="card-body" >

                                        <h5 class="card-title text-center" style="color:black">Se connecter</h5>
                                        <form method="POST" action="{{ route('login') }}" class="form-signin">
                                            @csrf
                                            <div class="form-label-group">




                                                <input id="email" placeholder="{{ __('E-Mail Address') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>


                                            <div class="form-label-group">





                                                <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                                                @enderror
                                            </div>



                                            <div class="custom-control custom-checkbox mb-3">
                                            </div>
                                            <button type="submit" class="btn btn-lg btn-danger btn-block text-uppercase">
                                                {{ __('Login') }}
                                            </button>
                                            <a href="{{route("register")}}" class="btn btn-outline-primary w-100">
                                                {{ __('Register') }}
                                            </a>
                                            <hr class="my-4">
                                            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fa fa-google-plus"></i> Se connecter avec Google</button>
                                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fa fa-facebook"></i> Se connecter avec Facebook</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


            </div>

        </div>
    </div>

@endsection
