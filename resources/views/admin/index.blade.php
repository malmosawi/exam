@extends('theme.default')
@section('content')

<div class="container content-area">
    <div class="side-app">



        <!-- row -->
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Users/New</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th >Name</th>
                                    <th>Mobile Number</th>
                                    <th>Regester Date</th>
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
                                    <td class="text-nowrap align-middle name">{{$item->name}}</td>
                                    <td class="text-nowrap align-middle mobile_number"><span>{{$item->mobile_number}}</span></td>
                                    <td class="text-nowrap align-middle mobile_number"><span>{{$item->created_at}}</span></td>

                                    <td class="text-center align-middle">
                                        <div class="btn-group align-top">
                                            <button class="btn btn-sm btn-danger badge  approve" type="button" data-id="{{$item->id}}" value="-1"><i class="fa fa-close"></i></button>
                                            <button class="btn btn-sm btn-primary badge  approve"  type="button" data-id="{{$item->id}}" value="1"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-sm btn-warinag badge  edit"  data-target="#advertisement-form-modal" data-toggle="modal" type="button" data-id="{{$item->id}}" value="{{$item->governorate}}"><i class="fa fa-edit"></i></button>

                                            {{-- <button class="btn btn-sm btn-primary badge approve"  type="button" data-id="{{$item->id}}"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-sm btn-danger badge reject" type="button" data-id="{{$item->id}}"><i class="fa fa-close"></i></button> --}}
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
<!-- Message Modal -->
<div class="modal fade" id="advertisement-form-modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Edit Exam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.approvedstudent')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="title">Name:
                                    <span id="name" name="name" > </span> 
                                </label>
                                <input type="text" class="form-control"  id="user_id" name="user_id" value="" required hidden>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="content">Contact</label>
                                <label class="form-label" for="content">Email:
                                    <span id="email" name="email" > </span> 
                                </label>
                                <label class="form-label" for="content">Mobile Number:
                                    <span id="mobile_number" name="mobile_number" > </span> 
                                </label>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="governorate">governorate</label>
                                <select class="form-control select2 " data-placeholder="Choose one" id="governorate" name="governorate" required >
                                    <option label="Choose one">
                                    </option>
                                    @foreach ($governorate as $item)
                                        <option value="{{$item->id}}" id="s-{{$item->id}}"> {{$item->governorate}}</option>
                                    @endforeach
                                    
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success mt-1">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $(document).on('click', '.approve', function(){
        th=$(this);

        var user_id = Number($(this).attr('data-id'));
        var approve = Number($(this).attr('value'));
           $.ajax({
                url: 'approvedstudent',
                type: 'get',
                data: {_token: CSRF_TOKEN, user_id: user_id, approve:approve},
                dataType: 'json',
                success: function(response){
                    th.parents('tr').remove();
                }
           });
    })
    // $(document).on('click', '.approve', function(){
    //     th=$(this);

    //     var user_id = Number($(this).attr('data-id'));
    //     var approve = Number($(this).attr('value'));
    //        $.ajax({
    //             url: 'approvedstudent',
    //             type: 'post',
    //             data: {_token: CSRF_TOKEN, user_id: user_id, approve:approve},
    //             dataType: 'json',
    //             success: function(response){
    //                 th.parents('tr').remove();
    //             }
    //        });
    // })


    $(document).on('click', '.edit', function(){
        var user_id = Number($(this).attr('data-id'));
        $('#user_id').val(user_id);
        $('#name').text($(this).parents('tr').find('.name').text());
        $('#email').text($(this).parents('tr').find('.email').text());
        $('#mobile_number').text($(this).parents('tr').find('.mobile_number').text());

        id=$(this).attr('value');
        $('#governorate option:eq('+id+')').prop('selected', true)



    })




</script>


@endsection