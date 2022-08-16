@extends('theme.default')
@section('content')
<div class="container content-area">
    <div class="side-app">

        <!-- page-header -->
        <div class="page-header">
            <ol class="breadcrumb"><!-- breadcrumb -->
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">home</li>
            </ol><!-- End breadcrumb -->
        </div>
        <!-- End page-header -->


        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-carousel3 owl-theme mb-5">
                    @foreach ($advertisement as $item)
                        <div class="item">
                            <div class="card">
                                <div class="card-body iconfont text-center">
                                    <h1 class="mb-1 ">{{$item->title}}</h1>
                                    <h4>{{$item->content}}</h4>
                                    <p><span class="text-purple"> At : {{$item->date}} <i class="fa fa-calendar text-green"></i></span></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title ">Certificate</h3>
                        @if ($certificate != NULL)
                            <div class="card-options">
                                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                <a href="{{route('student.printCertificate',Auth::guard('student')->user()->id)}}" class="card-options-collapse" ><i class="fa fa-print"></i></a>
                                
                            </div>
                        @endif
                        {{-- <div class="ml-auto">
                            <div class="input-group">
                                <input type='button' class="btn btn-primary mr-2" id='click4' value="Exam Enrollment">

                            </div>
                        </div> --}}
                    </div>
                    <div class="card-body text-center">
                        @if ($certificate != null)
                            <img src="{{asset('assets/images/brand/logo.png')}}" alt="">
                            <h1>
                                International Paediatiric Life Support 
                                <br>
                                IPLS E-Learnubg certificate
                            </h1>
                            <h4>Presented To</h4>
                            <h1>{{$certificate->name}}</h1>
                            <h4>score (<span> {{$certificate->degree}} </span>)</h4>
                            <h4>for completion of the </h4>
                            <h4>IPLS course e-learning Model</h4>
                            <h4 >on Date: <span>{{date('d-m-Y', strtotime($certificate->updated_at))}}</span></h4>

                            <h4 style="text-align: end">code: <span>{{$certificate->certificate}}</span></h4>
                        @endif

                    </div>
                </div>
            </div>
        </div>


    </div><!--End side app-->
</div>


@endsection