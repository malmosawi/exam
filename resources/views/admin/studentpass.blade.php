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


        <!-- row -->
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Users</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-nowrap align-middle">Name</th>
                                    @if (Auth::guard('admin')->user()->type == 0)
                                        <th class="text-center align-middle">Exam Center</th>
                                    @endif
                                    <th class="text-center align-middle">Exam Title</th>
                                    <th class="text-center align-middle">Exam Date</th>
                                    <th class="text-center align-middle">Degree</th>
                                    <th class="text-center align-middle">certificate</th>
                                            

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Student as $i=>$item)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td class="text-nowrap align-middle">{{$item->name}}</td>
                                    @if (Auth::guard('admin')->user()->type == 0)
                                        <td class="text-center align-middle">{{$item->examcenter}}</td>
                                    @endif
                                    <td class="text-center align-middle">{{$item->title}} </td>
                                    <td class="text-center align-middle"> {{$item->date}}</td>
                                    <td class="text-center align-middle">{{$item->degree}} </td>
                                    <td class="text-center align-middle">
                                        <a  target="_blank" href="{{route('student.printCertificate',$item->stid)}}" class="card-options-collapse" >
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- table-wrapper -->
            </div>
            <!-- section-wrapper -->
            </div>
        </div>
        <!-- row end -->


    </div><!--End side app-->
</div>

<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $(document).on('click', '.approve', function(){
        th=$(this);
        var user_id = Number($(this).attr('data-id'));
        var approve = Number($(this).attr('value'));

           $.ajax({
                url: "{{route('admin.approvedstudent')}}",
                type: 'post',
                data: {_token: CSRF_TOKEN, user_id: user_id, approve:approve},
                dataType: 'json',
                success: function(response){
                    th.parents('tr').remove();
                }
           });
    })
</script>


@endsection