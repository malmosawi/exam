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
                            <h3 class="card-title">Advertisement</h3>
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
                                            <th >Title</th>
                                            <th>content</th>
                                            <th>Date</th>
                                            <th>status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Advertisement as $i=>$item)
                                        <tr>
                                            {{-- <td class="align-middle text-center">
                                                <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                    <input class="custom-control-input" id="item-1" type="checkbox"> <label class="custom-control-label" for="item-1"></label>
                                                </div>
                                            </td> --}}
                                            {{-- <td class="align-middle text-center"><img alt="image" class="avatar avatar-md rounded-circle" src="../assets/images/users/female/26.jpg"></td> --}}
                                            <td>{{$i+1}}</td>
                                            <td class="text-nowrap align-middle title">{{$item->title}}</td>
                                            <td class="text-nowrap align-middle "><textarea readonly class="content">{{$item->content}}</textarea></td>
                                            <td class="text-nowrap align-middle date"><span>{{$item->date}}</span></td>

                                            <td class="text-nowrap align-middle status"><span>{{($item->status==1)?'Active':'Inactive'}}</span></td>
        
                                            <td class="text-center align-middle">
                                                <div class="btn-group align-top">
                                                    <button class="btn btn-sm btn-primary badge edit " data-target="#advertisement-form-modal" data-toggle="modal" type="button" data-id="{{$item->id}}"><i class="fa fa-pencil-square-o"></i></button>
                                                    {{-- <button class="btn btn-sm btn-danger badge add" data-target="#exam-form-modal" data-toggle="modal" type="button" data-id="{{$item->id}}"><i class="fa fa-close"></i></button> --}}
                                                    <form action="{{route('admin.deleteadvertisement', $item->id)}}" method="POST">
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
                    <h5 class="modal-title" id="example-Modal3">New Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.advertisement')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" class="form-control"  placeholder="Title"  name="title" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="content">Content</label>
                                    <textarea class="form-control" placeholder="Content"  name="content" value="" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="date">Content</label>
                                    <input type="date" class="form-control" placeholder="Date"  name="date" value="" required>
                                </div>

                                <div class="form-group">
                                    <label class="custom-switch">
                                        <input type="checkbox" name="status" class="custom-switch-input"  checked="checked">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">avtive</span>
                                    </label>
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
                    <h5 class="modal-title" id="example-Modal3">Edit Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.updateadvertisement')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" class="form-control"  placeholder="Title"  id="title" name="title" value="" required>
                                    <input type="number" class="form-control"  id="id" name="id" value="" required hidden>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="content">Content</label>
                                    <textarea class="form-control" placeholder="Content"  id="content" name="content" value="" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="date">Content</label>
                                    <input type="date" class="form-control" placeholder="Date"  id="date" name="date" value="" required>
                                </div>

                                <div class="form-group">
                                    <label class="custom-switch">
                                        <input type="checkbox" name="status" class="custom-switch-input" id="status" checked="{{($item->status==1)?'checked':''}}">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">avtive</span>
                                    </label>
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
        $('#user-form-modal').find('#edit').attr('data-id','1');
        $('#id').val($(this).attr('data-id'));
        $('#title').val($(this).parents('tr').find('.title').text());
        $('#content').val($(this).parents('tr').find('.content').text());
        $('#date').val($(this).parents('tr').find('.date').text());

        if($(this).parents('tr').find('.status').text() == '0'){
            $('#status').removeAttr('checked');
        }
    })
</script>






@endsection