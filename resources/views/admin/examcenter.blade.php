@extends('theme.default')
@section('content')
    <!-- app-content-->
    <div class="container content-area">
        <div class="side-app">

            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Advertisement</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->

            <!-- row -->
            <div class="row">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Exam Center</h3>
                            <div class="card-options">
                                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal3"><i class="fa fa-plus-circle"></i> New </button>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th >Exam Center</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Governorate as $i=>$item)
                                        <tr>
                                            {{-- <td class="align-middle text-center">
                                                <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                    <input class="custom-control-input" id="item-1" type="checkbox"> <label class="custom-control-label" for="item-1"></label>
                                                </div>
                                            </td> --}}
                                            {{-- <td class="align-middle text-center"><img alt="image" class="avatar avatar-md rounded-circle" src="../assets/images/users/female/26.jpg"></td> --}}
                                            <td>{{$i+1}}</td>
                                            <td class="text-nowrap align-middle governorate">{{$item->governorate}}</td>
        
                                            <td class="text-center align-middle">
                                                <div class="btn-group align-top">
                                                    <button class="btn btn-sm btn-primary badge edit " data-target="#advertisement-form-modal" data-toggle="modal" type="button" data-id="{{$item->id}}"><i class="fa fa-pencil-square-o"></i></button>
                                                    <form action="{{route('admin.deleteexamcenter', $item->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger badge" type="submit"><i class="fa fa-close"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
        
                                    </tbody>
                                </table>
                            </div>
        

                        </div>
                    </div>
                </div>
            </div>
            <!-- row end -->

        </div>


    </div>
    <!-- End app-content-->

    <!-- Message Modal -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">New Exam Center</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.examcenter')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="title">Exam Center</label>
                                    <input type="text" class="form-control"  placeholder="Exam Center"  name="governorate" value="" required>
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
    <!-- Message Modal -->
    <div class="modal fade" id="advertisement-form-modal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Edit Exam Center</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.updateexamcenter')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="governorate">Exam Center</label>
                                    <input type="text" class="form-control"  placeholder="governorate"  id="governorate" name="governorate" value="" required>
                                    <input type="number" class="form-control"  id="id" name="id" value="" required hidden>
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
    $(document).on('click', '.edit', function(){
        $('#id').val($(this).attr('data-id'));
        $('#governorate').val($(this).parents('tr').find('.governorate').text());

    })
</script>






@endsection