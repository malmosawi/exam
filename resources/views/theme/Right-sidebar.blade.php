					<!-- Right-sidebar-->
					<div class="sidebar sidebar-right sidebar-animate">
						<div class="tab-menu-heading siderbar-tabs border-0">
							<div class="tabs-menu ">
								<!-- Tabs -->
								<ul class="nav panel-tabs">
									{{-- <li class=""><a href="#tab"  class="active" data-toggle="tab">Profile</a></li> --}}
									{{-- <li class=""><a href="#tab1" data-toggle="tab">Chat</a></li>
									<li><a href="#tab2" data-toggle="tab">Activity</a></li>
									<li><a href="#tab3" data-toggle="tab">Todo</a></li> --}}
								</ul>
							</div>
						</div>
						<div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
							<div class="tab-content border-top">
								<div class="tab-pane active " id="tab">
									<div class="card-body p-0">
										<div class="header-user text-center mt-4 pb-4">
											<span class="avatar avatar-xxl brround"><img src="{{asset('assets/images/users/female/33.png')}}" alt="Profile-img" class="avatar avatar-xxl brround"></span>
											<div class="dropdown-item text-center font-weight-semibold user h3 mb-0">
								@if (Route::is('student.*')) 
												{{Auth::guard('student')->user()->name}}
											</div>
										</div>
		
								@endif
								@if (Route::is('admin.*')) 
												{{Auth::guard('admin')->user()->name}}
												{{Auth::guard('admin')->user()->type}}

											</div>
										</div>
										@if (Auth::guard('admin')->user()->type != 0 )
											<a class="dropdown-item  border-top" href="{{route('admin.studentpass')}}">
												<i class="dropdown-icon fa fa-graduation-cap "></i> Students 
											</a>
											<a class="dropdown-item  border-top" href="{{route('admin.getstudent',[1])}}">
												<i class="dropdown-icon fa fa-users "></i> Students Approved
											</a>
											<a class="dropdown-item border-top" href="{{route('admin.getstudent',[-1])}}">
												<i class="dropdown-icon  fa fa-user-times"></i> Students Rejact
											</a>
											<a class="dropdown-item border-top" href="{{route('admin.advertisement')}}">
												<i class="dropdown-icon  fa fa-audio-description"></i> Advertisement
											</a>
										@endif
										<a class="dropdown-item border-top" href="{{route('admin.admins')}}">
											<i class="dropdown-icon  fa fa-user-md"></i> Admins
										</a>
										<a class="dropdown-item border-top" href="{{route('admin.examcenter')}}">
											<i class="dropdown-icon  fa fa-institution"></i> Exam Center
										</a>

								@endif

										<div class="card-body border-top">
											<div class="row">
												<div class="col-4 text-center">
													<a class="" href="
																	@if(Route::is('student.*') )
																		{{route('student.proflile')}}
																	@endif
																	@if(Route::is('admin.*') )
																		{{route('admin.proflile')}}
																	@endif
													">
																							
												<i class="dropdown-icon zmdi zmdi-assignment-account fs-30 m-0 leading-tight"></i></a>
													<div>Profile</div>
												</div>
												<div class="col-4 text-center">
													<a class="" href=""><i class="dropdown-icon zmdi zmdi-assignment-alert fs-30 m-0 leading-tight"></i></a>
													<div>Support</div>
												</div>
												<div class="col-4 text-center">
													<form method="POST" action="
																				@if(Route::is('student.*') )
																					{{ route('student.logout') }}
																				@endif
																				@if(Route::is('admin.*') )
																					{{ route('admin.logout') }}
																				@endif
																				">
														@csrf
														<a class="" onclick="event.preventDefault(); this.closest('form').submit();">
															<i class="dropdown-icon mdi mdi-logout-variant fs-30 m-0 leading-tight"></i></a>
														<div>Sign out</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- End Rightsidebar-->
