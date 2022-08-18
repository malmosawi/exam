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

                                            <x-guest-layout>
                                                <x-auth-card>
                                                    <x-slot name="logo">
                                                        <a href="/">
                                                            <img src="../assets/images/brand/logo.png" class="" alt="">
                                                        </a>
                                                    </x-slot>


                                                    <div class="mb-4 text-sm text-gray-600">
                                                        Didn’t recieve a text message?
                                                        No problem, simply re-enter your mobile phone number and we will send you another verification code.
                                                    </div>

                                                    <div class="text-sm text-gray-600">
                                                        {{ __('Please enter the OTP sent to your number:') }} {{ auth('student')->user()->mobile_number }}
                                                    </div>
                                                    <div class="text-sm text-gray-600">
                                                        <a href="">Resend code</a>
                                                    </div>

                                                    <!-- Validation Errors -->
                                                    <x-auth-validation-errors class="mb-4" :errors="$errors" class="text-danger"/>

                                                    <div class="mt-4 flex items-center justify-between">
                                                        <form method="POST" action="{{ route('student.verification.resend') }}">
                                                            @csrf
                                                            <div class="input-group mb-4">
                                                                <span class="input-group-addon bg-white"><i class="fa fa-check  w-4"></i></span>
                                                                <input id="mobile_number" type="text" class="form-control" placeholder="mobile_number"  name="mobile_number" required value=" {{ auth('student')->user()->mobile_number }}"/>
                                                            </div>
            
                                                            {{-- <div>
                                                                <x-label for="code" :value="__('Code')" />

                                                                <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus />
                                                            </div> --}}

                                                            <div class="mt-4">

                                                                <button type="submint" class="btn btn-primary btn-block px-4">Resend</button>


                                                                {{-- <x-button>
                                                                    {{ __('Verify') }}
                                                                </x-button> --}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </x-auth-card>
                                            </x-guest-layout>


										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- page-content end -->

@endsection