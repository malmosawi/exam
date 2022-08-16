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
												<img src="../assets/images/brand/logo.png" class="" alt="">
											</div>
											<h3>Admin Register</h3>
											<p class="text-muted">Create New Account</p>
                                            <!-- Validation Errors -->
                                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                            <form  action="{{ route('admin.register') }}" method="POST">
                                                @csrf
                                                               
                                                <div class="input-group mb-3">
                                                    <span class="input-group-addon bg-white"><i class="fa fa-user w-4"></i></span>
                                                    <input id="name" type="text" class="form-control" placeholder="Enter name" name="name" :value="old('name')" required autofocus />
                                                </div>
                                                <div class="input-group mb-4">
                                                    <span class="input-group-addon bg-white"><i class="fa fa-mobile w-4"></i></span>
                                                    <input id="phone" type="phone" class="form-control" placeholder="Enter phone" name="phone" :value="old('phone')" required />
                                                </div>

                                                <div class="input-group mb-4">
                                                    <span class="input-group-addon bg-white"><i class="fa fa-envelope  w-4"></i></span>
                                                    <input id="email" type="email" class="form-control" placeholder="Enter Email" name="email" :value="old('email')" required />
                                                </div>
                                                <div class="input-group mb-4">
                                                    <span class="input-group-addon bg-white"><i class="fa fa-unlock-alt  w-4"></i></span>
                                                    <input id="password" type="password" class="form-control" placeholder="Password"  name="password" required autocomplete="new-password"/>
                                                </div>
                                                <div class="input-group mb-4">
                                                    <span class="input-group-addon bg-white"><i class="fa fa-unlock-alt  w-4"></i></span>
                                                    <input id="password_confirmation" type="password" class="form-control" placeholder="password_confirmation"  name="password_confirmation" required />
                                                </div>
                                                {{-- <div class="input-group mb-4">
                                                    <span class="input-group-addon bg-white"><i class="fa fa-institution  w-4"></i></span>
                                                    <div class="form-group ">
                                                        <select class="form-control select2 " data-placeholder="Choose one" id="governorate" name="governorate" >
                                                            <option label="Choose one">
                                                            </option>
                                                            @foreach ($governorate as $item)
                                                                <option value="{{$item->id}}">{{$item->governorate}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
    
                                                </div> --}}

                                                {{-- <div class="form-group">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" />
                                                        <span class="custom-control-label">Agree the <a href="terms.html">terms and policy</a></span>
                                                    </label>
                                                </div> --}}
                                                
                                                <div class="row">
                                                    <div class="col-12">
                                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                                            {{ __('Already registered?') }}
                                                        </a>
                                                        <button type="submint" class="btn btn-primary btn-block px-4">Create a new account</button>
                                                    </div>
                                                </div>
                                            </form>
											<div class="mt-6 btn-list">
												<button type="button" class="btn btn-icon btn-facebook"><i class="fa fa-facebook"></i></button>
												<button type="button" class="btn btn-icon btn-google"><i class="fa fa-google"></i></button>
												<button type="button" class="btn btn-icon btn-twitter"><i class="fa fa-twitter"></i></button>
												<button type="button" class="btn btn-icon btn-dribbble"><i class="fa fa-dribbble"></i></button>
											</div>
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

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout> --}}
@endsection