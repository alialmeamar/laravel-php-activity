@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-md-8">
                <a href="/" class=" mb-5"> رجوع </a>
                <br> <br>
                <div class="card">
                    <div class="card-header">{{ __('تسجيل الدخول') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __(' البريد الإلكتروني (الايميل)') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('رمز المرور') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('الحفاظ على تسجيل الدخول   ') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0 text-center">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('دخول') }}

                                    </button>
                                    <br> <br>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('هل نسيت كلمة المرور  ؟') }}
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="text-center">

        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <div class="rbtn rbtn_s">
                        <a href="/home"> <span class="material-symbols-outlined">Home </span></a>
                    </div>
                    <div class="rbtn rbtn_s">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <span class="material-symbols-outlined">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @else
                    <div class="rbtn rbtn_s">
                        <a href="{{ route('login') }}"> <span class="material-symbols-outlined">Tune</span></a>
                    </div>

                    @if (Route::has('register'))
                        <div class="rbtn rbtn_s">
                            <a href="{{ route('register') }}"> <span
                                    class="material-symbols-outlined">App_Registration</span></a>
                        </div>
                    @endif
                @endauth
            </div>
        @endif

    </div>
    </div>
@endsection
