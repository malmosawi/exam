@extends('theme.login-default')
@section('content')
    <!-- page-content -->
    <div class="page-content">
        <div class="container text-center text-dark">
            <div class="row">
                <div class="col-lg-4 d-block mx-auto">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center mb-6">
                                        <img src="{{asset('assets/images/brand/logo.png')}}" class="" alt="">
                                    </div>
                                    <h3>admin Login</h3>
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />
                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    <form action="{{ route('admin.login') }}"  method="POST">
                                        @csrf
                                        <p class="text-muted">Sign In to your account</p>
                                        <div class="input-group mb-3">
                                            <span class="input-group-addon bg-white"><i class="fa fa-user"></i></span>
                                            <input  id="mobile_number" type="text" class="form-control" placeholder="Mobile Number" type="text" name="mobile_number" :value="old('mobile_number')" required autofocus >
                                        </div>
                                        <div class="input-group mb-4">
                                            <span class="input-group-addon bg-white"><i class="fa fa-unlock-alt"></i></span>
                                            <input id="password" class="form-control" placeholder="Password" type="password" name="password" required autocomplete="current-password">
                                        </div>
                                        <div class="row">
                                            <div class="col-12">

                                                <button type="submit" class="btn btn-primary btn-block">{{ __('Log in') }}</button>
                                            </div>
                                            <!-- Remember Me -->
                                            <div class="col-12">
                                                <label for="remember_me" class="inline-flex items-center">
                                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                </label>
                                            </div>

                                            <div class="col-12">
                                                {{-- @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="btn btn-link box-shadow-0 px-0">{{ __('Forgot your password?') }}</a>
                                                @endif --}}
                                                {{-- <br>
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('student.register') }}">
                                                    {{ __('for register') }}
                                                </a> --}}

                                            </div>
                                        </div>
                                        <div class="mt-6 btn-list">
                                            <a href="https://www.facebook.com/iplscourse/" type="button" class="btn btn-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                                            <button type="button" class="btn btn-icon btn-google"><i class="fa fa-google"></i></button>
                                            <button type="button" class="btn btn-icon btn-twitter"><i class="fa fa-twitter"></i></button>
                                            <a href="http://iplscourse.org/" type="button" class="btn btn-icon btn-dribbble"><i class="fa fa-dribbble"></i></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- page-content end -->



    {{-- <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="ml-3">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout> --}}
@endsection