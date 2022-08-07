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
                                    <th >Name</th>
                                        <th>Phone</th>
                                        <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Student as $i=>$item)
                                <tr>
                                    {{-- <td class="align-middle text-center">
                                        <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                            <input class="custom-control-input" id="item-1" type="checkbox"> <label class="custom-control-label" for="item-1"></label>
                                        </div>
                                    </td> --}}
                                    {{-- <td class="align-middle text-center"><img alt="image" class="avatar avatar-md rounded-circle" src="../assets/images/users/female/26.jpg"></td> --}}
                                    <td>{{$i+1}}</td>
                                    <td class="text-nowrap align-middle">{{$item->name}}</td>
                                    <td class="text-nowrap align-middle"><span>{{$item->mobile_number}}</span></td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group align-top">
                                            @if ($item->approve == 1)
                                                <button class="btn btn-sm btn-danger badge  approve" type="button" data-id="{{$item->id}}" value="-1"><i class="fa fa-close"></i></button>
                                            @else
                                                <button class="btn btn-sm btn-primary badge  approve"  type="button" data-id="{{$item->id}}" value="1"><i class="fa fa-check"></i></button>
                                                
                                            @endif
                                        </div>
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