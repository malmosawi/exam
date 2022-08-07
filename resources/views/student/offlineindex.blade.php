@extends('theme.default')
@section('content')
<div class="container content-area" style="margin-left: 20px;width: 100%;">
    <div class="side-app">
                <!-- page-header -->
        <div class="page-header">
            <ol class="breadcrumb"><!-- breadcrumb -->
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">home</li>
            </ol><!-- End breadcrumb -->
        </div>
        <!-- End page-header -->

        
            <div class="card" style="width: 1300px;">
                <div class="card-header">
                    <div class="card-title">Student</div>
                  
                </div>
                <div class="card-body">
                    <div class="row">  
                        <div class="col-md-2">
                            
                            <ul class="list-group" width="100%">

                                @foreach ($title as $i=>$item)
                                    <li id-data="{{$item}}" class="list-group-item
                                        @if ($stage == $i+1)
                                            item"><i class="fa fa-play"  aria-hidden="true"></i>
                                        @elseif($stage > $i+1)
                                            "><i class="fa fa-check"  aria-hidden="true"></i>
                                        @else
                                            "><i class="fa fa-close"  aria-hidden="true"></i>
                                        @endif
                                    {{$item}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        
                        <div class="col-md-10">
                            <iframe src="" frameborder="0" width="100%" height="100%"></iframe>
                        </div>
                    </div>
                </div>
            </div>
    </div><!--End side app-->
</div>
<script>
    
    $('.item').click(function () {
        id=$(this).attr('id-data');
        $('iframe').attr('src','http://localhost/examp/exam/ipls/'+id+'?user={{Auth::guard('student')->user()->id}}');
        document.getElementById('iframe').contentDocument.location.reload(true);

       
    })
</script>

@endsection