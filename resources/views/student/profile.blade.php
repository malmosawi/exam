@extends('theme.default')
@section('content')
    <!-- app-content-->
    <div class="container content-area">
        <div class="side-app">

            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->

            <!-- row -->
            <div class="row">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Profile</h3>
                            {{-- <div class="card-options">
                                <a href="profile.html" class="btn btn-primary btn-sm"><i class="si si-eye mr-1"></i>View Certificate</a>
                            </div> --}}

                        </div>
                        <div class="card-body">
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li class=""><a href="#tab11" class="active" data-toggle="tab">Profile</a></li>
                                            <li><a href="#tab21" data-toggle="tab">Account</a></li>
                                        </ul>
                                    </div>
                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                </div>
                                @php
                                    if ($profile->approve == 1) {
                                        $read="disabled";
                                        $not="You acount is approved can't edit this field. ";
                                        # code...
                                    }else{
                                        $read="";
                                        $not="";

                                    }
                                @endphp
                                <div class="panel-body tabs-menu-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active " id="tab11">
                                            <form action="{{route('student.updateprofile')}}" method="POST">
                                                @csrf
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label" for="name">Name</label>
                                                            <input type="text" class="form-control" id="name" placeholder="Full Name"  name="name" value="{{$profile->name}}" {{$read}}>
                                                            <span class="text-danger">{{$not}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-group" >
                                                            <label class="form-label" for="governorate">Governorate</label>
                                                            <select class="form-control select2 " data-placeholder="Choose one" id="governorate" name="governorate" required value="{{$profile->governorate}}" {{$read}}>
                                                                <option label="Choose one">
                                                                </option>
                                                                @foreach ($governorate as $item)
                                                                    <option value="{{$item->id}}" @if(old('governorate') == $item->id || $item->id == $profile->governorate) selected @endif> {{$item->governorate}}</option>
                                                                @endforeach
                                                                
                                                            </select>
                                                            <span class="text-danger">{{$not}}</span>
                                                        </div>
                                                    </div>
                                                    @if ($profile->approve == 0)
                                                    <div class="card-footer text-right">
                                                        <button type="submit" class="btn btn-success mt-1">Save</button>
                                                    </div>
    
                                                    @endif
                                                
                                            </form>
                    
                                        </div>
                                        <div class="tab-pane  " id="tab21">
                                            <form action="{{route('student.updatepassword')}}" method="POST">
                                                @csrf
                                                <div class="form-group mb-0 mt-5">
                                                    <div class="row">
                                                        <div class="col-xl-6 col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>New Password</label>
                                                                <input id="password" type="password" class="form-control" placeholder="Password"  name="password" required autocomplete="new-password"/>
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <label>Confirm Password</label>
                                                                <input id="password_confirmation" type="password" class="form-control" placeholder="password_confirmation"  name="password_confirmation" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-right">
                                                    <button type="submit" class="btn btn-success mt-1">Save</button>
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
            <!-- row end -->

        </div>


    </div>
    <!-- End app-content-->


@endsection